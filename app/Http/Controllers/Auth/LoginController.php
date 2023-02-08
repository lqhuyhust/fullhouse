<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $activationService;

    public function login()
    {
        return view('auth.login');
    }

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    protected function authenticate(LoginRequest $request)
    {
        $credentials = $request->except('_token');
        if (Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            $user = Auth::user();
            return redirect()->intended(route('admin.dashboard'));
        }
        return redirect(route('login'))->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'));
    }
}
