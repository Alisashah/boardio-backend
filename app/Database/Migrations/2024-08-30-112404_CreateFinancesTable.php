<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFinancesTable extends Migration
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
            'type' => [
            'type' => 'VARCHAR','constraint' => '50',
            ],
            'amount'=> [
            'type' => 'DECIMAL',
            'constraint' => '10,2',
            ],
            'description' => [
            'type'
            => 'TEXT',
            'null' => true,
            ],
            'date' => [ 'type' => 'DATE',
            ],
            'category' => [
            'type' => 'VARCHAR',
            'constraint' => '50',
            ],
            'created_by' => [
            'type' => 'INT',
            'constraint' => 5,
            'unsigned' => true,
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
            $this->forge->createTable('finances');    }

    public function down()
    {
        $this->forge->dropTable('finances');
    }
}
