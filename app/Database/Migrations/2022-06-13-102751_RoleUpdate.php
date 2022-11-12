<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RoleUpdate extends Migration
{
    public function up()
    {
        /*
         * Role Update Table
         */
        $this->forge->addField([
            'req_user_id'      => ['type' => 'INT', 'constraint' => 11, 'unique' => TRUE],
            'req_group_id'     => ['type' => 'INT', 'constraint' => 11],
            'req_active'       => ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 1],
        ]);

        // req_active
        // 0 -> not validated
        // 1 -> validated

        $this->forge->createTable('role_update');
    }

    public function down()
    {
        $this->forge->dropTable('role_update', true);
    }
}

// Create Migrations
// php spark migrate:create RoleUpdate

// Run Migrations
// php spark migrate