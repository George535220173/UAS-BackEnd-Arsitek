<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

    public function store_article(Request $request)
    {
        $request->validate([
            'article_title' => 'required|string|max:255',
            'article_author' => 'required|string|max:255',
            'article_content' => 'required|string',
        ]);

        Article::create([
            'title' => $request->article_title,
            'author' => $request->article_author,
            'content' => $request->article_content,
        ]);

        return redirect()->route('admin.all');
    }

    public function store_projects(Request $request)
    {
        $request->validate([
            'project_name' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'time_taken' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('projects', 'public');

        Project::create([
            'project_name' => $request->project_name,
            'client' => $request->client,
            'time_taken' => $request->time_taken,
            'location' => $request->location,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.all');
    }
}

