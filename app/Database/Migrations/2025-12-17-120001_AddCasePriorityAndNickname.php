<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCasePriorityAndNickname extends Migration
{
    public function up()
    {
        $fields = [
            'priority' => [
                'type'       => 'ENUM',
                'constraint' => ['normal', 'urgent'],
                'default'    => 'normal',
                'after'      => 'status'
            ],
            'patient_nickname' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => true,
                'after'      => 'priority'
            ],
        ];
        
        $this->forge->addColumn('cases', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('cases', ['priority', 'patient_nickname']);
    }
}
