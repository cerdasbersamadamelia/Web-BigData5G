<?php

namespace App\Models;

use CodeIgniter\Model;

class ThresholdModel extends Model
{
    // table threshold
    protected $table = 'threshold';
    protected $primaryKey = 'id';
    protected $allowedFields = ['imei_threshold', 'payload_threshold'];
    protected $useSoftDeletes = false;
}
