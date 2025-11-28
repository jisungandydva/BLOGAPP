<?php

namespace App\Controllers;

use App\Models\PostModel;

class PostController extends BaseController
{
    protected $postModel;

    public function __construct()
    {
        $this->postModel = new PostModel();
        helper(['form', 'url']);
    }

    // 📋 Tampilkan semua post
    public function index()
    {
        $data['posts'] = $this->postModel->findAll();
        return view('dashboard/posts/index', $data);
    }

    // ➕ Form tambah post
    public function create()
    {
        return view('dashboard/posts/create');
    }

    // 💾 Simpan post baru
    public function store()
    {
        $this->postModel->save([
            'title'   => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
        ]);

        return redirect()->to('/posts')->with('success', 'Post berhasil ditambahkan!');
    }

    // ✏️ Form edit post
    public function edit($id)
    {
        $data['post'] = $this->postModel->find($id);

        if (!$data['post']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Post dengan ID $id tidak ditemukan");
        }

        return view('dashboard/posts/edit', $data);
    }

    // 🔁 Update post
    public function update($id)
    {
        $this->postModel->update($id, [
            'title'   => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
        ]);

        return redirect()->to('/posts')->with('success', 'Post berhasil diperbarui!');
    }

    // 🗑️ Hapus post
    public function delete($id)
    {
        $this->postModel->delete($id);
        return redirect()->to('/posts')->with('success', 'Post berhasil dihapus!');
    }
}
