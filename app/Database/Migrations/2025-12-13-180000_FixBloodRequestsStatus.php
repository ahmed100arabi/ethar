<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FixBloodRequestsStatus extends Migration
{
    public function up()
    {
        // Modify status column to be VARCHAR to support 'pending', 'active', 'rejected', 'fulfilled'
        // In SQLite, we can't easily modify, so we might need to recreate or just rely on it being TEXT.
        // But to be safe and explicit, let's try to modify it.
        // Since CI4 forge modifyColumn support for SQLite is limited, we'll assume it's needed.
        
        $fields = [
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'default' => 'pending',
            ],
        ];
        
        // Try to modify. If it fails (SQLite), we might need a raw query or ignore if it's already loose.
        // But for MySQL this is important.
        $this->forge->modifyColumn('blood_requests', $fields);
    }

    public function down()
    {
        // Revert is hard without knowing exact previous state perfectly, but we can leave it as VARCHAR.
    }
}
