<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSocialProfilesToEmployees extends Migration
{
    public function up()
    {
        $fields = [
            'linkedin' => [
            'type'
            => 'VARCHAR',
            'constraint' => '255',
            'null'
            => true,
            ],
            'facebook' => [
            'type'
            => 'VARCHAR',
            'constraint' => '255',
            'null'
            => true,
           ],
            'instagram' => [
            'type'
            => 'VARCHAR',
            'constraint' => '255',
            'null'
            => true,
            ],
            ];
            $this->forge->addColumn('employees', $fields);
        }

    public function down()
    {
        $this->forge->dropColumn('employees', 'linkedin');
        $this->forge->dropColumn('employees', 'facebook');
        $this->forge->dropColumn('employees', 'instagram');
    }
}
