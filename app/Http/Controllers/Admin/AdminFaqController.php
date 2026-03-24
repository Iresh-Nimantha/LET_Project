<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Faq;

class AdminFaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('sort_order', 'asc')->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');
        $data['sort_order'] = $request->sort_order ?? 0;

        Faq::create($data);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ created successfully.');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');
        $data['sort_order'] = $request->sort_order ?? 0;

        $faq->update($data);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ updated successfully.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ deleted successfully.');
    }
}
