<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Tag;
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
    public function store(Request $request){
        $this->validate($request,[
            'title'=>'required|string|max:191',
            'description'=>'required|string|max:500',
            //'image'=>'required|image|file',
            'app_link'=>'required|string|max:200',
            'github_link'=>'required|string|max:200',
            'tags'=>'required|string',
            'order'=>'required'
        ]);

        $project=Project::create([
            'title' => $request->title,
            'link_app' => $request->app_link,
            'link_github' => $request->github_link,
            'description' => $request->description,
            'order' => $request->order,
        ]);
        $tagsNames=explode(',',$request->tags);
        $tagsIds=$this->updateOrCreateTags($tagsNames);
        $project->tags()->sync($tagsIds);
        $this->addImage($request,$project);
        return redirect()->route('projects.list');
    }
    public function listAll(){
        $projects=$this->getAllProjects();
        return view('projects.index',compact('projects'));
    }
    private function getAllProjects(){
        return Project::all();
    }
    private function addImage(Request $request,Project $project){
        if($request->hasFile('logo') && $request->file('logo')->isValid()){
            $this->validate($request,[
                'logo'=>'required|file|image',
            ]);
            $project->clearMediaCollection('logo');
            $project->addMediaFromRequest('logo')->toMediaCollection('logo');
        }
    }
    private function updateOrCreateTags(array $tagsNames):array{
        $TagsIds=[];
        foreach ($tagsNames as $tagName){
            $tag=Tag::updateOrCreate(['title'=>$tagName],['title'=>$tagName,'bg_color'=>'#ff8000']);
            $TagsIds[]=$tag->id;
        }
        return $TagsIds;

    }
}
