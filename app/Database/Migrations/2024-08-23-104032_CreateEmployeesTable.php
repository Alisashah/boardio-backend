<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEmployeesTable extends Migration
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
            'name' => [
            'type' => 'VARCHAR',
            'constraint' => '100',
            ],
            'email' => [
            'type' => 'VARCHAR',
           'constraint' => '100',
           'unique'=> true
            ],
            'phone'=> [
            'type' => 'VARCHAR',
            'constraint' => '20',
            'unique'=> true
            ],
            'department' => [
            'type'=> 'VARCHAR',
            'constraint' => '100',
            ],
            'position' => [
            'type'=> 'VARCHAR',
            'constraint' => '100',
            ],
            'photo'=> [
            'type'=> 'VARCHAR',
            'constraint' => '255',
            'null'
            => true,
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
            $this->forge->createTable('employees');
    }

    public function down()
    {
        $this->forge->dropTable('employees');

    }
}
