<?php

namespace App\Controllers;

use App\Models\UserModel;

class TestModel extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $users = $userModel->findAll(); // ambil semua data dari tabel users

        echo '<pre>';
        print_r($users);
        echo '</pre>';
    }
}
