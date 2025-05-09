<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class LoginController extends Controller
{
    public function index()
    {
        return view('back.login',[
            'title' => "login"
        ]);
    }

    public function authenticate(Request $request)
    {
       $credentials = $request->validate([
            'username'  => 'required|max:18|min:4',
            'password'  => 'required'
        ]);
        $credentials['aktif'] = 1;

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        toast('Login Gagal, Username atau Password salah!','error','top-right');
        return back();

        // return back()->with('error', ' Login Gagal, Username atau Password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }


    public function hash(){
        $password = "adminrenjana";
        $pw = Hash::make($password);
        echo json_encode($pw);
    }
}
