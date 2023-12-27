<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Factory as AuthFactory;

class AuthController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function perform(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('Books.index')->with('name', Auth::user()->name);
        }

        return redirect()->route('auth.login')->withErrors('Username or password invalid');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request, AuthFactory $auth)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        $auth->login($user);
        return redirect()->route('Books.index')->with('success', 'Register success');
    }

    public function index()
    {
        $data = Books::all();
        return view('index')->with('data', $data);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('Books.index')->with('success', 'Logged out successfully.');
    }

    public function avatar()
    {
        return view('avatar');
    }
}
