<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBloodTables extends Migration
{
    public function up()
    {
        // Blood Requests Table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'patient_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'blood_type' => [
                'type' => 'VARCHAR',
                'constraint' => 5, // A+, AB-, etc.
            ],
            'hospital' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'city' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'urgency' => [
                'type' => 'ENUM',
                'constraint' => ['normal', 'critical'],
                'default' => 'normal',
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['active', 'fulfilled'],
                'default' => 'active',
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('blood_requests');

        // Blood Donors Table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'request_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('request_id', 'blood_requests', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('blood_donors');
    }

    public function down()
    {
        $this->forge->dropTable('blood_donors');
        $this->forge->dropTable('blood_requests');
    }
}
