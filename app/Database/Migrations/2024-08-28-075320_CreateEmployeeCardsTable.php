<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEmployeeCardsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
            'type'  => 'INT',
            'constraint' => 5,
            'unsigned'=> true,
            'auto_increment' => true,
            ],
            'employee_id' => [
            'type'=> 'INT',
            'constraint' => 5,
            'unsigned' => true,
            ],
            'CONSTRAINT FOREIGN KEY (employee_id) REFERENCES employees(id)',
            'card_number' => [
            'type'=> 'VARCHAR',
            'constraint' => '50',
            ],
            'issue_date' => [
            'type' => 'DATE',
            ],
            'expiry_date' => [
            'type' => 'DATE',
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
            $this->forge->createTable('employee_cards');    }

    public function down()
    {
        $this->forge->dropTable('employee_cards');
    }
}
