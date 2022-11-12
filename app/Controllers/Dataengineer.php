<?php

namespace App\Controllers;

use App\Models\ThresholdModel;
use App\Models\IMEIModel;
use App\Models\PayloadModel;
use App\Models\IMEIPayloadModel;

class Dataengineer extends BaseController
{
    // Users Model
    protected $thresholdModel;
    protected $imeiModel;
    protected $payloadModel;

    public function __construct()
    {
        $this->thresholdModel = new ThresholdModel();
        $this->imeiModel = new IMEIModel();
        $this->payloadModel = new PayloadModel();
    }

    public function index()
    {
        $imei_payload = new IMEIPayloadModel();

        $data = [
            'title' => 'Data List',
            'geojson' => $imei_payload->getgeojson(),
            'summaryimei' => $this->imeiModel->getIMEI(),
            'summarypayload' => $this->payloadModel->getpayload(),
            'threshold' => $this->thresholdModel->findAll(),
        ];

        return view('dataengineer/index', $data);
    }

    public function updateimei()
    {
        $data = [
            'title' => 'Update Data IMEI',
            'validation' => \Config\Services::validation(),
            'threshold' => $this->thresholdModel->findAll(),
        ];
        return view('dataengineer/updateimei', $data);
    }

    public function updatepayload()
    {
        $data = [
            'title' => 'Update Data Payload',
            'validation' => \Config\Services::validation(),
            'threshold' => $this->thresholdModel->findAll(),
        ];
        return view('dataengineer/updatepayload', $data);
    }

    public function analysis_imei()
    {
        // Validation
        $input = $this->validate([
            'file_imei' => [
                // 'rules' => 'uploaded[file_imei]|max_size[file_imei,2]|mime_in[file_imei,text/csv,text/x-csv,text/x-comma-separated-values,text/comma-separated-values,application/octet-stream,application/vnd.ms-excel,application/x-csv,application/csv,application/excel,application/vnd.msexcel]',
                'rules' => 'uploaded[file_imei]|max_size[file_imei,2]|ext_in[file_imei,csv]',
                'errors' => [
                    'uploaded' => 'Choose the file first',
                    'max_size' => 'The max size of the file is 2 KB',
                    // 'mime_in' => 'Please choose CSV file'
                    'ext_in' => 'Please choose CSV file'
                ]
            ],
        ]);
        // Run Validation
        if (!$input) {
            $data['validation'] = $this->validator;
            return redirect()->to('dataengineer/updateimei')->withInput();
        } else {
            // Read CSV file imei
            if ($file_imei = $this->request->getFile('file_imei')) {
                $file_name = $file_imei->getTempName();
                $imei_data = array();
                $csv_data = array_map('str_getcsv', file($file_name));
                if (count($csv_data) > 0) {
                    $index = 0;
                    foreach ($csv_data as $data) {
                        if ($index > 0) {
                            $imei_data[] = array(
                                "no_imei" => $data[0],
                                "time" => $data[1],
                                "kecamatan_imei" => $data[2],
                                "user_support_5G" => $data[3],
                                "percentage_percent" => $data[4],
                                "recommended_imei" => $data[5],
                            );
                        }
                        $index++;
                    }
                    $this->imeiModel->updateBatch($imei_data, 'no_imei');
                    session()->setFlashdata("analysis_imei", "<strong>WELL DONE!</strong> You successfully updated Summary IMEI.");
                    return redirect()->route('dataengineer/updateimei');
                }
            } else {
                session()->setFlashdata('analysis_imei_fail', '<strong>OPPS!</strong> CSV file coud not be imported.');
            }
        }
        return redirect()->route('dataengineer/updateimei');

        // if (!$this->validate([
        //     'file_imei' => [
        //         'rules' => 'uploaded[file_imei]|max_size[file_imei,2]|mime_in[file_imei,text/csv,text/x-csv,text/x-comma-separated-values,text/comma-separated-values,application/octet-stream,application/vnd.ms-excel,application/x-csv,application/csv,application/excel,application/vnd.msexcel]',
        //         'errors' => [
        //             'uploaded' => 'Choose the file first',
        //             'max_size' => 'The max size of the file is 2 KB',
        //             'mime_in' => 'Please choose CSV file'
        //         ]
        //     ],
        // ])) {
        //     return redirect()->to('dataengineer/updateimei')->withInput();
        // }

        // $file_imei = $this->request->getFile('file_imei');
        // $file_imei->move('assets/analysis', 'summary_imei.csv');
        // $python = shell_exec("python assets/analysis/analysis_imei.py 2>&1");
        // unlink('assets/analysis/summary_imei.csv');

        // session()->setFlashdata('analysis_imei', $python);
        // return redirect()->to('dataengineer/updateimei')->withInput();
    }

