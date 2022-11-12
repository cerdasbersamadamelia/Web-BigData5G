<?php

namespace App\Controllers;

use App\Models\ThresholdModel;
use App\Models\IMEIModel;
use App\Models\PayloadModel;
use App\Models\IMEIPayloadModel;

class Recommendation extends BaseController
{
    // Threshold model and imei_payload model
    protected $thresholdModel;

    public function __construct()
    {
        $this->thresholdModel = new ThresholdModel();
    }

    public function rimei()
    {
        $imeiModel = new IMEIModel();

        // Data
        $data = [
            'title' => 'Recommendation: IMEI',
            'threshold' => $this->thresholdModel->findAll(),
            'rimei' => $imeiModel->findAll()
        ];

        // View
        return view('recommendation/rimei', $data);
    }

    public function rpayload()
    {
        $payloadModel = new PayloadModel();

        // Data
        $data = [
            'title' => 'Recommendation: Payload',
            'threshold' => $this->thresholdModel->findAll(),
            'rpayload' => $payloadModel->findAll()
        ];
        // View
        return view('recommendation/rpayload', $data);
    }

    public function rimeipayload()
    {
        $imei_payload = new IMEIPayloadModel();

        // Data
        $data = [
            'title' => 'Recommendation: IMEI & Payload',
            'threshold' => $this->thresholdModel->findAll(),
            'rimeipayload' => $imei_payload->getSummary()
        ];

        // View
        return view('recommendation/rimeipayload', $data);
    }
}
