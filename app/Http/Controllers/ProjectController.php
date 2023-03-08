<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    

    public function index()
    {
        return view('projects.index')
        ->with('projects', Project::all())
        ->with('category', null);
    }



    public function show(Project $project)
    {
        return view('projects.project',['project' => $project]);
    }



    public function home()
    {
        return view('projects.home');
    }

    public function about()
    {
        return view('projects.about');
    }

    

    public function listByCategory(Category $category)
    {
        return view('projects.index')
        ->with('projects', $category->projects)
        ->with('category', $category);
    }

    public function create() {
        return view('admin.projects.create')
        ->with('categories', Category::all())
        ->with('project', null);
    }

    public function store() {
        $attributes = request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'url' => ['nullable','sometimes','url'],
            'published_date' => ['nullable','sometimes','date'],
            'category_id' => ['nullable','sometimes','exists:categories,id'],
        ]);
        $attributes['slug'] = Str::slug($attributes['title']);
        Project::create($attributes);

        // Set a flash message
        session()->flash('success','Project Created Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');

    }

    public function edit(Project $project) {
        return view('admin.projects.create')
        ->with('project', $project)
        ->with('categories', Category::all());
    }

    public function update(Project $project, Request $request) {

        $attributes = request()->validate([
            'title' => ['required','unique:projects,title,'.$project->id],
            'excerpt' => 'required',
            'body' => 'required',
            'url' => ['nullable','sometimes','url'],
            'published_date' => ['nullable','sometimes','date'],
            'category_id' => ['nullable','sometimes','exists:categories,id'],
        ]);

        $project->update($attributes);

        session()->flash('success','Project Edited Successfully');
        return redirect('/admin');

    }

    public function destroy(Project $project) {
        $project->delete();

        // Set a flash message
        session()->flash('success','Project Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }


}
