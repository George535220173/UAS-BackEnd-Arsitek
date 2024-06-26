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
    // Cek kalau user adalah admin, kalau bukan redirect ke login
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check() && Auth::user()->email == 'mrsadminteam@gmail.com') {
                return $next($request);
            }
            return redirect('/login')->with('error', 'Unauthorized access');
        })->except(['showProjects', 'showProjectDetails', 'favoriteProject', 'showFavorites', 'showArchitectureProjects', 'showInteriorDesignProjects']);
    }

    // Tampilkan halaman admin dashboard
    public function index()
    {
        $projects = Project::with('images', 'category')->get();
        $articles = Article::all();
        $categories = ProjectCategory::all();
        $mainCategories = ['Architecture', 'Interior Design'];
    
        return view('admin', compact('projects', 'articles', 'categories', 'mainCategories'));
    }

    // Simpan artikel baru
    public function store_articles(Request $request)
    {
        $request->validate([
            'article_title' => 'required|string|max:255',
            'article_author' => 'required|string|max:255',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'article_link' => 'required|string|max:255',
        ]);
    
        if ($request->hasFile('thumbnail')) {
            $filename = $request->file('thumbnail')->getClientOriginalName();
            $destinationPath = public_path('img/Article');
            $request->file('thumbnail')->move($destinationPath, $filename);
    
            $thumbnailPath = 'img/Article/' . $filename;
    
            Article::create([
                'article_title' => $request->article_title,
                'article_author' => $request->article_author,
                'thumbnail' => $thumbnailPath,
                'article_link' => $request->article_link,
            ]);
    
            return redirect()->route('admin.dashboard')->with('success', 'Article added successfully');
        }
    
        return redirect()->route('admin.dashboard')->with('error', 'Failed to upload thumbnail');
    }

    // Simpan project baru
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
                $filename = $image->getClientOriginalName();
                $destinationPath = public_path('img/Project');
                $image->move($destinationPath, $filename);
    
                ProjectImage::create([
                    'project_id' => $project->id,
                    'path' => 'img/Project/' . $filename,
                ]);
            }
        }
    
        return redirect()->route('admin.dashboard')->with('success', 'Project added successfully');
    }

    // Simpan kategori baru
    public function storeCategory(Request $request)
    {
        $request->validate([
            'main_category' => 'required|string|max:255',
            'name' => 'required|unique:project_categories|string|max:255',
        ]);
    
        ProjectCategory::create([
            'main_category' => $request->main_category,
            'name' => $request->name,
        ]);
    
        return redirect()->route('admin.dashboard')->with('success', 'Category added successfully');
    }

    // Tampilkan daftar project
    public function showProjects(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'asc');
        $category = $request->input('category');

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
        ->when($category, function ($query, $category) {
            return $query->where('category_id', $category);
        })
        ->paginate(8);

        $categories = ProjectCategory::all();

        return view('projects', compact('projects', 'categories'));
    }

    // Tambah atau hapus project dari favorit
    public function favoriteProject(Request $request)
    {
        $projectId = $request->input('project_id');
        $favorites = session('favorites', []);
    
        if (in_array($projectId, $favorites)) {
            // Hapus dari favorit
            $favorites = array_diff($favorites, [$projectId]);
            session(['favorites' => $favorites]);
    
            return response()->json(['status' => 'removed']);
        } else {
            // Tambah ke favorit
            $favorites[] = $projectId;
            session(['favorites' => $favorites]);
    
            return response()->json(['status' => 'added']);
        }
    }

    // Tampilkan daftar project favorit
    public function showFavorites()
    {
        $favoriteIds = session('favorites', []);
        $favorites = Project::whereIn('id', $favoriteIds)->get();
        return view('favorites', compact('favorites'));
    }

    // Tampilkan detail project
    public function showProjectDetails($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.project_details', compact('project'));
    }

    // Hapus project
    public function destroyProject(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Project deleted successfully');
    }

    // Hapus artikel
    public function destroyArticle(Article $article)
    {
        $article->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Article deleted successfully');
    }

    // Tampilkan form edit project
    public function editProject(Project $project)
    {
        $categories = ProjectCategory::all();
        return view('admin.edit_project', compact('project', 'categories'));
    }

    // Update project
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

    // Tampilkan form edit artikel
    public function editArticle(Article $article)
    {
        return view('admin.edit_article', compact('article'));
    }

    // Update artikel
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

    // Tampilkan proyek kategori arsitektur
    public function showArchitectureProjects(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'asc');
        $category = $request->input('category');
    
        $projects = Project::whereHas('category', function ($query) {
            $query->where('main_category', 'Architecture');
        })
        ->when($search, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->whereRaw('LOWER(project_name) LIKE ?', ['%' . strtolower($search) . '%'])
                      ->orWhereRaw('LOWER(client) LIKE ?', ['%' . strtolower($search) . '%'])
                      ->orWhereRaw('LOWER(location) LIKE ?', ['%' . strtolower($search) . '%'])
                      ->orWhereRaw('LOWER(description) LIKE ?', ['%' . strtolower($search) . '%']);
            });
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
        ->when($category, function ($query, $category) {
            return $query->where('category_id', $category);
        })
        ->paginate(8);
    
        $categories = ProjectCategory::where('main_category', 'Architecture')->get();
        $mainCategory = 'Architecture';
    
        return view('projects.architecture', compact('projects', 'categories', 'mainCategory'));
    }

    // Tampilkan proyek kategori desain interior
    public function showInteriorDesignProjects(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'asc');
        $category = $request->input('category');
    
        $projects = Project::whereHas('category', function ($query) {
            $query->where('main_category', 'Interior Design');
        })
        ->when($search, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->whereRaw('LOWER(project_name) LIKE ?', ['%' . strtolower($search) . '%'])
                      ->orWhereRaw('LOWER(client) LIKE ?', ['%' . strtolower($search) . '%'])
                      ->orWhereRaw('LOWER(location) LIKE ?', ['%' . strtolower($search) . '%'])
                      ->orWhereRaw('LOWER(description) LIKE ?', ['%' . strtolower($search) . '%']);
            });
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
        ->when($category, function ($query, $category) {
            return $query->where('category_id', $category);
        })
        ->paginate(8);
    
        $categories = ProjectCategory::where('main_category', 'Interior Design')->get();
        $mainCategory = 'Interior Design';
    
        return view('projects.interiordesign', compact('projects', 'categories', 'mainCategory'));
    }
}

