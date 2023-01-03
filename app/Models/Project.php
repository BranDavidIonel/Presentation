<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Project extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;

    protected $guarded = [];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'projects_tags', 'project_id', 'tag_id')
            ->withPivot(['project_id', 'tag_id', 'created_at']);
    }

    public function imagePath()
    {
        $mediaItems = $this->getMedia('logo');
        if (!isset($mediaItems[0])) {
            return asset('images/default-project.svg');
        }
        return $mediaItems[0]->getUrl();
    }
}
