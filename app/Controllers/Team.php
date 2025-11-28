<?php

namespace App\Controllers;

use App\Models\TeamModel;

class Team extends BaseController
{
    protected $teamModel;

    public function __construct()
    {
        $this->teamModel = new TeamModel();
        helper(['form', 'url']);
    }

    // ========================================
    // DASHBOARD TEAM LIST
    // ========================================
    public function index()
    {
        $data['team'] = $this->teamModel->findAll();
        return view('dashboard/team/index', $data);
    }

    // ========================================
    // CREATE FORM
    // ========================================
    public function create()
    {
        return view('dashboard/team/create');
    }

    // ========================================
    // STORE NEW TEAM
    // ========================================
    public function store()
    {
        $validation = $this->validate([
            'nama' => 'required|max_length[100]',
            'posisi' => 'required|max_length[100]',
            'foto' => 'uploaded[foto]|is_image[foto]|max_size[foto,4096]'
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Upload Foto
        $file = $this->request->getFile('foto');
        $fileName = $file->getRandomName();
        $file->move(FCPATH . 'uploads/team/', $fileName);

        // Save Data ke Database
        $this->teamModel->save([
            'nama'                => $this->request->getPost('nama'),
            'posisi'              => $this->request->getPost('posisi'),
            'deskripsi'           => $this->request->getPost('deskripsi'),
            'instagram_username'  => $this->request->getPost('instagram_username'),
            'tiktok_username'     => $this->request->getPost('tiktok_username'),
            'email'               => $this->request->getPost('email'),
            'foto'                => $fileName
        ]);

        return redirect()->to('/dashboard/team')->with('success', 'Anggota berhasil ditambahkan.');
    }

    // ========================================
    // EDIT FORM
    // ========================================
    public function edit($id)
    {
        $data['team'] = $this->teamModel->find($id);
        return view('dashboard/team/edit', $data);
    }

    // ========================================
    // UPDATE TEAM MEMBER
    // ========================================
    public function update($id)
    {
        $team = $this->teamModel->find($id);

        $validation = $this->validate([
            'nama' => 'required|max_length[100]',
            'posisi' => 'required|max_length[100]',
            'foto' => 'permit_empty|is_image[foto]|max_size[foto,4096]'
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Upload foto baru jika ada
        $file = $this->request->getFile('foto');
        $fileName = $team['foto'];

        if ($file && $file->isValid() && !$file->hasMoved()) {

            // Hapus foto lama
            if (file_exists(FCPATH . 'uploads/team/' . $team['foto'])) {
                @unlink(FCPATH . 'uploads/team/' . $team['foto']);
            }

            // Upload foto baru
            $fileName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/team/', $fileName);
        }

        // Update database
        $this->teamModel->update($id, [
            'nama'                => $this->request->getPost('nama'),
            'posisi'              => $this->request->getPost('posisi'),
            'deskripsi'           => $this->request->getPost('deskripsi'),
            'instagram_username'  => $this->request->getPost('instagram_username'),
            'tiktok_username'     => $this->request->getPost('tiktok_username'),
            'email'               => $this->request->getPost('email'),
            'foto'                => $fileName
        ]);

        return redirect()->to('/dashboard/team')->with('success', 'Data berhasil diperbarui.');
    }

    // ========================================
    // DELETE TEAM
    // ========================================
    public function delete($id)
    {
        $team = $this->teamModel->find($id);

        if ($team && !empty($team['foto']) && file_exists(FCPATH . 'uploads/team/' . $team['foto'])) {
            @unlink(FCPATH . 'uploads/team/' . $team['foto']);
        }

        $this->teamModel->delete($id);
        return redirect()->to('/dashboard/team')->with('success', 'Anggota berhasil dihapus.');
    }

    // ========================================
    // FRONTEND DETAIL PAGE REDIRECT
    // ========================================
    public function teamDetail($id)
    {
        $team = $this->teamModel->find($id);

        if (!$team) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Team ID $id tidak ditemukan");
        }

        switch ($id) {
            case 1: return redirect()->to('/team/adinda');
            case 2: return redirect()->to('/team/merri');
            case 3: return redirect()->to('/team/fierdhiva');
            default: return redirect()->to('/team');
        }
    }

    // ========================================
    // CUSTOM PAGES
    // ========================================
    public function adinda()
    {
        return view('partials/adinda');
    }

    public function merri()
    {
        return view('partials/merri');
    }

    public function fierdhiva()
    {
        return view('partials/fierdhiva');
    }
}
