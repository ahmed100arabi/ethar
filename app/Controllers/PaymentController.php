<?php

namespace App\Controllers;


use App\Models\CaseModel;
use App\Models\DonationModel;
use App\Models\FakeCardModel;
use App\Models\SiteWalletModel;

class PaymentController extends BaseController
{
    public function init()
    {
        // Receive email and case ID from case details page
        $caseId = $this->request->getPost('case_id');
        $email = $this->request->getPost('email');

        if (!$caseId || !$email) {
            return redirect()->back()->with('error', 'الرجاء إدخال البريد الإلكتروني');
        }

        // Store in session
        session()->set('donation_data', [
            'case_id' => $caseId,
            'email' => $email
        ]);

        return redirect()->to('/payment/amount');
    }

    public function amount()
    {
        if (!session()->has('donation_data')) {
            return redirect()->to('/');
        }
        
        $caseId = session()->get('donation_data')['case_id'];
        $caseModel = new CaseModel();
        $case = $caseModel->find($caseId);

        return view('payment/index', ['case' => $case]);
    }

    public function process()
    {
        $amount = $this->request->getPost('amount');
        
        if (!$amount || $amount <= 0) {
            return redirect()->back()->with('error', 'الرجاء إدخال مبلغ صالح');
        }

        // Validate Amount against Remaining
        $data = session()->get('donation_data');
        $caseModel = new CaseModel();
        $case = $caseModel->find($data['case_id']);
        
        $remaining = $case['amount_required'] - $case['amount_collected'];
        
        if ($amount > $remaining) {
            return redirect()->back()->with('error', 'المبلغ المدخل أكبر من المبلغ المتبقي (' . $remaining . ' د.ل)');
        }

        // Update session with amount
        $data['amount'] = $amount;
        session()->set('donation_data', $data);

        // Redirect to payment method selection (NO OTP)
        return redirect()->to('/payment/select-method');
    }
    
    public function selectMethod()
    {
        if (!session()->has('donation_data')) {
            return redirect()->to('/');
        }
        
        $data = session()->get('donation_data');
        $caseModel = new CaseModel();
        $case = $caseModel->find($data['case_id']);
        
        return view('payment/select_method', ['case' => $case, 'amount' => $data['amount']]);
    }

    // Fake Card Payment Flow
    public function fakeCard()
    {
        if (!session()->has('donation_data')) {
            return redirect()->to('/');
        }
        
        $data = session()->get('donation_data');
        $caseModel = new CaseModel();
        $case = $caseModel->find($data['case_id']);
        
        return view('payment/fake_card', ['case' => $case, 'amount' => $data['amount']]);
    }
    
    public function processFakeCard()
    {
        $cardNumber = str_replace([' ', '-'], '', $this->request->getPost('card_number'));
        $expiry = $this->request->getPost('expiry');
        $cvv = $this->request->getPost('cvv');
        $cardHolder = $this->request->getPost('card_holder');
        
        $sessionData = session()->get('donation_data');
        $amount = $sessionData['amount'];
        
        // Validate card
        $cardModel = new FakeCardModel();
        $validation = $cardModel->validateCard($cardNumber, $expiry, $cvv);
        
        if (!$validation['success']) {
            return redirect()->back()->with('error', $validation['message']);
        }
        
        $card = $validation['card'];
        
        // Check balance
        if (!$cardModel->checkBalance($card['id'], $amount)) {
            return redirect()->back()->with('error', 'الرصيد غير كافٍ في البطاقة');
        }
        
        // Deduct from card
        if (!$cardModel->deductBalance($card['id'], $amount)) {
            return redirect()->back()->with('error', 'فشلت عملية الدفع');
        }
        
        // Add to site wallet
        $walletModel = new SiteWalletModel();
        $walletModel->addBalance($amount, 'fake_card');
        
        // Create donation record
        $this->createDonation($sessionData, 'بطاقة ائتمان');
        
        // Send success email to donor
        $this->sendDonorEmail($sessionData, $amount);
        
        // Clear session
        session()->remove('donation_data');
        
        return redirect()->to('/payment/success');
    }
    
