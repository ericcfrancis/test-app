<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //register
    public function register( Request $request )
    {
        $validated = $request->validate([
            'name' =>'required|string|max:255',
            'email'=>'required|email|unique:users',
            'password'=>'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('dashboard')->with('success', 'Registered');
        // return response()->json(['message' => 'User registered successfully']);
    }

    //login
    public function login( Request $request )
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Invalid credentials']);
        }

        $user =  Auth::user();
        
        return redirect()->route('user-dashboard')->with('success', 'Login');
    }

    //logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'Logout');
        // return response()->json(['message' => 'Logged out successful']);
    }
}
