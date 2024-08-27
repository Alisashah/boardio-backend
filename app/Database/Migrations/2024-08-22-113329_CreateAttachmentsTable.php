<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAttachmentsTable extends Migration
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
            'filename' => [
            'type'
            => 'VARCHAR',
            'constraint' => '255',
            ],
            'file_path' => [
            'type'
            => 'VARCHAR',
            'constraint' => '255',
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
            $this->forge->createTable('attachments');
    }

    public function down()
    {
        $this->forge->dropTable('attachments');

    }
}
