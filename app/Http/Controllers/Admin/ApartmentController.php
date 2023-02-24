<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApartmentRequest;
use App\Models\Apartment;
use App\Models\Status;

use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $apartments = Apartment::all();
        return response()->json([
            'apartments' => $apartments
        ]);
    }

    public function store(ApartmentRequest $request)
    {
        $validated = $request->validate(
            [
                'images' => 'required',
            ],
            [
                'required' => 'You need upload description image for the apartment.',
            ]
        );
        $path = $this->_upload($request);

        $apartment = new Apartment();
        $apartment->title = $request->title;
        $apartment->address = $request->address;
        $apartment->price = $request->price;
        $apartment->deposit = $request->deposit;
        $apartment->description = $request->description;
        $apartment->area = $request->area;
        $apartment->owner_name = $request->owner_name;
        $apartment->owner_phone_number = $request->owner_phone_number;
        $apartment->owner_email = $request->owner_email;
        $apartment->images = $path;
        $apartment->status = config('site-settings.statuses')['AVAILABLE'];
        $apartment->save();

        return response()->json([
            'data' => $apartment,
            'status_code' => 200,
            'message' => 'Create new apartment successfully!'
        ]);
    }

    public function getOneApartment(Request $request, $id)
    {
        $statuses = Status::all();
        $apartment = Apartment::find($id);

        if ($apartment) {
            return response()->json([
                'data' => [
                    'apartment' => $apartment,
                    'statuses' => $statuses
                ],
                'status_code' => 200,
                'message' => ''
            ]);
        } else {
            return response()->json([
                'data' => [],
                'status_code' => 404,
                'message' => 'Apartment not found!'
            ]);
        }
    }

    public function update(ApartmentRequest $request, $id)
    {
        $apartment = Apartment::find($id);
        if(isset($data['images']))
        {
            $path = $this->_upload($request);
            if ($path != '') {
                $apartment->images = $path;
            }
        }

        $apartment->title = $request->title;
        $apartment->address = $request->address;
        $apartment->price = $request->price;
        $apartment->deposit = $request->deposit;
        $apartment->description = $request->description;
        $apartment->area = $request->area;
        $apartment->owner_name = $request->owner_name;
        $apartment->owner_phone_number = $request->owner_phone_number;
        $apartment->owner_email = $request->owner_email;
        $apartment->status = 1;
        $apartment->save();

        return response()->json([
            'data' => $apartment,
            'status_code' => 200,
            'message' => 'Update apartment successfully!'
        ]);
    }

    public function delete(Request $request, $id)
    {
        $apartment = Apartment::find($id);
        if ($apartment)
        {
            $apartment->delete();
            return response()->json([
                'data' => '',
                'status_code' => 200,
                'message' => 'Delete Successfully!'
            ]);
        } else
        {
            return response()->json([
                'data' => '',
                'status_code' => 404,
                'message' => 'The apartment was removed before!'
            ], 404);
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
        return '';
    }
}
