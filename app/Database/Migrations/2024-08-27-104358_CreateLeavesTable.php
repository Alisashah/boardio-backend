<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLeavesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
            'type'=> 'INT',
            'constraint'=> 5,
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
            'leave_type' => [
            'type'
            => 'VARCHAR',
            'constraint' => '50',
            ],
            'start_date' => [
           'type' => 'DATE',
            ],
            'end_date' => [
            'type' => 'DATE',
            ],
            'status'
            => [
            'type'
            => 'VARCHAR',
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
            $this->forge->createTable('leaves');
            
    }

    public function down()
    {
        $this->forge->dropTable('leaves');
    }
}
