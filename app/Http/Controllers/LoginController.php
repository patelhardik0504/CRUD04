<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\LoginUserRequest; 
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login()
    {
        return view('user.login');
    }

    public function logincheck(LoginUserRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication was successful
            
            return redirect()->intended('/dashboard'); // Redirect to the intended URL or a default one
        } else {
            // Authentication failed

            return redirect()->back()->withErrors(['error' => 'Invalid credentials!!!']);
           
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
      }
}
