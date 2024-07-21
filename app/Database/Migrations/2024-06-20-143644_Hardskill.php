<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Hardskill extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'hardskill_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'course_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'null'           => true,
            ],
            'title' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'created_at' => [
                'type'       => 'DATETIME',
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('hardskill_id', true);
        $this->forge->createTable('hardskill');
    }

    public function down()
    {
        $this->forge->dropTable('hardskill');
    }
}
