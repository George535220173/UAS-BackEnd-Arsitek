<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Article;

class AdminController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $articles = Article::all();
        return view('admin', compact('projects', 'articles'));
    }
}
