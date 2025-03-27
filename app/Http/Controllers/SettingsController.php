<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('settings.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'phone' => 'required|string|max:20',
            'post' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'post' => $request->post,
        ]);

        if ($request->password) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);
        }

        return redirect()->route('settings.edit')->with('success', 'Profil mis à jour avec succès!');
    }
}