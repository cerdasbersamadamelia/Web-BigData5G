<?php

namespace App\Models;

use CodeIgniter\Model;

class IMEIPayloadModel extends Model
{
    // Join table geojson, imei, and payload --> coverage payload and coverage imei-payload
    public function getSummary()
    {
        $builder = $this->db->table('geojson');
        $builder
            ->join('summary_imei', '`summary_imei`.`kecamatan_imei` = `geojson`.`kecamatan`')
            ->join('summary_payload', '`summary_payload`.`kecamatan_payload` = `geojson`.`kecamatan`');
        $query = $builder->get();
        return $query->getResultArray();
    }

    // --- FOR DATA ENGINEER ---
    // table geojson
    public function getgeojson()
    {
        return $this->db->table('geojson')
            ->get()->getResultArray();
    }
}
