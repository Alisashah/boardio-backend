<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCommentsTable extends Migration
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
            'content' => [
            'type' => 'TEXT',
            ],
            'user_id' => [
            'type'=> 'INT',
            'constraint' => 5,
            'unsigned' => true,
            ],
            'CONSTRAINT FOREIGN KEY (user_id) REFERENCES users(id)',

            'card_id' => [
            'type' => 'INT',
            'constraint' => 5,
            'unsigned' => true,
            ],
            'CONSTRAINT FOREIGN KEY (card_id) REFERENCES cards(id)',

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
            $this->forge->createTable('comments');
    }

    public function down()
    {
        $this->forge->dropTable('comments');
    }
}
