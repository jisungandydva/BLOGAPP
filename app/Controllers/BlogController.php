<?php

namespace App\Controllers;

use App\Models\BlogModel;

class BlogController extends BaseController
{
    protected $blogModel;

    public function __construct()
    {
        helper('text'); // untuk url_title()
        $this->blogModel = new BlogModel();
    }

    // =========================
    // LIST BLOG + PAGINATION
    // =========================
    public function index()
    {
        $data = [
            'title' => 'Blog List',
            'blogs' => $this->blogModel
                            ->orderBy('upload_at', 'DESC')
                            ->paginate(9, 'blogs'),
            'pager' => $this->blogModel->pager
        ];

        return view('dashboard/blog/index', $data);
    }

    // =========================
    // CREATE BLOG FORM
    // =========================
    public function create()
    {
        $data = ['title' => 'Create Blog'];
        return view('dashboard/blog/create', $data);
    }

    // =========================
    // FUNGSI COMPRESS IMAGE
    // =========================
    private function compressImage($source, $destination, $quality = 70)
    {
        $info = getimagesize($source);
        if (!$info) return false;

        switch ($info['mime']) {
            case 'image/jpeg':
            case 'image/jpg':
                $image = imagecreatefromjpeg($source);
                imagejpeg($image, $destination, $quality);
                break;

            case 'image/png':
                $image = imagecreatefrompng($source);
                // Convert PNG ke JPEG supaya lebih kecil
                imagejpeg($image, $destination, $quality);
                break;

            case 'image/gif':
                $image = imagecreatefromgif($source);
                imagejpeg($image, $destination, $quality);
                break;
        }

        if (isset($image)) imagedestroy($image);
        return true;
    }

    // =========================
    // STORE BLOG
    // =========================
    public function store()
    {
        $image = $this->request->getFile('image');
        $fileName = '';

        if ($image && $image->isValid()) {
            $fileName = $image->getRandomName();
            $image->move('uploads/blog', $fileName);

            // Compress setelah upload
            $source = FCPATH . 'uploads/blog/' . $fileName;
            $this->compressImage($source, $source, 70);
        }

        $title     = $this->request->getPost('title');
        $content   = $this->request->getPost('content');
        $slugInput = $this->request->getPost('slug');
        $slug      = $slugInput ?: url_title($title, '-', true);
        $upload_at = $this->request->getPost('upload_at') ?: date('Y-m-d H:i:s');

        if (!$content) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Content tidak boleh kosong.');
        }

        $this->blogModel->save([
            'title'     => $title,
            'slug'      => $slug,
            'excerpt'   => substr(strip_tags($content), 0, 150),
            'content'   => $content,
            'image'     => $fileName,
            'author'    => session()->get('username') ?? 'Admin',
            'upload_at' => $upload_at
        ]);

        return redirect()->to('/dashboard/blog')->with('success', 'Blog berhasil ditambahkan');
    }

    // =========================
    // EDIT BLOG FORM
    // =========================
    public function edit($id)
    {
        $blog = $this->blogModel->find($id);

        if (!$blog) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Blog dengan ID $id tidak ditemukan.");
        }

        $data = [
            'title' => 'Edit Blog',
            'blog'  => $blog
        ];

        return view('dashboard/blog/edit', $data);
    }

    // =========================
    // UPDATE BLOG
    // =========================
    public function update($id)
    {
        $blog = $this->blogModel->find($id);
        if (!$blog) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Blog dengan ID $id tidak ditemukan.");
        }

        $title     = $this->request->getPost('title');
        $content   = $this->request->getPost('content');
        $slugInput = $this->request->getPost('slug');
        $slug      = $slugInput ? url_title($slugInput, '-', true) : $blog['slug'];
        $upload_at = $this->request->getPost('upload_at') ?: $blog['upload_at'];

        $excerpt = substr(strip_tags($content), 0, 150);

        $data = [
            'title'     => $title,
            'slug'      => $slug,
            'excerpt'   => $excerpt,
            'content'   => $content,
            'author'    => $blog['author'],
            'upload_at' => $upload_at
        ];

        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move('uploads/blog', $newName);

            // Compress image baru
            $source = FCPATH . 'uploads/blog/' . $newName;
            $this->compressImage($source, $source, 70);

            $data['image'] = $newName;

            // Hapus gambar lama
            if (!empty($blog['image']) && file_exists('uploads/blog/' . $blog['image'])) {
                unlink('uploads/blog/' . $blog['image']);
            }
        }

        $this->blogModel->update($id, $data);

        return redirect()->to('/dashboard/blog')->with('success', 'Blog berhasil diperbarui');
    }

    // =========================
    // DELETE BLOG
    // =========================
    public function delete($id)
    {
        $blog = $this->blogModel->find($id);

        if (!$blog) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Blog dengan ID $id tidak ditemukan.");
        }

        if (!empty($blog['image']) && file_exists('uploads/blog/' . $blog['image'])) {
            unlink('uploads/blog/' . $blog['image']);
        }

        $this->blogModel->delete($id);

        return redirect()->to('/dashboard/blog')->with('success', 'Blog berhasil dihapus');
    }
}
