<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LDAP\Result;

class UserController extends Controller {
    public function register(Request $request) 
    {
        if($request->input('action') == 'create')
        {
            $request->validate([
                'username' => 'required|string',
                'password' => 'required|string',
                'confirm_password' => 'required|string|same:password',
                'fullname' => 'required|string'
            ]);

            $username = $request->input('username');
            $fullname = $request->input('fullname');
            $password = $request->input('password');
            
            $result = User::create([
                'username' => $username,
                'password' => Hash::make($password),
                'fullname' => $fullname,
            ]);

            if($result)
            {
                return redirect()->route('login');
            }
            else
            {
                return redirect()->route('register page')->withErrors(['Gagal membuat user.']);
            }
        }
        return view('register');
    }

    public function login(Request $request) 
    {
        if($request->input('action') == 'login')
        {
            $request->validate([
                'username' => 'required|string',
                'password' => 'required|string',
               
            ]);

            $username = $request->input('username');
            $password = $request->input('password');

            $is_success = Auth::attempt([
                'username' => $username,
                'password' => $password
            ]);

            if($is_success)
            {
                $request->session()->regenerate();
                return redirect()->route('homepage'); 
            }
            else
            {
                return redirect()->route('login')->withErrors(['Username atau Password tidak sesuai']);
            }


        }
        return view('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}