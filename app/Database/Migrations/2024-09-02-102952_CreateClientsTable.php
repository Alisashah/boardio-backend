<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateClientsTable extends Migration
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
            'name'=> [
            'type' => 'VARCHAR',
            'constraint' => '100',
            ],
            'email' => [
            'type' => 'VARCHAR',
            'constraint' => '100',
            ],
            'phone' => [
            'type' => 'VARCHAR',
            'constraint' => '15',
            ],
            'company' => [
            'type'
            => 'VARCHAR',
            'constraint' => '100',
            ],
            'address' => [
            'type' => 'TEXT',
            'null' => true,
           ],
            'notes' => [
            'type' => 'TEXT',
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
            $this->forge->createTable('clients');    }

    public function down()
    {
        $this->forge->dropTable('clients');
    }
}
