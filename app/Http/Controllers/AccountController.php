<?php

namespace App\Http\Controllers;

use App\Http\Requests\Accounts\StoreAccountRequest;
use App\Http\Requests\Accounts\UpdateAccountRequest;
use App\Models\Account;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
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
            'account' => $account,
            'owner' => $account->owner,
            'contacts' => $account->contacts
        ]);
    }

    public function create()
    {
        return Inertia::render('Accounts/Create', [
            'users' => User::all() // good enough for the test task, terrible for production solution
        ]);
    }

    public function store(StoreAccountRequest $request)
    {
        Account::create($request->validated());

        return Redirect::route('accounts.index');
    }

    public function edit(Account $account)
    {
        return Inertia::render('Accounts/Edit', [
            'account' => $account,
            'users' => User::all() // good enough for the test task, terrible for production solution
        ]);
    }

    public function update(UpdateAccountRequest $request, Account $account)
    {
        $account->fill($request->validated());
        $account->save();

        return Redirect::route('accounts.index');
    }

    public function destroy(Account $account)
    {
        $account->deleteOrFail();

        return Redirect::route('accounts.index');
    }
}
