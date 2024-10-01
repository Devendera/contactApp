<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function index()
    {
    $contacts = Contact::orderBy('created_at', 'desc')->paginate(10);
    return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'lastName' => 'required',
            'phone' => 'required',
        ]);

        try {
            Contact::create($request->all());
            return redirect()->route('contacts.index')->with('success', 'Contact created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create contact. Please try again.');
        }
    }

    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required',
            'lastName' => 'required',
            'phone' => 'required',
        ]);

        try {
            $contact->update($request->all());
            return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update contact. Please try again.');
        }
    }

    public function destroy(Contact $contact)
    {
        try {
            $contact->delete();
            return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete contact. Please try again.');
        }
    }

    public function importXML(Request $request)
    {
        $request->validate([
            'xml_file' => 'required|mimes:xml',
        ]);

        $xmlData = simplexml_load_file($request->file('xml_file')->getRealPath());

        foreach ($xmlData->contact as $xmlContact) {
            Contact::create([
                'name' => (string)$xmlContact->name,
                'lastName' => (string)$xmlContact->lastName,
                'phone' => (string)$xmlContact->phone,
            ]);
        }

        return redirect()->route('contacts.index')->with('success', 'Contacts imported successfully.');
    }
}

