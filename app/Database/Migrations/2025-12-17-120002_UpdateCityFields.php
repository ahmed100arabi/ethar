<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateCityFields extends Migration
{
    public function up()
    {
        // Add city_other field to cases table
        $fields = [
            'city_other' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
                'after'      => 'city'
            ],
        ];
        
        $this->forge->addColumn('cases', $fields);
        $this->forge->addColumn('blood_requests', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('cases', 'city_other');
        $this->forge->dropColumn('blood_requests', 'city_other');
    }
}
