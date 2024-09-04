<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTicketsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'
             => [
             'type' => 'INT',
             'constraint' => 5,
             'unsigned'=> true,
             'auto_increment' => true,
             ],
             'user_id' => [
             'type' => 'INT',
             'constraint' => 5,
             'unsigned' => true,
             ],
             'CONSTRAINT FOREIGN KEY (user_id) REFERENCES users(id)',

             'title' => [
             'type'=> 'VARCHAR',
             'constraint' => '255',
             ],
             'description' => [
             'type' => 'TEXT',
             ],
             'status'
             => [
             'type'
             => 'VARCHAR',
             'constraint' => '50',
             ],
             'type' => [
             'type' => 'VARCHAR',
             'constraint' => '50',
             ],
             'priority' => [
             'type'=> 'VARCHAR',
             'constraint' => '50',
             ],
             'created_by' => [
             'type'
             => 'INT',
             'constraint' => 5,
             'unsigned' => true,
             ],
             
             'assigned_to' => [
             'type'
             => 'INT',
             'constraint' => 5,
             'unsigned' => true,
             ],
             'resolved_at' => [
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
             $this->forge->createTable('tickets');    }

    public function down()
    {
        $this->forge->dropTable('tickets');
    }
}
