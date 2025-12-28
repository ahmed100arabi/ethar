<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateTablesForApproval extends Migration
{
    public function up()
    {
        // Update blood_requests table
        // SQLite doesn't support modifying columns easily, so we'll add new ones or recreate.
        // For simplicity in this environment, we'll add user_id. 
        // The 'status' column already exists in blood_requests (active/fulfilled). 
        // We need to ensure it supports 'pending' and 'rejected'. 
        // Since it's SQLite, we can't just alter the ENUM constraint. 
        // However, CodeIgniter's SQLite driver treats ENUM as TEXT usually.
        // We will just add user_id. The status logic will be handled in the application layer 
        // (we'll just insert 'pending' and it should work if it's TEXT, or we might need to recreate if strict).
        // Let's check the previous migration. It was ENUM. In SQLite, that's usually just a check constraint or text.
        // We will add user_id first.
        
        $fields = [
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
                'after' => 'id'
            ]
        ];
        $this->forge->addColumn('blood_requests', $fields);

        // Update campaigns table
        // Campaigns table didn't have status or user_id.
        $campaignFields = [
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
                'after' => 'id'
            ],
            'status' => [
                'type' => 'VARCHAR', // Using VARCHAR to be safe with SQLite
                'constraint' => 20,
                'default' => 'pending',
                'after' => 'description'
            ]
        ];
        $this->forge->addColumn('campaigns', $campaignFields);
    }

    public function down()
    {
        $this->forge->dropColumn('blood_requests', 'user_id');
        $this->forge->dropColumn('campaigns', ['user_id', 'status']);
    }
}
