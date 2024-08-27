<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAttendanceTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
            'type' => 'INT',
            'constraint' => 5,
            'unsigned' => true,
            'auto_increment' => true,
            ],
            'employee_id' => [
            'type' => 'INT',
            'constraint' => 5,
            'unsigned' => true,
            ],
            'CONSTRAINT FOREIGN KEY (employee_id) REFERENCES employees(id)',
            'date' => [
            'type' => 'DATE',
            ],
            'status'=> [
            'type' => 'VARCHAR',
            'constraint' => '20',
            ],
            'check_in' => [
            'type' => 'TIME',
            'null' => true,
            ],
            'check_out' => [
            'type' => 'TIME',
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
            $this->forge->createTable('attendance');
            
    }

    public function down()
    {
        $this->forge->dropTable('attendance');

    }
}
