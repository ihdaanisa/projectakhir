<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('auth.update', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|string|in:male,female,other',
            'phone' => 'nullable|string|max:15',

            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',

        ]);

        $user = Auth::user();

        if ($request->hasFile('profile_picture')) {
            $fileName = time() . '.' . $request->profile_picture->extension();
            $path = $request->profile_picture->storeAs('public/profile', $fileName);
            $user->profile_picture = $fileName;
        }

        $user->update($request->only('name', 'address', 'gender', 'phone'));

        return redirect()->route('user.edit')->with('success', 'Profile updated successfully.');
    }
}

