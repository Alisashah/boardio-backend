<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateReportsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
           'type' => 'INT',
            'constraint' => 5,
            'unsigned'  => true,
            'auto_increment' => true,
            ],
            'title' => [
            'type' => 'VARCHAR',
            'constraint' => '100',
            ],
            'type' => [
            'type'=> 'VARCHAR',
            'constraint' => '50',
            ],
            'parameters' => [
            'type'=> 'TEXT',
            'null' => true,
            ],
            'generated_at'=> [
            'type' => 'DATETIME',
            'null' => true,
            ],
            'file_path' => [
            'type'=> 'VARCHAR',
            'constraint' => '255',
            'null'=> true,
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
            $this->forge->createTable('reports');
    }

    public function down()
    {
        $this->forge->dropTable('reports');

    }
}
