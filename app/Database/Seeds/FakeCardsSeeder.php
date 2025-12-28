<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FakeCardsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'card_number' => '4532015112830366',
                'expiry' => '12/25',
                'cvv' => '123',
                'balance' => 5000.00,
                'card_holder' => 'AHMED ALI',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'card_number' => '5425233430109903',
                'expiry' => '06/26',
                'cvv' => '456',
                'balance' => 10000.00,
                'card_holder' => 'FATIMA MOHAMMED',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'card_number' => '2221000010000015',
                'expiry' => '09/27',
                'cvv' => '789',
                'balance' => 2500.00,
                'card_holder' => 'OMAR HASSAN',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'card_number' => '4916012673059163',
                'expiry' => '03/28',
                'cvv' => '321',
                'balance' => 7500.00,
                'card_holder' => 'SARA IBRAHIM',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'card_number' => '5105105105105100',
                'expiry' => '12/24',
                'cvv' => '654',
                'balance' => 100.00,
                'card_holder' => 'ALI ABDULLAH',
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('fake_cards')->insertBatch($data);
        
        echo "تم إضافة " . count($data) . " بطاقات وهمية للاختبار\n";
    }
}
