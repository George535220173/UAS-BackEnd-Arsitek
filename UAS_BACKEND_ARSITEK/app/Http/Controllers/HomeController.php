<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::paginate(4); // Paginate projects, 4 per page
        return view('index', compact('projects'));
    }
}
