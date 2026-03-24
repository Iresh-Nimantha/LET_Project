<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class AdminContactLeadsController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->paginate(15);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function markRead(Contact $contact)
    {
        $contact->update(['is_read' => true]);
        
        return redirect()->back()->with('success', 'Message marked as read.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')->with('success', 'Message deleted successfully.');
    }
}
