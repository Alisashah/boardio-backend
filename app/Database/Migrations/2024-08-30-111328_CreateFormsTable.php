<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFormsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
            'type'  => 'INT',
            'constraint'  => 5,
            'unsigned' => true,
            'auto_increment' => true,
            ],
            'title' => [
            'type'  => 'VARCHAR',
            'constraint' => '255',
            ],
            'description' => [
           'type' => 'TEXT',
            'null' => true,
            ],
            'fields'=> [
            'type' => 'TEXT',
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
            $this->forge->createTable('forms');
        }
    public function down()
    {
        $this->forge->dropTable('forms');
    }
}
