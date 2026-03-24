<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('site.contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        // Save to Database
        $contact = Contact::create($validated);

        try {
            Mail::to('admin@londonelitetrades.com')->send(new \App\Mail\AdminContactNotification($contact));
        } catch (\Exception $e) {
            // Log the error but don't fail the request so user still sees success message
            \Illuminate\Support\Facades\Log::error('Failed to send contact notification email: ' . $e->getMessage());
        }

        return redirect()->route('contact.create')->with('success', 'Your message has been sent successfully. We will get back to you shortly!');
    }
}
