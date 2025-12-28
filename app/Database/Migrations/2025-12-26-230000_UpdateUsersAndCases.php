<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateUsersAndCases extends Migration
{
    public function up()
    {
        // Update users table
        $this->forge->addColumn('users', [
            'phone' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => true,
                'after'      => 'role'
            ],
        ]);

        // Update cases table
        $this->forge->addColumn('cases', [
            'approved_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'after' => 'status'
            ],
            'is_critical' => [
                'type'       => 'BOOLEAN',
                'default'    => false,
                'after'      => 'approved_at'
            ],
            'patient_nickname' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
                'after'      => 'is_critical'
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'phone');
        $this->forge->dropColumn('cases', ['approved_at', 'is_critical', 'patient_nickname']);
    }
}
