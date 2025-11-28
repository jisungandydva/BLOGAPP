<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class UserController extends Controller
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        helper(['url', 'form']);
    }

    // -------------------------------
    // 📋 1. Tampilkan semua user
    // -------------------------------
    public function index()
    {
        $data['users'] = $this->userModel->findAll();
        return view('users/user_view', $data);
    }

    // -------------------------------
    // ➕ 2. Form tambah user
    // -------------------------------
    public function create()
    {
        return view('users/user_form');
    }

    // -------------------------------
    // 💾 3. Simpan user baru
    // -------------------------------
   public function store()
{
    $validation = \Config\Services::validation();

    $validation->setRules([
        'username' => 'required|min_length[3]|max_length[50]',
        'email'    => 'required|valid_email|is_unique[users.email]',
        'password' => 'required|min_length[6]',
        'role'     => 'required',
        'status'   => 'required'
    ]);

    if (!$validation->withRequest($this->request)->run()) {
        return redirect()->back()
                         ->withInput()
                         ->with('error', $validation->getErrors());
    }

    $data = [
        'username' => $this->request->getPost('username'),
        'email'    => $this->request->getPost('email'),
        'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        'role'     => $this->request->getPost('role'),
        'status'   => $this->request->getPost('status'),
        'photo'    => null
    ];

    // Upload foto jika ada
    $file = $this->request->getFile('photo');
    if ($file && $file->isValid() && !$file->hasMoved()) {
        $newName = $file->getRandomName();
        $file->move('uploads/users', $newName);
        $data['photo'] = $newName;
    }

    $this->userModel->insert($data);

    return redirect()->to(site_url('users'))
                     ->with('success', 'User berhasil ditambahkan!');
}


    // -------------------------------
    // ✏️ 4. Form edit user
    // -------------------------------
    public function edit($id)
    {
        $data['user'] = $this->userModel->find($id);

        if (!$data['user']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("User dengan ID $id tidak ditemukan");
        }

        return view('users/user_edit', $data);
    }

    // -------------------------------
    // 🔁 5. Update data user
    // -------------------------------
    public function update($id)
{
    $model = new UserModel();
    $user  = $model->find($id);

    $username = $this->request->getPost('username');
    $email    = $this->request->getPost('email');
    $role     = $this->request->getPost('role');
    $status   = $this->request->getPost('status');

    // Password (opsional)
    $password = $this->request->getPost('password');
    if (!empty($password)) {
        $password = password_hash($password, PASSWORD_DEFAULT);
    } else {
        $password = $user['password']; // pakai password lama
    }

    // Upload Foto
    $fileFoto = $this->request->getFile('foto');
    $namaFoto = $user['photo']; // default pakai foto lama

    if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
        $namaFoto = $fileFoto->getRandomName();
        $fileFoto->move('uploads/users', $namaFoto);

        // Hapus foto lama (jika ada)
        if (!empty($user['photo']) && file_exists('uploads/users/' . $user['photo'])) {
            unlink('uploads/users/' . $user['photo']);
        }
    }

    // Update data
    $model->update($id, [
        'username' => $username,
        'email'    => $email,
        'password' => $password,
        'photo'    => $namaFoto,
        'role'     => $role,
        'status'   => $status,
    ]);

    return redirect()->to('/users')->with('success', 'User berhasil diupdate!');
}


    // -------------------------------
    // 🗑️ 6. Hapus user
    // -------------------------------
    public function delete($id)
    {
        $user = $this->userModel->find($id);
        if (!$user) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("User tidak ditemukan");
        }

        $this->userModel->delete($id);

        return redirect()->to(site_url('users'))
                         ->with('success', 'User berhasil dihapus!');
    }
}
