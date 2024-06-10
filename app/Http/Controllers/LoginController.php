<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index() {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request) {
        $validateData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (Auth::attempt($validateData)) {
            $request->session()->regenerate();
           if (Auth::user()->admin) {
                return redirect()->intended('/dashboard');
            } else {
                return redirect()->intended('/');
            }
        }
             return back()->with(['loginError' => 'Login gagal!']);
    }


    // logout
      public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }



    public function showRegisterForm() {
        return view('login.register', [
            'title' => 'Register'
        ]);
    }


        public function register(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:5|confirmed',
        ]);

        // Create a new user
        User::create([
            'email' => $request->email,
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        // Redirect to a success page or login page
        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }

}
