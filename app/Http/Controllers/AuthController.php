<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('dashboard.auth.login');
    }

    public function adminLogin(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);


        $info = ['name' => $request['username'], 'password' => $request['password']];
        if ($validated) {
            if (Auth::guard('admin')->attempt($info)) {

                return redirect()->route('home');
            } else {
                return redirect()->route('auth.login');
            }
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        //auth('admin')->logout();
        return redirect()->route('auth.login');
    }
}
