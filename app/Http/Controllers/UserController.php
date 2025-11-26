<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name')->paginate(10);
        
        // Gunakan view di folder pages (tanpa auth)
        return view('pages.user.index', compact('users'));
    }

    public function create()
    {
        // Gunakan view di folder pages (tanpa auth)
        return view('pages.user.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:50|unique:users',
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:admin,user,warga'
        ]);

        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);

        return redirect()->route('user.index')
            ->with('success', 'User berhasil ditambahkan!');
    }

    public function show(User $user)
    {
        return view('pages.user-show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('pages.user-edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:50|unique:users,username,' . $user->id,
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,user,warga'
        ]);

        $user->update($validated);

        return redirect()->route('user.index')
            ->with('success', 'User berhasil diperbarui!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')
            ->with('success', 'User berhasil dihapus!');
    }
}