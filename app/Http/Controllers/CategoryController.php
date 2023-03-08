<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create() {
        return view('admin.categories.create')
        ->with('category', null);
    }

    public function store() {
        $attributes = request()->validate([
            'name'=>'required',
        ]);
        $attributes['slug'] = Str::slug($attributes['name']);
        Category::create($attributes);

        // Set a flash message
        session()->flash('success','Category Created Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');

    }

    public function edit(Category $category) {
        return view('admin.categories.create')
        ->with('category', $category);
    }

    public function update(Category $category, Request $request) {

        $attributes = request()->validate([
            'name'=>'required',
        ]);
        $attributes['slug'] = Str::slug($attributes['name']);

        $category->update($attributes);

        session()->flash('success','Category Edited Successfully');
        return redirect('/admin');

    }

    public function destroy(Category $category) {
        $category->delete();

        // Set a flash message
        session()->flash('success','Category Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }
}
