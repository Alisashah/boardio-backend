<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEmployeeCertificatesTable extends Migration
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
            'employee_id'=> [
            'type' => 'INT',
            'constraint' => 5,
            'unsigned' => true,
            ],
            'CONSTRAINT FOREIGN KEY (employee_id) REFERENCES employees(id)',
            'certificate_type' => [
            'type'=> 'VARCHAR',
            'constraint' => '50',
            ],
            'month'  => [
            'type'=> 'VARCHAR',
            'constraint' => '20',
            ],
            'year'  => [
            'type'=> 'VARCHAR',
            'constraint' => '4',
            ],
            'file_path' => [
            'type'=> 'VARCHAR',
            'constraint' => '255',
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
            $this->forge->createTable('employee_certificates');    }

    public function down()
    {
        $this->forge->dropTable('employee_certificates');
    }
}
