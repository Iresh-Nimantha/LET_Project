<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminSettingsController extends Controller
{
    public function edit()
    {
        $setting = SiteSetting::first();
        if (!$setting) {
            $setting = SiteSetting::create(['site_name' => 'London Elite Trades Ltd']);
        }
        return view('admin.settings', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = SiteSetting::first();
        
        $data = $request->except(['_token', 'logo', '_method', 'logo_base64']);
        
        if ($request->filled('logo_base64')) {
            $data['logo_path'] = $request->input('logo_base64');
        }
        
        $setting->update($data);
        
        return back()->with('success', 'Site settings updated successfully!');
    }
}
