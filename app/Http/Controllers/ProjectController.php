<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects=$this->getAllProjects();
        return view('welcome',compact('projects'));
    }
    public function showCreate(){
        return view('projects.show-create');
    }
    public function listAll(){
        $projects=$this->getAllProjects();
        return view('projects.index',compact('projects'));
    }
    private function getAllProjects(){
        return Project::all();
    }
}
