<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mentor extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'mentor_id' => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name_mentor' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'contact' => [
                'type'       => 'VARCHAR',
                'constraint' => 12,
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'was_born' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
            'total_point' => [
                'type'       => 'INT',
                'null'       => true,
            ],
            'address' => [
                'type'       => 'TEXT',
            ],
            'avatar' => [
                'type'       => 'VARCHAR',
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
        $this->forge->addKey('mentor_id', true);
        $this->forge->createTable('mentor');
    }

    public function down()
    {
        $this->forge->dropTable('mentor');
    }
}
