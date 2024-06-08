<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contacts\StoreContactRequest;
use App\Http\Requests\Contacts\UpdateContactRequest;
use App\Models\Account;
use App\Models\Contact;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function index()
    {
        return Inertia::render('Contacts/Index', [
            'contacts' => Contact::with(['account'])->get(),
        ]);
    }

    public function show(Contact $contact)
    {
        return Inertia::render('Contacts/Show', [
            'contact' => $contact,
            'account' => $contact->account
        ]);
    }

    public function create()
    {
        return Inertia::render('Contacts/Create', [
            'accounts' => Account::all() // good enough for the test task, terrible for production solution
        ]);
    }

    public function store(StoreContactRequest $request)
    {
        Contact::create($request->validated());

        return Redirect::route('contacts.index');
    }

    public function edit(Contact $contact)
    {
        return Inertia::render('Contacts/Edit', [
            'contact' => $contact,
            'accounts' => Account::all() // good enough for the test task, terrible for production solution
        ]);
    }

    public function update(UpdateContactRequest $request, Contact $contact)
    {
        $contact->fill($request->validated());
        $contact->save();

        return Redirect::route('contacts.index');
    }

    public function destroy(Contact $contact)
    {
        $contact->deleteOrFail();

        return Redirect::route('contacts.index');
    }
}
