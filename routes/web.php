<?php

use Illuminate\Support\Facades\Route;
use App\Models\Project;

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
    return view('home');
});

Route::get("/blog", function() {
    return view('blog');
});

Route::get("/temdebom", function() {
    return view('projects/temdebom');
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

Route::get("/code-company", function() {
    return view('projects/code-company');
});

Route::get("/site-portfolio", function() {
    return view('projects/site-portfolio');
});

