<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\SkillsModel;
use App\Models\TeamModel;

class SkillsController extends BaseController
{
    public function index()
    {
        $skillsModel = new SkillsModel();
        $teamModel = new TeamModel();

        $data = [
            'title' => 'Skill List',
            'skills' => $skillsModel->select('skills.*, team.nama AS team_name')
                                    ->join('team', 'team.id = skills.team_id')
                                    ->orderBy('id', 'DESC')
                                    ->findAll()
        ];

        return view('dashboard/skills/index', $data);
    }

    public function create()
    {
        $teamModel = new TeamModel();

        $data = [
            'title' => 'Add Skill',
            'teams' => $teamModel->findAll()
        ];

        return view('dashboard/skills/create', $data);
    }

    public function store()
    {
        $skillsModel = new SkillsModel();

        $skillsModel->save([
            'team_id' => $this->request->getPost('team_id'),
            'skill_name' => $this->request->getPost('skill_name'),
            'skill_level' => $this->request->getPost('skill_level')
        ]);

        return redirect()->to('/dashboard/skills')->with('success', 'Skill berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $skillsModel = new SkillsModel();
        $teamModel = new TeamModel();

        $data = [
            'title' => 'Edit Skill',
            'skill' => $skillsModel->find($id),
            'teams' => $teamModel->findAll()
        ];

        return view('dashboard/skills/edit', $data);
    }

    public function update($id)
    {
        $skillsModel = new SkillsModel();

        $skillsModel->update($id, [
            'team_id' => $this->request->getPost('team_id'),
            'skill_name' => $this->request->getPost('skill_name'),
            'skill_level' => $this->request->getPost('skill_level')
        ]);

        return redirect()->to('/dashboard/skills')->with('success', 'Skill berhasil diperbarui!');
    }

    public function delete($id)
    {
        $skillsModel = new SkillsModel();
        $skillsModel->delete($id);

        return redirect()->to('/dashboard/skills')->with('success', 'Skill berhasil dihapus!');
    }
}
