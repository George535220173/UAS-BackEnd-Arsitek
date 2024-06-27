<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article; // Import model Article

class HomeController extends Controller
{
    /**
     * Buat instance controller baru.
     *
     * @return void
     */
    public function __construct()
    {
        // Middleware auth dimatikan, jadi semua orang bisa akses halaman ini
        // $this->middleware('auth');
    }

    /**
     * Tampilkan halaman dashboard aplikasi.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Ambil semua artikel dari database, urutkan dari yang terbaru
        $articles = Article::orderBy('created_at', 'desc')->get();
        
        // Tampilkan view 'index' dan kirim data artikel ke view tersebut
        return view('index', compact('articles'));
    }

}
