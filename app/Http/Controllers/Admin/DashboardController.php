<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard(Request $request)
    {
        $apartments = Apartment::latest()->take(5)->get();
        $users = User::latest()->take(5)->get();
        return view('admin.dashboard', compact('apartments', 'users'));
    }
}
