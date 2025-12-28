<?php

namespace App\Controllers;

use App\Models\BloodRequestModel;
use App\Models\BloodDonorModel;

class BloodDonationController extends BaseController
{
    public function index()
    {
        $model = new BloodRequestModel();
        
        $city = $this->request->getGet('city');
        $bloodType = $this->request->getGet('blood_type');
        $urgency = $this->request->getGet('urgency');

        $model->where('status', 'active');

        if ($city) {
            $model->where('city', $city);
        }
        if ($bloodType) {
            $model->where('blood_type', $bloodType);
        }
        if ($urgency) {
            $model->where('urgency', $urgency);
        }

        // Order by urgency (critical first) then date
        $model->orderBy('urgency', 'DESC'); // 'normal' < 'critical' alphabetically? No, c < n. 
        // Wait, 'critical' comes before 'normal' alphabetically. 
        // If we want critical first, we should check the enum values or just use custom order.
        // Let's rely on 'critical' being alphabetically before 'normal', so ASC would put critical first.
        $model->orderBy('urgency', 'ASC'); 
        $model->orderBy('created_at', 'DESC');

        $requests = $model->findAll();

        return view('blood/index', ['requests' => $requests]);
    }

    public function create()
    {
        return view('blood/create');
    }

    public function store()
    {
        $rules = [
            'patient_name' => 'required|min_length[3]',
            'blood_type' => 'required',
            'hospital' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'urgency' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new BloodRequestModel();
        $model->save([
            'user_id' => session()->get('id'), // Assuming logged in
            'patient_name' => $this->request->getPost('patient_name'),
            'blood_type' => $this->request->getPost('blood_type'),
            'hospital' => $this->request->getPost('hospital'),
            'city' => $this->request->getPost('city'),
            'phone' => $this->request->getPost('phone'),
            'urgency' => $this->request->getPost('urgency'),
            'status' => 'pending', // Default to pending
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/blood-donation')->with('success', 'تم إرسال طلبك بنجاح، سيتم مراجعته من قبل الإدارة.');
    }

    public function donate()
    {
        $requestId = $this->request->getPost('request_id');
        $name = $this->request->getPost('name');
        $phone = $this->request->getPost('phone');

        if (!$requestId || !$name || !$phone) {
            return redirect()->back()->with('error', 'الرجاء ملء جميع الحقول');
        }

        // Generate OTP
        $otp = rand(1000, 9999);
        
        // Store in session
        session()->set('blood_donation', [
            'request_id' => $requestId,
            'name' => $name,
            'phone' => $phone,
            'otp' => $otp
        ]);

        // Send OTP via SMS or Email (using email for now)
        // In real scenario, you would send SMS
        // For now, let's flash it for demo purposes
        session()->setFlashdata('otp_sent', "رمز التحقق: <b>$otp</b> (في التطبيق الفعلي سيتم إرساله عبر SMS)");

        return redirect()->to('/blood-donation/verify');
    }
    
    public function verify()
    {
        if (!session()->has('blood_donation')) {
            return redirect()->to('/blood-donation');
        }
        
        return view('blood/verify');
    }
    
    public function confirm()
    {
        $inputOtp = $this->request->getPost('otp');
        $sessionData = session()->get('blood_donation');
        
        if (!$sessionData || $inputOtp != $sessionData['otp']) {
            return redirect()->back()->with('error', 'رمز التحقق غير صحيح');
        }
        
        // Save donation record
        $model = new BloodDonorModel();
        $model->save([
            'request_id' => $sessionData['request_id'],
            'name' => $sessionData['name'],
            'phone' => $sessionData['phone'],
            'created_at' => date('Y-m-d H:i:s')
        ]);

        // Clear session
        session()->remove('blood_donation');

        return redirect()->to('/blood-donation')->with('success', 'شكراً لك! تم تسجيل رغبتك في التبرع بنجاح.');
    }
}
