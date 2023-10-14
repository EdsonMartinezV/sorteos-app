<?php

namespace App\Http\Controllers;

use App\Models\Competitor;
use App\Models\Lottery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function login(): View{
        return view('login.index');
    }

    public function authenticate(Request $request): RedirectResponse{
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Oops, intenta de nuevo'
        ]);
    }

    public function home(): View{
        return view('login.home');
    }

    public function logout(Request $request): RedirectResponse{
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
