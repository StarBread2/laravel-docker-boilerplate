<?php

use Illuminate\Support\Facades\Route;
use App\Models\Project;

Route::get('/', function () {
    return redirect('/projects');
});

Route::get('/projects', function () {
    $projects = Project::all();

    return view('projects.index', compact('projects'));
});

Route::get('/projects/create', function () {
    $projects = Project::all();

    return view('projects.create', compact('projects'));
});


Route::get('/projects/edit', function () {
    $projects = Project::all();
    
    return view('projects.edit', compact('projects'));
});