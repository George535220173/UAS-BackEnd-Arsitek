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

    public function store_articles(Request $request)
    {
        $request->validate([
            'article_title' => 'required|string|max:255',
            'article_author' => 'required|string|max:255',
            'article_content' => 'required|string',
        ]);

        Article::create([
            'article_title' => $request->article_title,
            'article_author' => $request->article_author,
            'article_content' => $request->article_content,
        ]);

        return redirect()->route('admin.dashboard');
    }

    public function store_projects(Request $request)
    {
        $request->validate([
            'project_name' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'time_taken' => 'required|string',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $dateRange = explode(' - ', $request->time_taken);
    if (!\Carbon\Carbon::createFromFormat('d F Y', $dateRange[0] ?? null) || !\Carbon\Carbon::createFromFormat('d F Y', $dateRange[1] ?? null)) {
        return redirect()->back()->withErrors(['time_taken' => 'Invalid date format. Please use "DD MMMM YYYY - DD MMMM YYYY".']);
    }
        $imagePath = $request->file('image')->store('projects', 'public');
    
        Project::create([
            'project_name' => $request->project_name,
            'client' => $request->client,
            'time_taken' => $request->time_taken,
            'location' => $request->location,
            'description' => $request->description,
            'image' => $imagePath,
        ]);
    
        return redirect()->route('admin.dashboard')->with('success', 'Project added successfully');
    }

    public function showProjects(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'asc');
    
        $projects = Project::when($search, function ($query, $search) {
            return $query->where('project_name', 'LIKE', "%{$search}%")
                         ->orWhere('client', 'LIKE', "%{$search}%")
                         ->orWhere('location', 'LIKE', "%{$search}%")
                         ->orWhere('description', 'LIKE', "%{$search}%");
        })
        ->when($sort, function ($query, $sort) {
            if ($sort === 'asc') {
                return $query->orderBy('project_name', 'asc');
            } elseif ($sort === 'desc') {
                return $query->orderBy('project_name', 'desc');
            } elseif ($sort === 'oldest') {
                return $query->orderBy('created_at', 'asc');
            } elseif ($sort === 'latest') {
                return $query->orderBy('created_at', 'desc');
            }
        })
        ->paginate(8);
    
        return view('projects', compact('projects'));
    }
    
public function favoriteProject(Request $request)
    {
        $projectId = $request->input('project_id');
        $favorites = session('favorites', []);

        if (in_array($projectId, $favorites)) {
            // Remove from favorites
            $favorites = array_diff($favorites, [$projectId]);
            session(['favorites' => $favorites]);
            return response()->json(['status' => 'removed']);
        } else {
            // Add to favorites
            $favorites[] = $projectId;
            session(['favorites' => $favorites]);
            return response()->json(['status' => 'added']);
        }
    }

    public function showFavorites()
    {
        $favoriteIds = session('favorites', []);
        $favorites = Project::whereIn('id', $favoriteIds)->get();
        return view('favorites', compact('favorites'));
    }


    public function showProjectDetails(Project $project)
    {
        return view('project_details', compact('project'));
    }

    public function destroyProject(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Project deleted successfully');
    }

    public function destroyArticle(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Article deleted successfully');
    }

    public function editProject(Project $project)
    {
        return view('admin.edit_project', compact('project'));
    }

    public function updateProject(Request $request, Project $project)
    {
        $request->validate([
            'project_name' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'time_taken' => 'required|string',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'public');
            $project->image = $imagePath;
        }
    
        $project->project_name = $request->project_name;
        $project->client = $request->client;
        $project->time_taken = $request->time_taken;
        $project->location = $request->location;
        $project->description = $request->description;
        $project->save();
    
        return redirect()->route('admin.dashboard')->with('success', 'Project updated successfully');
    }

    public function editArticle(Article $article)
    {
        return view('admin.edit_article', compact('article'));
    }

    public function updateArticle(Request $request, Article $article)
    {
        $request->validate([
            'article_title' => 'required|string|max:255',
            'article_author' => 'required|string|max:255',
            'article_content' => 'required|string',
        ]);

        $article->article_title = $request->article_title;
        $article->article_author = $request->article_author;
        $article->article_content = $request->article_content;
        $article->save();

        return redirect()->route('admin.dashboard')->with('success', 'Article updated successfully');
    }
    
}

