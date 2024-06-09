<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
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
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        

        Article::create([
            'title' => $request->title,
            'author' => $request->author,
            'content' => $request->content,
        ]);

        return redirect()->route('admin.articles');
    }
}
