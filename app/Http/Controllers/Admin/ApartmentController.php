<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApartmentRequest;
use App\Models\Apartment;

use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $apartments = Apartment::all();
        return view('admin.apartments.index', compact('apartments'));
    }

    public function create(Request $request)
    {
        return view('admin.apartments.create');
    }

    public function store(ApartmentRequest $request)
    {
        $data = $request->except('_token');
        if(isset($data['images']))
        {
            $path = $this->_upload($request);
            if ($path) {
                $data['images'] = $path;
            }
        } 

        $data = array_filter($data, 'strlen');
        Apartment::create($data);
        return redirect(route('admin.apartments.index'))->with('success', __('Create Apartment successfully!'));
    }

    public function edit(Request $request, $id)
    {
        $apartment = Apartment::find($id);
        if ($apartment)
        {
            return view('admin.apartments.edit', compact('apartment'));
        } else
        {
            abort(404);
        }
    }

    public function update(ApartmentRequest $request, $id)
    {
        $data = $request->except('_method', '_token');
        if(isset($data['images']))
        {
            $path = $this->_upload($request);
            if ($path) {
                $data['images'] = $path;
            }
        } else {
            $data['images'] = $data['old_images'];
        }

        unset($data['old_images']);
        $data = array_filter($data, 'strlen');
        Apartment::where('id', $id)->update($data);
        return redirect(route('admin.apartments.index'))->with('success', __('Update Apartment successfully!'));
    }

    public function delete(Request $request)
    {
        $apartment = Apartment::find($request->input('apartment_id'));
        if ($apartment)
        {
            $apartment->delete();
            return redirect(route('admin.apartments.index'))->with('success', __('Delete Apartment successfully!'));
        } else
        {
            return redirect(route('admin.apartments.index'))->with('info', __('Apartment not found!'));
        }
    }

    public function view(Request $request, $id)
    {
        $apartment = Apartment::find($id);
        if ($apartment)
        {
            return view('admin.apartments.view', compact('apartment'));
        } else
        {
            abort(404);
        }
    }

    private function _upload($request)
    {
        if ($request->hasFile('images')) {
            $photo = $request->file('images');
            $path = $photo->storeAs(
                'uploads',
                time().'.'.$photo->getClientOriginalName()
            );
            return $path;
        }
        return false;
    }
}
