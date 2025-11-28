<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\TeamModel;

class SosmedController extends BaseController
{
    public function index()
    {
        $teamModel = new TeamModel();
        $data['team'] = $teamModel->findAll();

        return view('dashboard/sosmed/index', $data);
    }

    public function edit($id)
    {
        $teamModel = new TeamModel();
        $team = $teamModel->find($id);

        if (!$team) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Data tidak ditemukan.");
        }

        return view('dashboard/sosmed/edit', ['team' => $team]);
    }

    public function update($id)
    {
        $teamModel = new TeamModel();

        $teamModel->update($id, [
            'email'              => $this->request->getPost('email'),
            'instagram_username' => $this->request->getPost('instagram'),
            'tiktok_username'    => $this->request->getPost('tiktok'),
        ]);

        return redirect()->to('/dashboard/sosmed')->with('success', 'Sosmed berhasil diperbarui!');
    }
}
