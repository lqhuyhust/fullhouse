<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $apartments = Apartment::all();
        return view('web.home', compact('apartments'));
    }

    public function apartment(Request $request, $id)
    {
        $apartment = Apartment::find($id);
        return view('web.apartment', compact('apartment'));
    }
}
