<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePublicEmployeeProfilesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
            'type'=> 'INT',
            'constraint' => 5,
            'unsigned' => true,
            'auto_increment' => true,
            ],
            'employee_id'=> [
            'type'=> 'INT',
            'constraint' => 5,
            'unsigned' => true,
            ],
            'CONSTRAINT FOREIGN KEY (employee_id) REFERENCES employees(id)',
            'public_info' => [
            'type'=> 'TEXT',
            'null' => true,
            ],
            'achievements' => [
            'type'=> 'TEXT',
            'null' => true,
            ],
            'certificates' => [
            'type'=> 'TEXT',
            'null'=> true,
           ],
            'created_at'=> [
            'type' => 'DATETIME',
            'null' => true,
            ],
            'updated_at'=> [
            'type' => 'DATETIME',
            'null' => true,
            ],
            'deleted_at'=> [
            'type' => 'DATETIME',
            'null' => true,
            ],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->createTable('public_employee_profiles');
    }

    public function down()
    {
        $this->forge->dropTable('public_employee_profiles');
    }
}
