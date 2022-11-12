<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Threshold extends Migration
{
    public function up()
    {
        /*
         * Threshold Table
         */
        $this->forge->addField([
            'id'                       => ['type' => 'INTEGER', 'auto_increment' => true],
            'imei_threshold'           => ['type' => 'DOUBLE'],
            'payload_threshold'        => ['type' => 'DOUBLE'],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('threshold');
    }

    public function down()
    {
        $this->forge->dropTable('threshold', true);
    }
}

// Create Migrations
// php spark migrate:create Threshold

// Run Migrations
// php spark migrate