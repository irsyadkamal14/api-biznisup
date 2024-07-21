<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Submodul extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'submodul_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'modul_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'null'           => true,
            ],
            'submodul_title' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'submodul_icon' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'submodul_description' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'submodul_content' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'submodul_lesson' => [
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
        $this->forge->addKey('submodul_id', true);
        $this->forge->createTable('submodul');
    }

    public function down()
    {
        $this->forge->dropTable('outlinecourse');
    }
}
