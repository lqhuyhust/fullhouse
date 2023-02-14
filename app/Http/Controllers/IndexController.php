<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $keyword = ($request->get('keyword') != '') ? $request->get('keyword') : '';
        $price_range = ($request->get('price') != '') ? config('site-settings.price_range')[$request->get('price')] : config('site-settings.price_range')['0'];
        $area_range = ($request->get('area') != '') ? config('site-settings.area_range')[$request->get('area')] : config('site-settings.area_range')['0'];
        
        $apartments = Apartment::where(function ($query) use($keyword){
            $query->where('title', 'like', '%'.$keyword.'%')
                ->orWhere('description', 'like', '%'.$keyword.'%');
        })
        ->where('status', '!=', 0)
        ->whereBetween('price', [$price_range[0], $price_range[1]])
        ->whereBetween('price', [$area_range[0], $area_range[1]])
        ->orderBy('created_at', 'desc')
        ->paginate(config('site-settings.web_paginate'));

        return view('web.home', compact('apartments', 'keyword'));
    }

    public function apartment(Request $request, $id)
    {
        $apartment = Apartment::find($id);
        return view('web.apartment', compact('apartment'));
    }
}
