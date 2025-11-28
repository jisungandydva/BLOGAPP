<?php

namespace App\Controllers;

use App\Models\BlogModel;
use App\Models\TeamModel;
use App\Models\SkillsModel; // ⬅️ Tambahkan SkillsModel

class Frontend extends BaseController
{
    public function home()
    {
        $blogModel = new BlogModel();

        $latestPosts = $blogModel
            ->orderBy('created_at', 'DESC')
            ->limit(3)
            ->find();

        $data = [
            'title' => 'Home',
            'latestPosts' => $latestPosts
        ];

        return view('frontend/home', $data);
    }

    public function about()
    {
        return view('frontend/about', ['title' => 'About Us']);
    }

    public function services()
    {
        return view('frontend/services', ['title' => 'Our Services']);
    }

    public function gallery()
    {
        return view('frontend/gallery', ['title' => 'Gallery']);
    }

    /* =====================================
       ⭐ HALAMAN BLOG
    ====================================== */
    public function blog()
    {
        $blogModel = new BlogModel();

        $data = [
            'title' => 'Blog',
            'posts' => $blogModel->orderBy('created_at', 'DESC')->findAll()
        ];

        return view('frontend/blog', $data);
    }

    public function detail($slug)
    {
        $blogModel = new BlogModel();

        $data['blog'] = $blogModel->where('slug', $slug)->first();

        if (!$data['blog']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Artikel tidak ditemukan");
        }

        $data['title'] = $data['blog']['title'];

        return view('frontend/blog_detail', $data);
    }

    public function contact()
    {
        return view('frontend/contact', ['title' => 'Contact Us']);
    }

    /* =====================================
       ⭐ HALAMAN TEAM
    ====================================== */
    public function team()
    {
        $teamModel = new TeamModel();

        $data = [
            'title' => 'Team',
            'teams' => $teamModel->findAll()
        ];

        return view('frontend/team', $data);
    }

    public function teamDetail($id)
    {
        $teamModel = new TeamModel();
        $team = $teamModel->find($id);

        if (!$team) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Team member not found");
        }

        // Mapping untuk halaman khusus
        switch ($id) {
            case 1: $profileLink = base_url('team/adinda'); break;
            case 2: $profileLink = base_url('team/merri'); break;
            case 3: $profileLink = base_url('team/galang'); break;
            case 4: $profileLink = base_url('team/budi'); break;
            default: $profileLink = base_url('/team');
        }

        $data = [
            'title' => 'Detail Team',
            'team'  => $team,
            'profileLink' => $profileLink
        ];

        return view('frontend/team_detail', $data);
    }

    /* =====================================
       ⭐ HALAMAN PROFIL ADINDA (dengan Skills)
    ====================================== */
    public function adinda()
    {
        $teamModel   = new TeamModel();
        $skillsModel = new SkillsModel(); // ⬅️ load skills dari DB

        $team = $teamModel->find(1); // ID = 1 untuk Adinda

        if (!$team) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Data Adinda tidak ditemukan.");
        }

        // Ambil skills untuk user ID = 1
        $skills = $skillsModel->where('team_id', 1)->findAll();

        $data = [
            'title' => 'Profil Adinda',
            'team'  => $team,
            'skills' => $skills   // ⬅️ kirim ke view
        ];

        return view('frontend/adinda', $data);
    }
}
