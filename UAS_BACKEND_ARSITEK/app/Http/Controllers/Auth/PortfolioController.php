<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class PortfolioController extends Controller
{
    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('portfolio', compact('project'));
    }
}
