<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAnnouncementsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
            'type' => 'INT',
           
            'constraint' => 5,
            'unsigned'
           
           
            => true,
            'auto_increment' => true,
            ],
            'title' => [
            'type'
           
            => 'VARCHAR',
            'constraint' => '255',
            ],
            'message'
            => [
            'type' => 'TEXT',
            ],
            'target_audience' => [
            'type'
            => 'VARCHAR',
            'constraint' => '50',
            ],
            'created_by' => [
            'type'
           
            => 'INT',
            'constraint' => 5,
            'unsigned' => true,
            ],
            'created_at'
            => [
            'type' => 'DATETIME',
            'null' => true,
            ],
            'updated_at'
            => [
            'type' => 'DATETIME',
            'null' => true,
            ],
            'deleted_at'
            => [
            'type' => 'DATETIME',
            'null' => true,
            ],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->createTable('announcements');    }

    public function down()
    {
        $this->forge->dropTable('announcements');
    }
}
