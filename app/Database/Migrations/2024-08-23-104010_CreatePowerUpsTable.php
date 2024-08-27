<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePowerUpsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
            'type' => 'INT',
            'constraint'  => 5,
            'unsigned' => true,
            'auto_increment' => true,
            ],
            'name' => [
            'type'=> 'VARCHAR',
            'constraint' => '100',
            ],
            'config' => [
            'type' => 'TEXT',
            'null' => true,
            ],
            'enabled'=> [
            'type' => 'BOOLEAN',
            'default' => true,
            ],
            'board_id' => [
            'type'=> 'INT',
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
            $this->forge->createTable('power_ups');
           
    }

    public function down()
    {
        $this->forge->dropTable('power_ups');
        
    }
}
