<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisionHighlight;
use Illuminate\Http\Request;

class AdminVisionHighlightController extends Controller
{
    public function index()
    {
        $visionHighlights = VisionHighlight::orderBy('sort_order', 'asc')->paginate(10);
        return view('admin.vision_highlights.index', compact('visionHighlights'));
    }

    public function create()
    {
        return view('admin.vision_highlights.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'sort_order' => 'required|integer',
            'is_active' => 'boolean',
            'faq_question' => 'nullable|string|max:255',
            'faq_answer' => 'nullable|string',
        ]);
        
        $validated['is_active'] = $request->has('is_active');

        if ($request->filled('image_base64')) {
            $validated['image_path'] = $request->input('image_base64');
        }

        VisionHighlight::create($validated);

        return redirect()->route('admin.vision-highlights.index')->with('success', 'Vision Highlight created successfully.');
    }

    public function edit(VisionHighlight $visionHighlight)
    {
        return view('admin.vision_highlights.edit', compact('visionHighlight'));
    }

    public function update(Request $request, VisionHighlight $visionHighlight)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'sort_order' => 'required|integer',
            'is_active' => 'boolean',
            'faq_question' => 'nullable|string|max:255',
            'faq_answer' => 'nullable|string',
        ]);
        
        $validated['is_active'] = $request->has('is_active');

        if ($request->filled('image_base64')) {
            $validated['image_path'] = $request->input('image_base64');
        }

        $visionHighlight->update($validated);

        return redirect()->route('admin.vision-highlights.index')->with('success', 'Vision Highlight updated successfully.');
    }

    public function destroy(VisionHighlight $visionHighlight)
    {
        $visionHighlight->delete();

        return redirect()->route('admin.vision-highlights.index')->with('success', 'Vision Highlight deleted successfully.');
    }
}
