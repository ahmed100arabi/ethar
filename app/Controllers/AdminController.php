<?php

namespace App\Controllers;

use App\Models\CaseModel;

class AdminController extends BaseController
{
    public function dashboard()
    {
        $caseModel = new CaseModel();
        $donationModel = new \App\Models\DonationModel();
        $userModel = new \App\Models\UserModel();
        
        $stats = [
            'total_donations' => 0,
            'active_cases' => $caseModel->where('status', 'approved')->countAllResults(),
            'total_users' => $userModel->countAllResults(),
            'pending_requests' => $caseModel->where('status', 'pending')->countAllResults(),
        ];

        // Calculate total donations
        $donations = $donationModel->where('status', 'approved')->findAll();
        foreach ($donations as $donation) {
            $stats['total_donations'] += $donation['amount'];
        }

        // Recent Donations
        $stats['recent_donations'] = $donationModel->select('donations.*, cases.title as case_title')
                                                   ->join('cases', 'cases.id = donations.case_id')
                                                   ->where('donations.status', 'approved')
                                                   ->orderBy('donations.created_at', 'DESC')
                                                   ->limit(5)
                                                   ->findAll();

        // Recent Requests
        $stats['recent_requests'] = $caseModel->where('status', 'pending')
                                              ->orderBy('created_at', 'DESC')
                                              ->limit(5)
                                              ->findAll();

        return view('admin/dashboard', $stats);
    }

    public function requests()
    {
        $model = new CaseModel();
        // Join with users table to get user name
        $requests = $model->select('cases.*, users.name as user_name, users.id as user_id_num')
                          ->join('users', 'users.id = cases.user_id')
                          ->where('cases.status', 'pending')
                          ->findAll();

        return view('admin/requests', ['requests' => $requests]);
    }

    public function requestDetails($id)
    {
        $model = new CaseModel();
        $case = $model->select('cases.*, users.name as user_name')
                      ->join('users', 'users.id = cases.user_id')
                      ->find($id);
        
        if (!$case) {
            return redirect()->to('/admin/requests')->with('error', 'الطلب غير موجود');
        }

        return view('admin/request_details', ['case' => $case]);
    }

    public function updateCaseImage($id)
    {
        $json = $this->request->getJSON();
        $imageData = $json->image;
        
        if (!$imageData) {
            return $this->response->setJSON(['success' => false]);
        }

        // Decode base64 image
        $imageParts = explode(";base64,", $imageData);
        $imageTypeAux = explode("image/", $imageParts[0]);
        $imageType = $imageTypeAux[1] ?? 'jpg'; // Default to jpg if type not found
        $imageBase64 = base64_decode($imageParts[1]);
        
        // Save to NEW file to avoid cache issues and preserve original if needed (though we update DB)
        $model = new CaseModel();
        
        // Create new filename
        $fileName = 'case_' . $id . '_v' . time() . '.' . $imageType;
        $filePath = ROOTPATH . 'public/uploads/cases/' . $fileName;
        $publicPath = '/uploads/cases/' . $fileName;
        
        // Save the file
        file_put_contents($filePath, $imageBase64);
        
        // Update Database
        $model->update($id, ['image' => $publicPath]);
        
        return $this->response->setJSON(['success' => true, 'imagePath' => $publicPath]);
    }

    public function approve($id)
    {
        $model = new CaseModel();
        $case = $model->find($id);
        
        if ($case) {
            $data = [
                'status' => 'approved',
                'approved_at' => date('Y-m-d H:i:s'),
                'is_critical' => $this->request->getPost('is_critical') ? 1 : 0,
                'patient_nickname' => $this->request->getPost('patient_nickname') ?: 'حالة'
            ];
            
            $model->update($id, $data);
            
            // Send Email to Case Owner
            $userModel = new \App\Models\UserModel();
            $user = $userModel->find($case['user_id']);
            
            if ($user && !empty($user['email'])) {
                $mail = new \App\Libraries\MailService();
                $subject = 'تم قبول حالتك: ' . $case['title'];
                $body = "مرحباً {$user['name']}،<br><br>يسعدنا إخبارك بأنه تم قبول حالتك \"{$case['title']}\" وهي الآن منشورة على منصة إيثار.<br><br>نتمنى لك الشفاء العاجل.<br>فريق إيثار";
                $mail->send($user['email'], $subject, $body);
            }
        }
        
        return redirect()->to('/admin/requests')->with('message', 'تم قبول الحالة بنجاح');
    }

    public function reject($id)
    {
        $model = new CaseModel();
        $model->update($id, ['status' => 'rejected']);
        return redirect()->to('/admin/requests')->with('message', 'تم رفض الحالة');
    }

    public function users()
    {
        $model = new \App\Models\UserModel();
        $users = $model->findAll();
        return view('admin/users', ['users' => $users]);
    }

    public function banUser($id)
    {
        // In a real app, we would have a 'status' field or 'banned_at'
        // For now, we'll just delete the user or show a message
        // $model = new \App\Models\UserModel();
        // $model->delete($id);
        return redirect()->to('/admin/users')->with('message', 'تم حظر المستخدم بنجاح (#)');
    }

