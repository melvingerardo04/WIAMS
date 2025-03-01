<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AuditLog;
use Inertia\Inertia;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Method to fetch all users and pass them to the view
    public function index()
    {
        $users = User::all();
        return Inertia::render('UserAccounts/Useraccount', ['users' => $users]);
    }

    // Method to show the edit form for a user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return Inertia::render('UserAccounts/EditUser', ['user' => $user]);
    }

    // Method to update an existing user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        AuditLog::create([
            'user_id' => Auth::id(),
            'action' => 'Updated User',
            'details' => json_encode($request->all())
        ]);

        return redirect()->route('useraccounts');
    }

    // Method to delete a user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        AuditLog::create([
            'user_id' => Auth::id(),
            'action' => 'Deleted User',
            'details' => json_encode(['id' => $id])
        ]);

        return redirect()->route('useraccounts');
    }
}
