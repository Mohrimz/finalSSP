<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ManageUsersController extends Controller
{
    /**
     * Display the Manage Users view.
     *
     * This view now embeds the Livewire component for listing and searching users.
     */
    public function index(Request $request)
    {
        return view('admin.manage_users');
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user)
    {
        // Assuming you create an edit view, e.g., resources/views/admin/edit_user.blade.php
        return view('admin.edit_user', compact('user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => "required|email|max:255|unique:users,email,{$user->id}",
        ]);

        $user->update($validated);

        return redirect()->route('admin.manage.users')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.manage.users')->with('success', 'User deleted successfully.');
    }
}
