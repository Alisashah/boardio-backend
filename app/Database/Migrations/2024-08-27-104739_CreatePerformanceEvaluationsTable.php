<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePerformanceEvaluationsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
            'type' => 'INT',
            'constraint'=> 5,
            'unsigned'=> true,
            'auto_increment' => true,
            ],
            'employee_id'  => [
            'type'=> 'INT',
            'constraint' => 5,
            'unsigned' => true,
            ],
            'CONSTRAINT FOREIGN KEY (employee_id) REFERENCES employees(id)',
            'evaluation_period' => [
            'type' => 'VARCHAR',
            'constraint' => '50',
            ],
            'score'=> [
            'type' => 'INT',
            'constraint' => 5,
            ],
            'comments'=> [
            'type' => 'TEXT',
           'null' => true,
            ],
            'created_at'=> [
            'type' => 'DATETIME',
            'null' => true,
            ],
            'updated_at'=> [
            'type' => 'DATETIME',
            'null' => true,
            ],
            'deleted_at'=> [
            'type' => 'DATETIME',
            'null' => true,
            ],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->createTable('performance_evaluations');
    }

    public function down()
    {
        $this->forge->dropTable('performance_evaluations');
    }
}
