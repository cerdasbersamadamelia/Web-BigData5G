<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SummaryIMEI extends Migration
{
    public function up()
    {
        /*
         * Summary IMEI Table
         */
        $this->forge->addField([
            'no imei'               => ['type' => 'BIGINT', 'constraint' => 20],
            'time'                  => ['type' => 'BIGINT', 'constraint' => 20],
            'kecamatan imei'        => ['type' => 'TEXT'],
            'user support 5G'       => ['type' => 'BIGINT', 'constraint' => 20],
            'percentage_percent'    => ['type' => 'DOUBLE'],
            'recommended imei'      => ['type' => 'TEXT'],
        ]);
        $this->forge->createTable('summary_imei');
    }

    public function down()
    {
        $this->forge->dropTable('summary_imei', true);
    }
}

// Create Migrations
// php spark migrate:create SummaryIMEI

// Run Migrations
// php spark migrate