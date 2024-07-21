<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OutlineCourse extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'outlinecourse_id' => [
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
            'description' => [
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
        $this->forge->addKey('outlinecourse_id', true);
        $this->forge->createTable('outlinecourse');
    }

    public function down()
    {
        $this->forge->dropTable('outlinecourse');
    }
}
