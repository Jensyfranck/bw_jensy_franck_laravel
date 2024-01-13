<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function promoteToAdmin(Request $request, $userId)
    {
        $user = User::find($userId);
        if ($user && $user->is_admin) {
            $user->is_admin = true;
            $user->save();
            return redirect()->back()->with('success', 'User promoted to admin.');
        }

        return redirect()->back()->with('error', 'User not found.');
    }
}
