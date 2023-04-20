<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use App\Models\User;
use App\Models\Tag;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.index')
            ->with('projects', Project::all())
            ->with('users', User::all())
            ->with('categories', Category::all())
            ->with('tags', Tag::all());
    }

}