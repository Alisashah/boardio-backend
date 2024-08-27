<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDueDatesTable extends Migration
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
            'due_date' => [
            'type' => 'DATETIME',
            ],
            'reminder' => [
            'type' => 'DATETIME',
            'null' => true,
            ],
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
            $this->forge->createTable('due_dates');
    }

    public function down()
    {
        $this->forge->dropTable('due_dates');

    }
}
