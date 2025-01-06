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

        return redirect()->route('login.form')->with('success', 'Registered');
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
        
        return redirect()->route('index')->with('success', 'Login');
    }

    //logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'Logout');
    }

    //index
    public function index()
    {
        $user = auth()->user();

        return view('auth.index', compact('user'));
    }

    //edit
    public function edit()
    {
        $user = auth()->user();
        return view('auth.profile.edit', compact('user'));
    }

    //update
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(), 
            'password' => 'nullable|string|min:8|confirmed', 
        ]);

        $user = auth()->user();

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if ($request->filled('password')) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();
        return view('auth.index', compact('user'));
    }
}
