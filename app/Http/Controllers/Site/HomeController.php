<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Faq;

class HomeController extends Controller
{
    public function index()
    {
        return view('site.home', [
            'services' => Service::query()->latest()->take(6)->get(),
            'projects' => Project::query()->latest()->take(9)->get(),
            'testimonials' => Testimonial::query()->latest()->take(6)->get(),
            'blogs' => Blog::query()->latest()->take(3)->get(),
            'faqs' => Faq::query()->where('is_active', true)->orderBy('sort_order', 'asc')->orderBy('created_at', 'desc')->get(),
        ]);
    }
}

