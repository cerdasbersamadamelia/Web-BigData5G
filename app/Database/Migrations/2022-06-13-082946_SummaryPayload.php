<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SummaryPayload extends Migration
{
    public function up()
    {
        /*
         * Summary Payload Table
         */
        $this->forge->addField([
            'no payload'            => ['type' => 'BIGINT', 'constraint' => 20],
            'time'                  => ['type' => 'BIGINT', 'constraint' => 20],
            'kecamatan payload'     => ['type' => 'TEXT'],
            'payload_mbyte'         => ['type' => 'DOUBLE'],
            'recommended payload'   => ['type' => 'TEXT'],
        ]);
        $this->forge->createTable('summary_payload');
    }

    public function down()
    {
        $this->forge->dropTable('summary_payload', true);
    }
}

// Create Migrations
// php spark migrate:create SummaryPayload

// Run Migrations
// php spark migrate