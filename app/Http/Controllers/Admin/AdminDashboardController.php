<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'counts' => [
                'services' => Service::count(),
                'projects' => Project::count(),
                'blogs' => Blog::count(),
                'testimonials' => Testimonial::count(),
                'contacts_total' => Contact::count(),
                'contacts_unread' => Contact::query()->whereNull('read_at')->count(),
            ],
        ]);
    }
}

