<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function dologin(Request $request)
    {
        // validasi
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        if (auth()->attempt($credentials)) {

            // buat ulang session login
            $request->session()->regenerate();
            // dd(auth()->user()->email);
            if (auth()->user()->email == "rico@gmail.com") {
                // jika user superadmin
                Alert::success("Success", "Login Success");
                return redirect()->intended('/administrator/dashboard');
            }
        }

        // jika email atau password salah
        // kirimkan session error
        return back()->with('error', 'email atau password salah');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8'
        ]);

        $user = auth()->user();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/');
    }


    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
