<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Skill extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'skill_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'skill' => [
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
        $this->forge->addKey('skill_id', true);
        $this->forge->createTable('skill');
    }

    public function down()
    {
        $this->forge->dropTable('skill');
    }
}
