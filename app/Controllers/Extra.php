<?php

namespace App\Controllers;

class Extra extends BaseController
{
    public function aboutus()
    {
        $data['title'] = 'About Us';
        return view('extra/aboutus', $data);
    }

    public function help()
    {
        $data['title'] = 'Help';
        return view('extra/help', $data);
    }
}
