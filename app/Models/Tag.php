<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Tag extends Model
{
    use HasFactory;

    protected $table = "tag";

    protected $fillable = ['id', 'name', 'backgroundColor', 'borderColor', 'color', 'slug'];

    public function projects() {
        return $this->belongsToMany(Project::class, 'relation_tag_project', 'tag_id', 'project_id');
    }
}
