<?php

namespace App\Controllers;

use App\Models\CampaignModel;
use App\Models\CampaignRegistrationModel;

class CampaignController extends BaseController
{
    public function index()
    {
        $model = new CampaignModel();
        $campaigns = $model->findAll();
        return view('campaigns/index', ['campaigns' => $campaigns]);
    }

    public function details($id)
    {
        $model = new CampaignModel();
        $campaign = $model->find($id);

        if (!$campaign) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('campaigns/details', ['campaign' => $campaign]);
    }

    public function create()
    {
        return view('campaigns/create');
    }

    public function store()
    {
        $rules = [
            'title' => 'required|min_length[5]',
            'description' => 'required',
            'event_date' => 'required',
            'location' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new CampaignModel();
        $model->save([
            'user_id' => session()->get('id'),
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'event_date' => $this->request->getPost('event_date'),
            'location' => $this->request->getPost('location'),
            'image' => 'https://placehold.co/600x400', // Placeholder for now
            'status' => 'pending'
        ]);

        return redirect()->to('/campaigns')->with('success', 'تم اقتراح الحملة بنجاح، سيتم مراجعتها من قبل الإدارة.');
    }

    public function register()
    {
        $campaignId = $this->request->getPost('campaign_id');
        $name = $this->request->getPost('name');
        $phone = $this->request->getPost('phone');

        if (!$campaignId || !$name || !$phone) {
            return redirect()->back()->with('error', 'الرجاء ملء جميع الحقول');
        }

        $model = new CampaignRegistrationModel();
        
        // Check for duplicate registration
        $exists = $model->where('campaign_id', $campaignId)
                        ->where('phone', $phone)
                        ->first();

        if ($exists) {
            return redirect()->back()->with('error', 'هذا الرقم مسجل بالفعل في هذه الحملة');
        }

        // Generate OTP
        $otp = rand(1000, 9999);
        
        // Store in session
        session()->set('campaign_registration', [
            'campaign_id' => $campaignId,
            'name' => $name,
            'phone' => $phone,
            'otp' => $otp
        ]);

        // Send OTP via SMS (flash for demo)
        session()->setFlashdata('otp_sent', "رمز التحقق: <b>$otp</b> (في التطبيق الفعلي سيتم إرساله عبر SMS)");

        return redirect()->to('/campaigns/verify');
    }
    
    public function verify()
    {
        if (!session()->has('campaign_registration')) {
            return redirect()->to('/campaigns');
        }
        
        return view('campaigns/verify');
    }
    
    public function confirm()
    {
        $inputOtp = $this->request->getPost('otp');
        $sessionData = session()->get('campaign_registration');
        
        if (!$sessionData || $inputOtp != $sessionData['otp']) {
            return redirect()->back()->with('error', 'رمز التحقق غير صحيح');
        }
        
        // Save registration
        $model = new CampaignRegistrationModel();
        $model->save([
            'campaign_id' => $sessionData['campaign_id'],
            'name' => $sessionData['name'],
            'phone' => $sessionData['phone'],
            'created_at' => date('Y-m-d H:i:s')
        ]);

        // Clear session
        session()->remove('campaign_registration');

        return redirect()->to('/campaigns')->with('success', 'تم التسجيل في الحملة بنجاح');
    }
}
