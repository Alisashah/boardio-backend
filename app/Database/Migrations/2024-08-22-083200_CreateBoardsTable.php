<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBoardsTable extends Migration
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
            'description' => [
            'type' => 'TEXT',
            'null' => true,
            ],
            'created_by' => [
            'type' => 'INT',
            'constraint' => 5,
            'unsigned' => true,
            ],
            'CONSTRAINT FOREIGN KEY (created_by) REFERENCES users(id)',
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
            $this->forge->createTable('boards');
    }

    public function down()
    {
        $this->forge->dropTable('boards');
    }
}
