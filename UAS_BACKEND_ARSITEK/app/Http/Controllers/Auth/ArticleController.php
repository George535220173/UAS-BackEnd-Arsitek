<?php
namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        $projects = Project::all(); // Fetch projects here if needed
        return view('admin', compact('articles', 'projects'));
    }

    public function store(Request $request)
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

        return redirect()->route('admin.all');
    }
}
