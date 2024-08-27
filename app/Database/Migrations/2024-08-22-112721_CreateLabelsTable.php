<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLabelsTable extends Migration
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
            'color' => [
            'type' => 'VARCHAR',
            'constraint' => '7',
            ],
            'board_id' => [
            'type'
            => 'INT',
            'constraint' => 5,
            'unsigned' => true,
            ],
            'CONSTRAINT FOREIGN KEY (board_id) REFERENCES boards(id)',

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
            $this->forge->createTable('labels');
            
    }

    public function down()
    {
        $this->forge->dropTable('labels');

    }
}
