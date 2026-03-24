<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogsController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(9);
        return view('site.blogs.index', compact('blogs'));
    }

    public function show(Blog $blog)
    {
        $recentBlogs = Blog::where('id', '!=', $blog->id)->latest()->take(3)->get();
        return view('site.blogs.show', compact('blog', 'recentBlogs'));
    }
}
