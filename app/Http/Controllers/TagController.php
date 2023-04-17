<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    //
    public function getTagsJSON()
    {
        $tags = Tag::all();
        return response()->json($tags);
    }
}