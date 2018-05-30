<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function success()
    {
        if (\Auth::check()) {
            return redirect()->route('index');
        }

        return view('auth.register-success');
    }
}
