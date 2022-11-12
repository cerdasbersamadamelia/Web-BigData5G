<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = 'Login';
        return view('auth/login', $data);
    }

    public function register()
    {
        $data['title'] = 'Register';
        return view('auth/register', $data);
    }

    public function home()
    {
        $usersModel = new UsersModel();
        $data = [
            'title' => 'Home',
            'users' => $usersModel->getGroups()
        ];
        return view('home/index', $data);
    }
}
