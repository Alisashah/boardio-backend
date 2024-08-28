<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTimesheetsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=> [
            'type' => 'INT',
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
            'date'=> [
            'type' => 'DATE',
            ],
            'hours_worked' => [
            'type'=> 'DECIMAL',
            'constraint' => '5,2',
            ],
            'breaks' => [
            'type'=> 'DECIMAL',
            'constraint' => '5,2',
            'null'=> true,
            ],
            'total_hours' => [
            'type'=> 'DECIMAL',
            'constraint' => '5,2',
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
            $this->forge->createTable('timesheets');    }

    public function down()
    {
        $this->forge->dropTable('timesheets');
    }
}
