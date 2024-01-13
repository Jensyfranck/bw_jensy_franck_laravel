<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function show($id)
    {
        $user = User::with('posts')->findOrFail($id);
        return view('profiles.show', compact('user'));
    }
    public function editProfile()
    {
        return view('edit-profile', ['user' => Auth::user()]);
    }

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function promote(User $user)
    {
        $user->is_admin = true;
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User promoted to admin.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // Add 'is_admin' field if you want to allow setting admin status directly
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'birthday' => 'nullable|date',
            'avatar' => 'nullable|image|max:2048', // 2MB Max
            'biography' => 'nullable|string|max:1000'
        ]);

        if ($request->filled('birthday')) {
            $user->birthday = $validatedData['birthday'];
        }

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }

        $user->biography = $validatedData['biography'];
        $user->save();

        return redirect()->route('user.profile', $user);
    }
}
