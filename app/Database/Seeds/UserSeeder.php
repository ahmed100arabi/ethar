<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name'     => 'Admin',
                'email'    => 'admin', // Using username as email for simplicity based on request
                'password' => password_hash('0000', PASSWORD_DEFAULT),
                'role'     => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name'     => 'User',
                'email'    => 'user',
                'password' => password_hash('0000', PASSWORD_DEFAULT),
                'role'     => 'user',
                'created_at' => date('Y-m-d H:i:s'),
            ]
        ];

        // Using Query Builder
        $this->db->table('users')->insertBatch($data);
    }
}
