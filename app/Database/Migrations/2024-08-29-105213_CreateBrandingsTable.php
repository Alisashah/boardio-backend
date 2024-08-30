<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBrandingsTable extends Migration
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
            'tenant_id'=> [
            'type' => 'INT',
            'constraint' => 5,
            'unsigned' => true,
            ],
            'logo' => [
            'type' => 'VARCHAR',
            'constraint' => '255',
            'null' => true,
            ],
            'primary_color' => [
            'type' => 'VARCHAR',
            'constraint' => '7',
            'null' => true,
            ],
            'secondary_color'=> [
            'type' => 'VARCHAR',
            'constraint' => '7',
            'null' => true,
            ],
            'theme'  => [
            'type' => 'VARCHAR',
            'constraint' => '20',
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
            $this->forge->createTable('brandings');
        }
    public function down()
    {
        $this->forge->dropTable('brandings');
    }
}
