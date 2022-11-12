<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Geojson extends Migration
{
    public function up()
    {
        /*
         * geojson Table
         */
        $this->forge->addField([
            'kecamatan'      => ['type' => 'VARCHAR', 'constraint' => 20],
            'geojson'        => ['type' => 'VARCHAR', 'constraint' => 100],
        ]);
        $this->forge->createTable('geojson');
    }

    public function down()
    {
        $this->forge->dropTable('geojson', true);
    }
}

// Create Migrations
// php spark migrate:create Geojson

// Run Migrations
// php spark migrate