<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'projects_tags', 'project_id', 'tag_id')
            ->withPivot(['project_id', 'tag_id', 'created_at']);
    }
    public function imagePath(){
        return asset('images/default-project.svg');
    }
}
