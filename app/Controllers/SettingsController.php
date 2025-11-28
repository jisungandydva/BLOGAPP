<?php

namespace App\Controllers;

use App\Models\SettingModel;

class SettingsController extends BaseController
{
    public function index()
    {
        $model = new SettingModel();

        $data = [
            'title'    => 'Settings',
            'settings' => $model->find(1) // ambil row pertama
        ];

        return view('dashboard/settings/index', $data);
    }

    public function update()
    {
        $model = new SettingModel();

        $model->update(1, [
            'site_name'        => $this->request->getPost('site_name'),
            'site_description' => $this->request->getPost('site_description'),
            'admin_email'      => $this->request->getPost('admin_email'),
        ]);

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }
}
