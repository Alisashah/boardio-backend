<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOnboardingTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'
            => [
            'type' => 'INT',
            'constraint' => 5,
            'unsigned' => true,
            'auto_increment' => true,
            ],
            'employee_id' => [
            'type'
            => 'INT',
            'constraint' => 5,
            'unsigned' => true,
            ],
            'CONSTRAINT FOREIGN KEY (employee_id) REFERENCES employees(id)',

            'status' => [
            'type'  => 'VARCHAR',
            'constraint' => '20',
            ],
            'start_date' => [
            'type' => 'DATE',
            ],
            'end_date' => [
            'type' => 'DATE',
            ],
            'documents' => [
            'type'
            => 'TEXT',
            'null' => true,
            ],
           
            'created_at' => [
            'type' => 'DATETIME',
            'null' => true,
            ],
            'updated_at' => [
            'type' => 'DATETIME',
            'null' => true,
            ],
            'deleted_at' => [
            'type' => 'DATETIME',
            'null' => true,
            ],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->createTable('onboarding');    }

    public function down()
    {
        $this->forge->dropTable('onboarding');
    }
}
