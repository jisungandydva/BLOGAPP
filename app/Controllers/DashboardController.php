<?php

namespace App\Controllers;

use App\Models\BlogModel;
use App\Models\UserModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $blogModel = new BlogModel();
        $userModel = new UserModel();

        $data = [
            'title'        => 'Dashboard',
            'total_blog'   => $blogModel->countAll(),
            'total_users'  => $userModel->countAll(),
            'recent_blog'  => $blogModel->orderBy('created_at', 'DESC')->limit(5)->find(),
        ];

        return view('dashboard/index', $data);
    }
}
