<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserCourse extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'usercourse_id' => [
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
            'user_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'null'           => true,
            ],
            
            'created_at' => [
                'type'       => 'DATETIME',
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('usercourse_id', true);
        $this->forge->createTable('usercourse');
    }

    public function down()
    {
        $this->forge->dropTable('usercourse');
    }
}
