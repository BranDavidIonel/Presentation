<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    private array $tagsData = [
        [
            'title' => 'JS',
            'color' => '#ffcc00'
        ],
        [
            'title' => 'HTML',
            'color' => '#e6e600'
        ],
        [
            'title' => 'CSS',
            'color' => '#00ffff'
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //check exist data in tags
        $checkTags = Tag::where('id', '>', 0)->exists();
        if (!$checkTags) {
            foreach ($this->tagsData as $tagData) {
                Tag::create(['title' => $tagData['title'], 'bg_color' => $tagData['color']]);
            }
        }
    }
}
