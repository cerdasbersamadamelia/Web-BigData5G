<?php

namespace App\Models;

use CodeIgniter\Model;

class IMEIModel extends Model
{
    protected $table = 'summary_imei';
    protected $primaryKey = 'no_imei';
    protected $allowedFields = ['no_imei', 'time', 'kecamatan_imei', 'user_support_5G', 'percentage_percent', 'recommended_imei'];
    protected $useSoftDeletes = false;

    // Join table geojson and imei --> coverage imei
    public function getSummaryIMEI()
    {
        $builder = $this->db->table('geojson');
        $builder
            ->join('summary_imei', '`summary_imei`.`kecamatan_imei` = `geojson`.`kecamatan`');
        $query = $builder->get();
        return $query->getResultArray();
    }

    // --- FOR DATA ENGINEER ---
    // table imei
    public function getIMEI()
    {
        return $this->db->table('summary_imei')
            ->get()->getResultArray();
    }
}
