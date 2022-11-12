<?php

namespace App\Controllers;

use App\Models\IMEIModel;
use App\Models\IMEIPayloadModel;

class Coveragemap extends BaseController
{

    protected $imei_payload;

    public function __construct()
    {
        $this->imei_payload = new IMEIPayloadModel();
    }

    public function cimei()
    {
        $imeiModel = new IMEIModel();
        // Data
        $data = [
            'title' => 'Coverage Map: IMEI',
            'cimei' => $imeiModel->getSummaryIMEI()
        ];
        // View
        return view('coveragemap/cimei', $data);
    }

    public function cpayload()
    {
        // Data
        $data = [
            'title' => 'Coverage Map: Payload',
            'cpayload' => $this->imei_payload->getSummary()
        ];

        // View
        return view('coveragemap/cpayload', $data);
    }

    public function cimeipayload()
    {
        // Data
        $data = [
            'title' => 'Coverage Map: IMEI & Payload',
            'cimeipayload' => $this->imei_payload->getSummary()
        ];

        // View
        return view('coveragemap/cimeipayload', $data);
    }
}
