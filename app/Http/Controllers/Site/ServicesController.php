<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();
        return view('site.services.index', compact('services'));
    }

    public function show(Service $service)
    {
        $otherServices = Service::where('id', '!=', $service->id)->take(4)->get();
        return view('site.services.show', compact('service', 'otherServices'));
    }
}
