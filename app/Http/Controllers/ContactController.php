<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
   public function index()
{
    // Mark all as read
    \App\Models\Contact::where('is_read', false)
        ->update(['is_read' => true]);

    $contacts = \App\Models\Contact::latest()->get();

    return view('backend.contacts.index', compact('contacts'));
}
    // Show contact form
    public function create()
    {
        return view('frontend.contact');
    }

    // Store message
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        Contact::create($request->all());

        return back()->with('success', 'Message sent successfully!');
    }
    
    public function destroy(Contact $contact)
{
    $contact->delete();

    return back()->with('success', 'Message deleted successfully.');
}
}