<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Tag;


class TagController extends Controller
{
    //
    public function getTagsJSON()
    {
        $tags = Tag::all();
        return response()->json($tags);
    }

    public function create()
    {
        return view('admin.tags.create')
            ->with('category', null)
            ->with('tag', null);
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
        ]);
        $attributes['slug'] = Str::slug($attributes['name']);
        Tag::create($attributes);

        // Set a flash message
        session()->flash('success', 'Tag Created Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');

    }

    public function edit(Tag $tag)
    {
        return view('admin.tags.create')
            ->with('tag', $tag);

    }

    public function update(Tag $tag, Request $request)
    {

        $attributes = request()->validate([
            'name' => 'required',
        ]);
        $attributes['slug'] = Str::slug($attributes['name']);

        $tag->update($attributes);

        session()->flash('success', 'Tag Edited Successfully');
        return redirect('/admin');

    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        // Set a flash message
        session()->flash('success', 'Tag Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }
}