<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;

class Project extends Model
{
    use HasFactory;

    protected $table = "project";

    protected $fillable = ['id', 'name', 'description', 'slug', 'repository', 'isPosted'];

    public function tags() {
        return $this->belongsToMany(Tag::class, 'relation_tag_project', 'project_id', 'tag_id');
    }
}