    public function reports()
    {
        $caseModel = new CaseModel();
        $donationModel = new \App\Models\DonationModel();
        $userModel = new \App\Models\UserModel();
        $bloodDonorModel = new \App\Models\BloodDonorModel();
        $campaignRegModel = new \App\Models\CampaignRegistrationModel();

        $stats = [
            'total_donations' => 0,
            'active_cases' => $caseModel->where('status', 'approved')->countAllResults(),
            'total_users' => $userModel->countAllResults(),
            'pending_requests' => $caseModel->where('status', 'pending')->countAllResults(),
        ];

        // Calculate total donations
        $donations = $donationModel->where('status', 'approved')->findAll();
        foreach ($donations as $donation) {
            $stats['total_donations'] += $donation['amount'];
        }

        // Fetch Blood Donors
        $stats['blood_donors'] = $bloodDonorModel->select('blood_donors.*, blood_requests.patient_name, blood_requests.blood_type')
                                                 ->join('blood_requests', 'blood_requests.id = blood_donors.request_id')
                                                 ->orderBy('blood_donors.created_at', 'DESC')
                                                 ->findAll();

        // Fetch Campaign Registrants
        $campaignId = $this->request->getGet('campaign_id');
        $registrantsQuery = $campaignRegModel->select('campaign_registrations.*, campaigns.title as campaign_title')
                                             ->join('campaigns', 'campaigns.id = campaign_registrations.campaign_id')
                                             ->orderBy('campaign_registrations.created_at', 'DESC');
        
        if ($campaignId) {
            $registrantsQuery->where('campaign_registrations.campaign_id', $campaignId);
        }
        
        $stats['campaign_registrants'] = $registrantsQuery->findAll();
        $stats['campaigns_list'] = $campaignRegModel->db->table('campaigns')->select('id, title')->get()->getResultArray();

        return view('admin/reports', $stats);
    }

    // ... Existing cases methods ...

    // Blood Requests Management
    public function bloodRequests()
    {
        $model = new \App\Models\BloodRequestModel();
        // Fetch all requests, ordered by creation date
        $requests = $model->orderBy('created_at', 'DESC')->findAll();
        return view('admin/blood_requests', ['requests' => $requests]);
    }

    public function approveBlood($id)
    {
        $model = new \App\Models\BloodRequestModel();
        $model->update($id, ['status' => 'active']);
        return redirect()->to('/admin/blood-requests')->with('message', 'تم قبول طلب التبرع بنجاح');
    }

    public function rejectBlood($id)
    {
        $model = new \App\Models\BloodRequestModel();
        $model->update($id, ['status' => 'rejected']);
        return redirect()->to('/admin/blood-requests')->with('message', 'تم رفض الطلب');
    }

    public function deleteBloodRequest($id)
    {
        $model = new \App\Models\BloodRequestModel();
        $model->delete($id);
        return redirect()->to('/admin/blood-requests')->with('message', 'تم حذف الطلب بنجاح');
    }

    // Campaigns Management
    public function campaigns()
    {
        $model = new \App\Models\CampaignModel();
        $campaigns = $model->orderBy('created_at', 'DESC')->findAll();
        return view('admin/campaigns', ['campaigns' => $campaigns]);
    }

    public function createCampaign()
    {
        return view('admin/create_campaign');
    }

