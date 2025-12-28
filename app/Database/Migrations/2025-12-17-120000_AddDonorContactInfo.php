<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDonorContactInfo extends Migration
{
    public function up()
    {
        $fields = [
            'donor_email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
                'after'      => 'donor_name'
            ],
            'donor_phone' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => true,
                'after'      => 'donor_email'
            ],
        ];
        
        $this->forge->addColumn('donations', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('donations', ['donor_email', 'donor_phone']);
    }
}
