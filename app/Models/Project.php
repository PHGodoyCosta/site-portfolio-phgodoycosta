<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use App\Models\Tag;

class Project extends Model
{
    use HasFactory;

    protected $table = "project";

    protected $fillable = ['id', 'name', 'description', 'repository', 'isPosted'];

    public function tags(): MorphToMany {
        return $this->morphToMany(Tag::class, 'relation_tag_project');
    }
}
