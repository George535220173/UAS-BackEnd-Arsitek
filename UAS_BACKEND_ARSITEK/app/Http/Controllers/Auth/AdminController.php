<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\Article;
use App\Models\ProjectCategory;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check() && Auth::user()->email == 'mrsadminteam@gmail.com') {
                return $next($request);
            }
            return redirect('/login')->with('error', 'Unauthorized access');
        });
    }

    public function index()
    {
        $projects = Project::with('images', 'category')->get();
        $articles = Article::all();
        $categories = ProjectCategory::all();
        return view('admin', compact('projects', 'articles', 'categories'));
    }

    public function store_articles(Request $request)
    {
        $request->validate([
            'article_title' => 'required|string|max:255',
            'article_author' => 'required|string|max:255',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'article_link' => 'required|string|max:255',
        ]);

        $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');

        Article::create([
            'article_title' => $request->article_title,
            'article_author' => $request->article_author,
            'thumbnail' => $thumbnailPath,
            'article_link' => $request->article_link,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Article added successfully');
    }

    public function store_projects(Request $request)
    {
        $request->validate([
            'project_name' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'time_taken' => 'required|string',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:project_categories,id',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $project = Project::create($request->only('project_name', 'client', 'time_taken', 'location', 'description', 'category_id'));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('projects', 'public');
                ProjectImage::create([
                    'project_id' => $project->id,
                    'path' => $path,
                ]);
            }
        }

        return redirect()->route('admin.dashboard')->with('success', 'Project added successfully');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:project_categories'
        ]);

        ProjectCategory::create($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Category added successfully');
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
        $categories = ProjectCategory::all();
        return view('admin.edit_project', compact('project', 'categories'));
    }

    public function updateProject(Request $request, Project $project)
    {
        $request->validate([
            'project_name' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'time_taken' => 'required|string',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:project_categories,id',
            'images.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $project->update($request->only('project_name', 'client', 'time_taken', 'location', 'description', 'category_id'));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('projects', 'public');
                ProjectImage::create([
                    'project_id' => $project->id,
                    'path' => $path,
                ]);
            }
        }

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
            'thumbnail' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'article_link' => 'required|string|max:255',
        ]);

        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $article->thumbnail = $thumbnailPath;
        }

        $article->update($request->only('article_title', 'article_author', 'article_link'));

        return redirect()->route('admin.dashboard')->with('success', 'Article updated successfully');
    }
}
