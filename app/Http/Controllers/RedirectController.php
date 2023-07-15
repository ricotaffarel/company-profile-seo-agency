<?php

namespace App\Http\Controllers;


class RedirectController extends Controller
{
    public function check()
    {
        if (auth()->user()->email == "rico@gmail.com") {
            return redirect()->intended('/administrator/dashboard');
        } else {
            return redirect()->intended('/');
        }
    }
}