    // Prepaid Card Form (Shows after amount selection)
    public function prepaidCardForm()
    {
        if (!session()->has('donation_data')) {
            return redirect()->to('/');
        }
        
        $data = session()->get('donation_data');
        return view('payment/prepaid_card_form', ['amount' => $data['amount']]);
    }

    public function success()
    {
        return view('payment/success');
    }

    // Prepaid Card Methods (NO OTP)
    
    public function redeemCard()
    {
        $cardCode = $this->request->getPost('card_code');
        $caseId = $this->request->getPost('case_id');
        $email = $this->request->getPost('email');
        
        if (!$cardCode || !$caseId || !$email) {
            return redirect()->back()->with('error', 'الرجاء ملء جميع الحقول');
        }
        
        // Validate card
        $cardModel = new \App\Models\PrepaidCardModel();
        $result = $cardModel->redeemCard($cardCode, $caseId);
        
        if (!$result['success']) {
            return redirect()->back()->with('error', $result['message']);
        }
        
        $card = $result['card'];
        
        // Process immediately without OTP
        $this->createDonation([
            'case_id' => $caseId,
            'email' => $email,
            'amount' => $card['card_value']
        ], 'كرت مسبق الدفع: ' . $card['card_code']);
        
        // Add to site wallet
        $walletModel = new SiteWalletModel();
        $walletModel->addBalance($card['card_value'], 'prepaid_card');
        
        // Send confirmation email
        $this->sendDonorEmail(['email' => $email, 'case_id' => $caseId], $card['card_value']);
        
        return redirect()->to('/payment/success');
    }
    
    // Helper Methods
    private function createDonation($sessionData, $message = 'تبرع عبر الموقع')
    {
        $donationModel = new DonationModel();
        $donationModel->save([
            'case_id' => $sessionData['case_id'],
            'donor_name' => 'فاعل خير',
            'donor_email' => $sessionData['email'],
            'amount' => $sessionData['amount'],
            'message' => $message,
            'status' => 'approved',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        // Update Case Collected Amount
        $caseModel = new CaseModel();
        $case = $caseModel->find($sessionData['case_id']);
        $newCollected = $case['amount_collected'] + $sessionData['amount'];
        
        $updateData = ['amount_collected' => $newCollected];
        
        // Auto-complete if fully funded
        if ($newCollected >= $case['amount_required']) {
            $updateData['status'] = 'completed';
            
            // Send Completion Email to Case Owner
            $userModel = new \App\Models\UserModel();
            $user = $userModel->find($case['user_id']);
            
            if ($user && !empty($user['email'])) {
                $mail = new \App\Libraries\MailService();
                $subject = 'اكتمل التبرع لحالتك! - إيثار';
                $body = "مرحباً {$user['name']}،<br><br>نبارك لك! لقد تم جمع كامل المبلغ المطلوب لحالتك \"{$case['title']}\".<br>المبلغ المجموع: <b>{$newCollected} د.ل</b><br>سيتم التواصل معك قريباً لإجراءات التسليم.<br><br>فريق إيثار";
                $mail->send($user['email'], $subject, $body);
            }
        }
        
        $caseModel->update($sessionData['case_id'], $updateData);
    }
    
    private function sendDonorEmail($sessionData, $amount)
    {
        $mail = new \App\Libraries\MailService();
        $caseModel = new CaseModel();
        $case = $caseModel->find($sessionData['case_id']);
        
        $subject = 'شكراً لتبرعك - إيثار';
        $body = "عزيزنا المتبرع،<br><br>شكراً لك على تبرعك بمبلغ <b>{$amount} د.ل</b> للحالة \"{$case['title']}\".<br>تم قبول تبرعك بنجاح.<br><br>جزاك الله خيراً<br>فريق إيثار";
        $mail->send($sessionData['email'], $subject, $body);
    }
}
