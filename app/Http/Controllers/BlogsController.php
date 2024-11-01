<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\blogs_requests;
use App\Http\Resources\BlogsResource;
use App\Models\blogs;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function Store_blogs(blogs_requests $blogs_requests)
    {
        blogs::create($blogs_requests->all());
    }

    public function show_blog($id)
    {
        $blogs = blogs::find($id);
        if (is_null($blogs)) {
            return response()->json(['message' => 'blog not found'], 404);
        }
        else{
            return new BlogsResource($blogs);
        }
    }

    public function show_blogs_list()
    {
        $blogs = blogs::all();
        return BlogsResource::collection($blogs);
    }
}
