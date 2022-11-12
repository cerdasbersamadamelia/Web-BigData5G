<?php

namespace App\Models;

use CodeIgniter\Model;

class PayloadModel extends Model
{
    protected $table = 'summary_payload';
    protected $primaryKey = 'no_payload';
    protected $allowedFields = ['no_payload', 'time', 'kecamatan_payload', 'payload_MB', 'recommended_payload'];
    protected $useSoftDeletes = false;

    // --- FOR DATA ENGINEER ---
    // table payload
    public function getpayload()
    {
        return $this->db->table('summary_payload')
            ->get()->getResultArray();
    }
}
