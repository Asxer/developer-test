<?php

namespace App\Http\Controllers;


use App\Models\Account;
use Inertia\Inertia;

class AccountController extends Controller
{
    public function index()
    {
        return Inertia::render('Accounts/Index', [
            'accounts' => Account::all(),
        ]);
    }

    public function show(Account $account)
    {
        return Inertia::render('Accounts/Show', [
            'account' => $account->load(['contacts', 'owner'])
        ]);
    }

    public function create()
    {
        return Inertia::render('Accounts/Create');
    }

    public function store()
    {

    }

    public function edit(Account $account)
    {
        return Inertia::render('Accounts/Edit', [
            'account' => $account
        ]);
    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
