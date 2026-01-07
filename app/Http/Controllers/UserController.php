<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name')->paginate(50);
        
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
            'role' => 'required|in:super_admin,admin,petugas'
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
            'role' => 'required|in:super_admin,admin,petugas'
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

    public function avatar()
    {
        return view('pages.user.avatar');
    }

    public function showAvatarForm()
    {
        return view('pages.user.avatar');
    }

    public function uploadAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $user = Auth::user();
        
        if ($request->hasFile('avatar')) {
            try {
                $file = $request->file('avatar');
                Log::info('Avatar upload attempt', ['user_id' => $user->id, 'name' => $file->getClientOriginalName(), 'size' => $file->getSize()]);
            } catch (\Throwable $e) {
                Log::warning('Avatar upload: failed to read file info: ' . $e->getMessage());
            }
            // Hapus avatar lama jika ada
            if ($user->avatar && file_exists(public_path('images/profiles/' . $user->avatar))) {
                unlink(public_path('images/profiles/' . $user->avatar));
            }

            // Upload avatar baru
            $file = $request->file('avatar');
            $filename = time() . '_' . $user->id . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/profiles'), $filename);
            Log::info('Avatar file moved', ['user_id' => $user->id, 'filename' => $filename]);

            // Update database
            $user->update(['avatar' => $filename]);

            return redirect()->route('user.avatar')
                ->with('success', 'Avatar berhasil diupload!');
        }

        return redirect()->back()->with('error', 'Gagal upload avatar!');
    }
}