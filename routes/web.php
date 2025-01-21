<?php

use Illuminate\Support\Facades\Route;
use App\Models\Project;
use App\Models\Tag;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $projects = Project::all();
    $tags = Tag::all();

    return view('home', ['projects' => $projects, 'tags' => $tags]);
});

Route::get("/blog", function() {
    return view('blog');
});

Route::get('/projeto/{project}', function(string $projectName) {
    $project = Project::where('slug', $projectName)->firstOrFail();
    $parser = new \cebe\markdown\GithubMarkdown();

    $markdownPath = __DIR__ . '/../resources/posts/' . $project->slug . '.md';

    if (file_exists($markdownPath)) {
        $markdownContent = file_get_contents($markdownPath);
    } else {
        $markdownContent = "";
    }

    return view('project', ['projectName' => $projectName, 'project' => $project, 'markdown' => $parser->parse($markdownContent)]);
});

Route::get('/tag/{tag}', function(string $tagName) {
    $tag = Tag::where('slug', $tagName)->firstOrFail();

    return view('tag', ['tag' => $tag]);
});

Route::get("/404", function() {
    return view("404");
});
