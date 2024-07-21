<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Reviewer extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'reviewer_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'null'           => true,
            ],
            'course_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'null'           => true,
            ],
            'comment_text' => [
                'type'       => 'TEXT',
                'null'       => true,
            ],
            'score' => [
                'type'       => 'INT',
                'constraint' => 100,
                'null'       => true,
            ],
            'created_at' => [
                'type'       => 'DATETIME',
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('reviewer_id', true);
        $this->forge->createTable('reviewer');
    }

    public function down()
    {
        $this->forge->dropTable('reviewer');
    }
}
