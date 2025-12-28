<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePrepaidCardsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'card_code' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'unique'     => true,
            ],
            'card_value' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['active', 'used', 'expired'],
                'default'    => 'active',
            ],
            'used_by_case_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
            'used_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'expires_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'created_by_admin_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('used_by_case_id', 'cases', 'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('created_by_admin_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('prepaid_cards');
    }

    public function down()
    {
        $this->forge->dropTable('prepaid_cards');
    }
}