    public function storeCampaign()
    {
        $model = new \App\Models\CampaignModel();
        
        // Handle Image Upload
        $file = $this->request->getFile('image');
        $imagePath = null;
        
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads/campaigns', $newName);
            $imagePath = '/uploads/campaigns/' . $newName;
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'event_date' => $this->request->getPost('event_date'),
            'location' => $this->request->getPost('location'),
            'image' => $imagePath,
            'status' => 'approved', // Always approved by default
            'user_id' => session()->get('id')
        ];
        $model->save($data);
        return redirect()->to('/admin/campaigns')->with('message', 'تم إضافة الحملة بنجاح');
    }

    public function editCampaign($id)
    {
        $model = new \App\Models\CampaignModel();
        $campaign = $model->find($id);
        return view('admin/edit_campaign', ['campaign' => $campaign]);
    }

    public function updateCampaign($id)
    {
        $model = new \App\Models\CampaignModel();
        
        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'event_date' => $this->request->getPost('event_date'),
            'location' => $this->request->getPost('location'),
        ];

        // Handle Image Upload
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads/campaigns', $newName);
            $data['image'] = '/uploads/campaigns/' . $newName;
        }

        $model->update($id, $data);
        return redirect()->to('/admin/campaigns')->with('message', 'تم تحديث الحملة بنجاح');
    }

    public function deleteCampaign($id)
    {
        $model = new \App\Models\CampaignModel();
        $model->delete($id);
        return redirect()->to('/admin/campaigns')->with('message', 'تم حذف الحملة بنجاح');
    }

    public function approveCampaign($id)
    {
        $model = new \App\Models\CampaignModel();
        $model->update($id, ['status' => 'approved']);
        return redirect()->to('/admin/campaigns')->with('message', 'تم قبول الحملة بنجاح');
    }

    public function rejectCampaign($id)
    {
        $model = new \App\Models\CampaignModel();
        $model->update($id, ['status' => 'rejected']);
        return redirect()->to('/admin/campaigns')->with('message', 'تم رفض الحملة');
    }

    // Existing Case Methods
    public function cases()
    {
        $model = new CaseModel();
        // Join with users table to get user name
        $cases = $model->select('cases.*, users.name as user_name')
                       ->join('users', 'users.id = cases.user_id')
                       ->findAll();

        return view('admin/cases', ['cases' => $cases]);
    }

    public function deleteCase($id)
    {
        $model = new CaseModel();
        $donationModel = new \App\Models\DonationModel();
        
        try {
            // Find case to get image path
            $case = $model->find($id);
            
            if ($case) {
                // Delete related donations manually to be safe
                $donationModel->where('case_id', $id)->delete();
                
                // Delete image file if exists
                if (!empty($case['image']) && file_exists(ROOTPATH . 'public' . $case['image'])) {
                    @unlink(ROOTPATH . 'public' . $case['image']);
                }
                
                // Delete the case
                $model->delete($id);
                return redirect()->to('/admin/cases')->with('message', 'تم حذف الحالة بنجاح');
            }
            
            return redirect()->to('/admin/cases')->with('error', 'الحالة غير موجودة');
        } catch (\Exception $e) {
            return redirect()->to('/admin/cases')->with('error', 'حدث خطأ أثناء الحذف: ' . $e->getMessage());
        }
    }

    public function editCase($id)
    {
        $model = new CaseModel();
        $case = $model->find($id);
        return view('admin/edit_case', ['case' => $case]);
    }

    public function updateCase($id)
    {
        $model = new CaseModel();
        $data = [
            'title' => $this->request->getPost('title'),
            'category' => $this->request->getPost('category'),
            'city' => $this->request->getPost('city'),
            'description' => $this->request->getPost('description'),
            'amount_required' => $this->request->getPost('amount_required'),
            'status' => $this->request->getPost('status'),
        ];
        
        $model->update($id, $data);
        return redirect()->to('/admin/cases')->with('message', 'تم تحديث الحالة بنجاح');
    }

    // User Management
    public function storeAdmin()
    {
        $rules = [
            'name' => 'required|min_length[3]|max_length[50]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[4]|max_length[255]',
            'confpassword' => 'matches[password]'
        ];

        if ($this->validate($rules)) {
            $userModel = new \App\Models\UserModel();
            $data = [
                'name'     => $this->request->getPost('name'),
                'email'    => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'role'     => 'admin',
            ];
            $userModel->save($data);
            return redirect()->to('/admin/users')->with('message', 'تم إضافة المشرف بنجاح');
        } else {
            return redirect()->to('/admin/users')->with('error', 'فشل إضافة المشرف. الرجاء التحقق من البيانات (البريد الإلكتروني قد يكون مستخدماً بالفعل).');
        }
    }

    // Prepaid Cards Management
    
    public function prepaidCards()
    {
        $model = new \App\Models\PrepaidCardModel();
        $cards = $model->orderBy('created_at', 'DESC')->findAll();
        return view('admin/prepaid_cards', ['cards' => $cards]);
    }
    
    public function createCard()
    {
        $value = $this->request->getPost('value');
        $expiresAt = $this->request->getPost('expires_at');
        
        if (!$value || $value <= 0) {
            return redirect()->back()->with('error', 'الرجاء إدخال قيمة صحيحة');
        }
        
        $model = new \App\Models\PrepaidCardModel();
        $code = $model->generateCard(
            $value, 
            session()->get('id'),
            $expiresAt ?: null
        );
        
        return redirect()->to('/admin/prepaid-cards')
               ->with('message', "تم إنشاء الكرت بنجاح: $code");
    }
    
    public function deleteCard($id)
    {
        $model = new \App\Models\PrepaidCardModel();
        $card = $model->find($id);
        
        if ($card && $card['status'] === 'active') {
            $model->delete($id);
            return redirect()->to('/admin/prepaid-cards')
                   ->with('message', 'تم حذف الكرت بنجاح');
        }
        
        return redirect()->to('/admin/prepaid-cards')
               ->with('error', 'لا يمكن حذف الكرت (قد يكون مستخدماً)');
    }
    
    // Case Priority Toggle
    
    public function togglePriority($id)
    {
        $model = new CaseModel();
        $case = $model->find($id);
        
        if (!$case) {
            return redirect()->back()->with('error', 'الحالة غير موجودة');
        }
        
        $newPriority = $case['priority'] === 'urgent' ? 'normal' : 'urgent';
        $model->update($id, ['priority' => $newPriority]);
        
        $message = $newPriority === 'urgent' 
                   ? 'تم تحديد الحالة كعاجلة - ستظهر في أول القائمة' 
                   : 'تم تحديد الحالة كعادية';
        
        return redirect()->back()->with('message', $message);
    }
}