    public function analysis_payload()
    {
        // Validation
        $input = $this->validate([
            'file_payload' => [
                // 'rules' => 'uploaded[file_payload]|max_size[file_payload,2]|mime_in[file_payload,text/csv,text/x-csv,text/x-comma-separated-values,text/comma-separated-values,application/octet-stream,application/vnd.ms-excel,application/x-csv,application/csv,application/excel,application/vnd.msexcel]',
                'rules' => 'uploaded[file_payload]|max_size[file_payload,2]|ext_in[file_payload,csv]',
                'errors' => [
                    'uploaded' => 'Choose the file first',
                    'max_size' => 'The max size of the file is 2 KB',
                    // 'mime_in' => 'Please choose CSV file'
                    'ext_in' => 'Please choose CSV file'
                ]
            ],
        ]);
        // Run Validation
        if (!$input) {
            $data['validation'] = $this->validator;
            return redirect()->to('dataengineer/updatepayload')->withInput();
        } else {
            // Read CSV file imei
            if ($file_payload = $this->request->getFile('file_payload')) {
                $file_name = $file_payload->getTempName();
                $payload_data = array();
                $csv_data = array_map('str_getcsv', file($file_name));
                if (count($csv_data) > 0) {
                    $index = 0;
                    foreach ($csv_data as $data) {
                        if ($index > 0) {
                            $payload_data[] = array(
                                "no_payload" => $data[0],
                                "time" => $data[1],
                                "kecamatan_payload" => $data[2],
                                "payload_MB" => $data[3],
                                "recommended_payload" => $data[4],
                            );
                        }
                        $index++;
                    }
                    $this->payloadModel->updateBatch($payload_data, 'no_payload');
                    session()->setFlashdata("analysis_payload", "<strong>WELL DONE!</strong> You successfully updated Summary Payload.");
                    return redirect()->route('dataengineer/updatepayload');
                }
            } else {
                session()->setFlashdata('analysis_payload_fail', '<strong>OPPS!</strong> CSV file coud not be imported.');
            }
        }
        return redirect()->route('dataengineer/updatepayload');

        // if (!$this->validate([
        //     'file_payload' => [
        //         'rules' => 'uploaded[file_payload]|max_size[file_payload,15000]|mime_in[file_payload,text/csv,text/x-csv,text/x-comma-separated-values,text/comma-separated-values,application/octet-stream,application/vnd.ms-excel,application/x-csv,application/csv,application/excel,application/vnd.msexcel]',
        //         'errors' => [
        //             'uploaded' => 'Choose the file first',
        //             'max_size' => 'The max size of the file is 15 MB',
        //             'mime_in' => 'Please choose CSV file'
        //         ]
        //     ],
        // ])) {
        //     return redirect()->to('dataengineer/updatepayload')->withInput();
        // }

        // $file_payload = $this->request->getFile('file_payload');
        // $file_payload->move('assets/analysis', 'payload_4g_depok.csv');
        // $python = shell_exec("python assets/analysis/analysis_payload.py 2>&1");
        // unlink('assets/analysis/payload_4g_depok.csv');
        // unlink('assets/analysis/summary_payload.csv');

        // session()->setFlashdata('analysis_payload', $python);
        // return redirect()->to('dataengineer/updatepayload')->withInput();
    }

    public function summaryimei()
    {
        $data = [
            'title' => 'Create Summary IMEI'
        ];
        return view('dataengineer/summaryimei', $data);
    }

    public function imeithreshold($id)
    {
        $data['imei_threshold'] = $this->request->getPost('imeithreshold');

        // Validation
        if (!$this->validate([
            'imeithreshold' => [
                'rules' => 'required',
            ],
        ])) {
            return redirect()->to('dataengineer/updateimei')->withInput();
        }

        $this->thresholdModel->update($id, $data);
        session()->setFlashdata('update_imeithreshold', '<strong>WELL DONE!</strong> You successfully updated IMEI threshold.');
        return redirect()->to('dataengineer/updateimei');
    }

    public function summarypayload()
    {
        $data = [
            'title' => 'Create Summary Payload'
        ];
        return view('dataengineer/summarypayload', $data);
    }

    public function payloadthreshold($id)
    {
        $data['payload_threshold'] = $this->request->getPost('payloadthreshold');

        // Validation
        if (!$this->validate([
            'payloadthreshold' => [
                'rules' => 'required',
            ],
        ])) {
            return redirect()->to('dataengineer/updatepayload')->withInput();
        }

        $this->thresholdModel->update($id, $data);
        session()->setFlashdata('update_payloadthreshold', '<strong>WELL DONE!</strong> You successfully updated payload threshold.');
        return redirect()->to('dataengineer/updatepayload');
    }

    public function download_script_imei()
    {
        return $this->response->download('assets/analysis/Create Summary IMEI.ipynb', null);
    }

    public function download_script_payload()
    {
        return $this->response->download('assets/analysis/Create Summary Payload.ipynb', null);
    }

    public function download_geojson($geojson)
    {
        $geojson = $this->request->getPost('download_geojson');
        return $this->response->download('assets/plugins/leaflet/geojson/' . $geojson, null);
    }
}
