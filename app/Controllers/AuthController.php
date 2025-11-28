<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        helper(['url', 'form']);
    }

    // 🔑 Form login
    public function login()
    {
        return view('users/login');
    }

    // 🔐 Proses login
public function processLogin()
{
    $session = session();

    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    // Cari user berdasarkan email
    $user = $this->userModel->where('email', $email)->first();

    // Email tidak ditemukan
    if (!$user) {
        $session->setFlashdata('error', 'Email tidak ditemukan!');
        return redirect()->to('/login')->withInput();
    }

    // Jika akun tidak aktif
    if ($user['status'] != 'active') {
        $session->setFlashdata('error', 'Akun Anda tidak aktif!');
        return redirect()->to('/login')->withInput();
    }

    // Password salah
    if (!password_verify($password, $user['password'])) {
        $session->setFlashdata('error', 'Password salah!');
        return redirect()->to('/login')->withInput();
    }

    // Jika berhasil login
    $session->set([
    'logged_in' => true,
    'user_id'   => $user['id'],
    'user_email'=> $user['email'],
    'username'  => $user['username'],
    'role'      => $user['role'],
    'photo'     => $user['photo']   // tambahkan ini
]);


    return redirect()->to('/dashboard');
}


    // 🚪 Logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    // 📝 Form register
    public function register()
    {
        return view('users/register');
    }

    // 💾 Proses register
    public function processRegister()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'username' => 'required|min_length[3]|max_length[50]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return view('users/register', ['validation' => $validation]);
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => 'user',      // default role
            'status'   => 'active'     // default status
        ];

        $this->userModel->insert($data);
        session()->setFlashdata('success', 'Registrasi berhasil! Silakan login.');
        return redirect()->to('/login');
    }

    // 🔒 Helper untuk proteksi halaman
    public static function protect()
    {
        $session = session();
        if (!$session->get('logged_in')) {
            return redirect()->to('/login')->send();
        }
    }
}
