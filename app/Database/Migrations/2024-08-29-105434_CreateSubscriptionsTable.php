<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSubscriptionsTable extends Migration
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
            'tenant_id' => [
            'type' => 'INT',
            'constraint' => 5,
            'unsigned' => true,
            ],
            'plan_name' => [
           'type' => 'VARCHAR',
            'constraint' => '100',
            ],
            'price' => [
            'type' => 'DECIMAL',
            'constraint' => '10,2',
            ],
            'start_date' => [
            'type' => 'DATE',
            ],
            'end_date' => [
            'type' => 'DATE',
            ],
            'status' => [
            'type' => 'VARCHAR',
            'constraint' => '20',
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
            $this->forge->createTable('subscriptions');    }

    public function down()
    {
        $this->forge->dropTable('subscriptions');
    }
}
