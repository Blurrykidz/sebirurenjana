<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


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
        $remember = $request->has('remember');

        $credentials = $request->validate([
            'username' => 'required|max:18|min:4',
            'password' => 'required',
        ]);

        // Tambah filter aktif di database query secara manual
        if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password'], 'aktif' => 1], $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        // Jika user ditemukan tapi tidak aktif
        $user = User::where('username', $credentials['username'])->first();
        if ($user && $user->aktif != 1) {
            toast('Login Gagal, Akun anda tidak aktif!', 'error')->position('top-end');
            return back();
        }

        // Jika username/password salah
        toast('Login Gagal, Username atau Password salah!', 'error')->position('top-end');
        return back();
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
