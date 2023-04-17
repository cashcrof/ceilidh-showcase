<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\Tag;


class ProjectController extends Controller
{
    public function getProjectsJSON()
    {
        $projects = Project::with(['category', 'tags'])->get();
        return response()->json($projects);
    }

    public function index()
    {
        return view('projects.index')
            ->with('projects', Project::latest('published_date')->paginate(6)->withQueryString())
            ->with('category', null)
            ->with('categoryName', null)
            ->with('tag', null)
            ->with('tagName', null);
    }



    public function show(Project $project)
    {
        return view('projects.project', ['project' => $project]);
    }



    public function home()
    {
        return view('projects.home')
            ->with('projects', Project::latest('published_date')->take(3)->get())
            ->with('featured', Project::where('id', '=', '1')->first());
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

    public function listByTag(Tag $tag)
    {
        return view('projects.index')
            ->with('projects', $tag->projects)
            ->with('category', null)
            ->with('tag', $tag);
    }

    public function create()
    {
        return view('admin.projects.create')
            ->with('categories', Category::all())
            ->with('project', null)
            ->with('tags', Tag::all());
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'url' => ['nullable', 'sometimes', 'url'],
            'published_date' => ['nullable', 'sometimes', 'date'],
            'category_id' => ['nullable', 'sometimes', 'exists:categories,id'],
            'image' => ['nullable', 'sometimes', 'image', 'mimes:jpg,png,jpeg,gif,svg'],
            'thumb' => ['nullable', 'sometimes', 'image', 'mimes:jpg,png,jpeg,gif,svg'],
        ]);
        $attributes['slug'] = Str::slug($attributes['title']);
        // Save upload in public storage and set path attributes 
        $image_path = $request->file('image')->storeAs('images', $request->image->getClientOriginalName(), 'public');
        $attributes['image'] = $image_path;
        $thumb_path = $request->file('thumb')->storeAs('images', $request->thumb->getClientOriginalName(), 'public');
        $attributes['thumb'] = $thumb_path;

        $project = Project::create($attributes);
        $project->tags()->attach($request->tags);

        // Set a flash message
        session()->flash('success', 'Project Created Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');

    }

    public function edit(Project $project)
    {
        return view('admin.projects.create')
            ->with('project', $project)
            ->with('categories', Category::all())
            ->with('tags', Tag::all());
    }

    public function update(Project $project, Request $request)
    {

        $attributes = request()->validate([
            'title' => ['required', 'unique:projects,title,' . $project->id],
            'excerpt' => 'required',
            'body' => 'required',
            'url' => ['nullable', 'sometimes', 'url'],
            'published_date' => ['nullable', 'sometimes', 'date'],
            'category_id' => ['nullable', 'sometimes', 'exists:categories,id'],
            'image' => ['nullable', 'sometimes', 'image', 'mimes:jpg,png,jpeg,gif,svg'],
            'thumb' => ['nullable', 'sometimes', 'image', 'mimes:jpg,png,jpeg,gif,svg'],
            'tags' => ['nullable', 'sometimes', 'array'],
        ]);
        // Save upload in public storage and set path attributes 
        $image_path = $request->file('image')->storeAs('images', $request->image->getClientOriginalName(), 'public');
        $attributes['image'] = $image_path;
        $thumb_path = $request->file('thumb')->storeAs('images', $request->thumb->getClientOriginalName(), 'public');
        $attributes['thumb'] = $thumb_path;

        $project->update($attributes);


        session()->flash('success', 'Project Edited Successfully');
        return redirect('/admin');

    }

    public function destroy(Project $project)
    {
        $project->delete();

        // Set a flash message
        session()->flash('success', 'Project Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }


}