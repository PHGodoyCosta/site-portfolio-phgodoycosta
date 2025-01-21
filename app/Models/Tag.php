<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Tag extends Model
{
    use HasFactory;

    protected $table = "tag";

    protected $fillable = ['id', 'name', 'backgroundColor', 'borderColor', 'color', 'slug'];

    public function projects(): MorphToMany {
        return $this->morphToMany(Project::class, 'relation_tag_project');
    }
}
