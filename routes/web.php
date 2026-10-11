<?php

use Illuminate\Support\Facades\Route;
use App\Models\Project;
use App\Models\Tag;
use App\Models\Formation;
use App\Support\Markdown\ArticleMarkdown;

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
    $projects = Project::where("isDestaque", true)->get();
    $tags = Tag::all();
    $formations = Formation::all();

    return view('features.home.home', ['projects' => $projects, 'tags' => $tags, 'formations' => $formations]);
});

Route::get("/blog", function() {
    return view('blog');
});

Route::get('/projeto/{project}', function(string $projectName) {
    $project = Project::where('slug', $projectName)->firstOrFail();

    $markdownPath = resource_path('posts/' . $project->slug . '.md');
    $article = ArticleMarkdown::parse(file_exists($markdownPath) ? file_get_contents($markdownPath) : '');

    return view('features.projects.project', [
        'projectName' => $projectName,
        'project' => $project,
        'body' => $article['html'],
        'headings' => $article['headings'],
    ]);
});

Route::get('/tag/{tag}', function(string $tagName) {
    $tag = Tag::where('slug', $tagName)->firstOrFail();

    if (count($tag->projects) > 0) {
        return view('features.tag.tag', ['tag' => $tag]);
    } else {
        return abort('404');
    }

});

Route::get("/projects", function() {
    $projects = Project::all();

    return view("features.projects.projects", ["projects" => $projects]);
});

Route::get("/404", function() {
    return view("features.errors.404");
});

Route::get("/design-system", function() {
    return view("features.design-system.design-system");
});

Route::get("/tree", function() {
    return view("features.tree.tree");
});
