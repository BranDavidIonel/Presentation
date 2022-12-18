<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
    private array $projectsData = [
        [
            'title' => 'The biggest fish',
            'link_app' => "https://brandavidionel.github.io/big-fish",
            'link_github' => "https://github.com/BranDavidIonel/big-fish",
            'description' => 'In this game, you have to eat other small fish or eat bubbles to grow up.',
            'order' => 1
        ],
        [
            'title' => 'The evasive frog',
            'link_app' => "https://brandavidionel.github.io/frogger-game-js",
            'link_github' => "https://github.com/BranDavidIonel/frogger-game-js",
            'description' => 'You are a frog and you have to cross the street and the river to get safely to the forest',
            'order' => 2
        ]

    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //check exist eny project
        $checkTags = Project::where('id', '>', 0)->exists();
        if (!$checkTags) {
            //get all ids tags in array
            $tagIDs = Tag::all()->pluck('id')->toArray();
            //saved project & attached tags
            foreach ($this->projectsData as $projectData) {
                $project = $this->saveProject($projectData);
                $this->saveAllTags($project, $tagIDs);
            }
        }
    }

    private function saveProject($projectData): Project
    {
        return Project::create([
            'title' => $projectData['title'],
            'link_app' => $projectData['link_app'],
            'link_github' => $projectData['link_github'],
            'description' => $projectData['description'],
            'order' => $projectData['order'],
        ]);
    }

    private function saveAllTags(Project $project, array $tagIDs): void
    {
        $project->tags()->sync($tagIDs);
    }
}
