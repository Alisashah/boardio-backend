<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePayrollsTable extends Migration
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
            'employee_id' => [
            'type'
            => 'INT',
            'constraint' => 5,
            'unsigned' => true,
            ],
            'CONSTRAINT FOREIGN KEY (employee_id) REFERENCES employees(id)',
            'salary' => [
            'type' => 'DECIMAL',
            'constraint' => '10,2',
            ],
            'bonus' => [
            'type' => 'DECIMAL',
            'constraint' => '10,2',
            'null' => true,
            ],
            'deductions' => [
            'type' => 'DECIMAL',
            'constraint' => '10,2',
            'null' => true,
            ],
            'month' => [
            'type' => 'VARCHAR',
            'constraint' => '20',
            ],
            'year' => [
            'type' => 'VARCHAR',
            'constraint' => '4',
            ],
            'status'=> [
            'type'=> 'VARCHAR',
            'constraint' => '20',
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
            $this->forge->createTable('payrolls');
    }

    public function down()
    {
        $this->forge->dropTable('payrolls');
    }
}
