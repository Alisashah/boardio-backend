<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCardsTable extends Migration
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
            'name' => [
            'type' => 'VARCHAR',
            'constraint' => '100',
            ],
            'description' => [
            'type' => 'TEXT',
            'null' => true,
            ],
            'list_id' => [
            'type' => 'INT',
            'constraint' => 5,
            'unsigned' => true,
            ],
            'CONSTRAINT FOREIGN KEY (list_id) REFERENCES lists(id)',

            'order' => [
            'type' => 'INT',
            'constraint' => 5,
            'unsigned' => true,
            ],
            'due_date' => [
            'type' => 'DATETIME',
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
            $this->forge->createTable('cards');
    }

    public function down()
    {
        $this->forge->dropTable('cards');
    }
}
