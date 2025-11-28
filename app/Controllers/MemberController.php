<?php

namespace App\Controllers;

use App\Models\MemberModel;

class MemberController extends BaseController
{
    public function index()
    {
        $memberModel = new MemberModel();
        $data['members'] = $memberModel->findAll();
        return view('dashboard/members/index', $data);
    }

    public function create()
    {
        return view('dashboard/members/create');
    }

    public function store()
    {
        $memberModel = new MemberModel();
        $file = $this->request->getFile('foto');
        $fotoName = '';

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fotoName = $file->getRandomName();
            $file->move('uploads/members', $fotoName);
        }

        $memberModel->insert([
            'nama' => $this->request->getPost('nama'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'foto' => $fotoName
        ]);

        return redirect()->to('/dashboard/members')->with('success', '...');
    }

    public function edit(int $id)
    {
        $memberModel = new MemberModel();
        $data['member'] = $memberModel->find($id);

        return view('dashboard/members/edit', $data);
    }

    public function update(int $id)
    {
        $memberModel = new MemberModel();
        $file = $this->request->getFile('foto');
        $member = $memberModel->find($id);

        $fotoName = $member['foto'];

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fotoName = $file->getRandomName();
            $file->move('uploads/members', $fotoName);
        }

        $memberModel->update($id, [
            'nama' => $this->request->getPost('nama'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'foto' => $fotoName
        ]);

        return redirect()->to('/dashboard/members')->with('success', '...');
    }

    public function delete(int $id)
    {
        $memberModel = new MemberModel();
        $member = $memberModel->find($id);

        if ($member && !empty($member['foto']) && file_exists('uploads/members/' . $member['foto'])) {
            unlink('uploads/members/' . $member['foto']);
        }

        $memberModel->delete($id);
        return redirect()->to('/dashboard/members')->with('success', '...');
    }
}
