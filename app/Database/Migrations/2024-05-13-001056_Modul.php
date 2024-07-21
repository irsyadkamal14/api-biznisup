<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Modul extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'modul_id' => [
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
            'modul_title' => [
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
        $this->forge->addKey('modul_id', true);
        $this->forge->createTable('modul');
    }

    public function down()
    {
        $this->forge->dropTable('outlinecourse');
    }
}
