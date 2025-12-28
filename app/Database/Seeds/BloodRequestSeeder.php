<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BloodRequestSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'patient_name' => 'محمد علي',
                'blood_type' => 'O+',
                'hospital' => 'مستشفى طرابلس المركزي',
                'city' => 'طرابلس',
                'urgency' => 'critical',
                'phone' => '0911234567',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'patient_name' => 'سالمة أحمد',
                'blood_type' => 'A-',
                'hospital' => 'مركز بنغازي الطبي',
                'city' => 'بنغازي',
                'urgency' => 'critical',
                'phone' => '0929876543',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'patient_name' => 'عبدالله عمر',
                'blood_type' => 'B+',
                'hospital' => 'مستشفى مصراتة للسرطان',
                'city' => 'مصراتة',
                'urgency' => 'normal',
                'phone' => '0915556677',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s', strtotime('-2 hours')),
            ],
            [
                'patient_name' => 'فاطمة حسن',
                'blood_type' => 'AB+',
                'hospital' => 'مستشفى الزاوية التعليمي',
                'city' => 'الزاوية',
                'urgency' => 'normal',
                'phone' => '0941112233',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s', strtotime('-1 day')),
            ]
        ];

        $this->db->table('blood_requests')->insertBatch($data);
    }
}
