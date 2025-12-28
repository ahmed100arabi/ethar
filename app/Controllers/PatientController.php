<?php

namespace App\Controllers;

use App\Models\CaseModel;
use App\Models\DonationModel;

class PatientController extends BaseController
{
    public function index()
    {
        $userId = session()->get('id');
        $caseModel = new CaseModel();
        $donationModel = new DonationModel();

        // Stats
        $activeRequests = $caseModel->where('user_id', $userId)->where('status', 'approved')->countAllResults();
        $pendingRequests = $caseModel->where('user_id', $userId)->where('status', 'pending')->countAllResults();
        
        // Calculate total donations for user's cases
        $userCases = $caseModel->where('user_id', $userId)->findColumn('id') ?? [];
        $totalDonations = 0;
        if (!empty($userCases)) {
            $donations = $donationModel->whereIn('case_id', $userCases)->where('status', 'approved')->findAll();
            foreach ($donations as $donation) {
                $totalDonations += $donation['amount'];
            }
        }

        $stats = [
            'active_requests' => $activeRequests,
            'total_donations' => $totalDonations,
            'pending_requests' => $pendingRequests,
            'completed_requests' => 0 // Can be implemented later
        ];

        return view('patient/dashboard', ['stats' => $stats]);
    }

    public function createRequest()
    {
        return view('patient/create_request');
    }

    public function storeRequest()
    {
        $model = new CaseModel();
        
        // Handle Image Upload
        $file = $this->request->getFile('image');
        $imagePath = '';
        
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads/cases', $newName);
            $imagePath = '/uploads/cases/' . $newName;
        } else {
            // Default placeholder if no image
            $imagePath = 'https://placehold.co/600x400/e2e8f0/1e293b?text=No+Image';
        }

        $category = $this->request->getPost('category');
        $amount = $this->request->getPost('amount');

        // If category is Blood Donation, amount is 0
        if ($category === 'تبرع بالدم') {
            $amount = 0;
        }

        // Generate default nickname if not provided
        $nickname = $this->request->getPost('patient_nickname');
        if (empty($nickname)) {
            $nickname = 'مريض ' . rand(1000, 9999);
        }

        // Handle city "other" option
        $city = $this->request->getPost('city');
        $cityOther = null;
        if ($city === 'أخرى') {
            $cityOther = $this->request->getPost('city_other');
            if (empty($cityOther)) {
                return redirect()->back()->with('error', 'الرجاء إدخال اسم المدينة');
            }
        }

        $data = [
            'user_id' => session()->get('id'),
            'title' => $this->request->getPost('title'),
            'category' => $category,
            'city' => $city,
            'city_other' => $cityOther,
            'description' => $this->request->getPost('description'),
            'amount_required' => $amount,
            'amount_collected' => 0,
            'image' => $imagePath,
            'status' => 'pending',
            'priority' => 'normal',
            'patient_nickname' => $nickname
        ];

        $model->save($data);

        return redirect()->to('/patient/my-requests')->with('message', 'تم تقديم الطلب بنجاح');
    }

    public function myRequests()
    {
        $userId = session()->get('id');
        $model = new CaseModel();
        $requests = $model->where('user_id', $userId)->orderBy('created_at', 'DESC')->findAll();

        $bloodModel = new \App\Models\BloodRequestModel();
        $bloodRequests = $bloodModel->where('user_id', $userId)->orderBy('created_at', 'DESC')->findAll();

        return view('patient/my_requests', [
            'requests' => $requests,
            'bloodRequests' => $bloodRequests
        ]);
    }

    public function donors()
    {
        $userId = session()->get('id');
        $caseModel = new CaseModel();
        $donationModel = new DonationModel();

        $userCases = $caseModel->where('user_id', $userId)->findColumn('id') ?? [];
        $donors = [];

        if (!empty($userCases)) {
            $donors = $donationModel->select('donations.*, cases.title as request_title')
                                    ->join('cases', 'cases.id = donations.case_id')
                                    ->whereIn('case_id', $userCases)
                                    ->where('donations.status', 'approved')
                                    ->findAll();
        }

        return view('patient/donors', ['donors' => $donors]);
    }
    public function createBloodRequest()
    {
        return view('patient/blood_request');
    }

    public function storeBloodRequest()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('blood_requests');

        $data = [
            'user_id' => session()->get('id'),
            'patient_name' => $this->request->getPost('patient_name'),
            'blood_type' => $this->request->getPost('blood_type'),
            'hospital' => $this->request->getPost('hospital'),
            'city' => $this->request->getPost('city'),
            'urgency' => $this->request->getPost('urgency'),
            'phone' => $this->request->getPost('phone'),
            'status' => 'pending', 
            'created_at' => date('Y-m-d H:i:s')
        ];

        $builder->insert($data);

        return redirect()->to('/patient/my-requests')->with('message', 'تم تقديم طلب التبرع بالدم بنجاح');
    }
}
