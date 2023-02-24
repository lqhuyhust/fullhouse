<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use App\Mail\UserNotifyMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {

        // $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $users = User::all();
        return response()->json([
            'users' => $users
        ]);
    }

    public function store(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone_number'),
            'password' => Hash::make($request->get('password')),
        ]);

        $user->setPasswordAttribute($request->get('password'));
        $user->save();

        $details = [
            'title' => 'Account Information Notification',
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'url' => env('APP_URL') . '/admin/change-password/' . $user->id,
        ];
        \Mail::to($user->email)->send(new UserNotifyMail($details));

        return response()->json([
            'data' => [
                'name' => $user->name,
                'email' => $user->email,
            ],
            'status_code' => 200,
            'message' => 'Create new user successfully!'
        ]);
    }

    public function getOneUser(Request $request, $id)
    {
        $user = User::find($id);
        if ($user)
        {
            return response()->json([
                'data' => $user,
                'status_code' => 200,
                'message' => 'Get user information successfully!'
            ]);
        } else
        {
            return response()->json([
                'data' => [],
                'status_code' => 404,
                'message' => 'User not found!'
            ]);
        }
    }

    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::where('id', $id);
        if ($user) {
            $user->update([
                'name' => $request->get('name'),
                'phone_number' => $request->get('phone_number'),
            ]);
            return response()->json([
                'data' => $user,
                'status_code' => 200,
                'message' => 'Update user successfully!'
            ]);
        } else {
            return response()->json([
                'data' => [],
                'status_code' => 404,
                'message' => 'User not found!'
            ]);
        }
    }

    public function savePassword(ChangePasswordRequest $request, $id)
    {
        $user = User::find($id);
        $currentPassword = $request->get('current_password');
        $newPassword = $request->get('new_password');

        if (!(Hash::check($currentPassword, $user->password)))
        {
            return response()->json([
                'data' => [],
                'status_code' => 400,
                'message' => 'Your current password does not matches with the password.'
            ]);
        }

        if (strcmp($currentPassword, $newPassword)==0) 
        {
            return response()->json([
                'data' => [],
                'status_code' => 400,
                'message' => 'New Password cannot be same as your current password.'
            ]);
        }

        $user->setPasswordAttribute($newPassword);
        $user->save();

        return response()->json([
            'data' => [],
            'status_code' => 200,
            'message' => 'New Password cannot be same as your current password.'
        ]);
    }

    public function delete(Request $request, $id)
    {
        $user = User::find($id);
        if ($user)
        {
            $user->delete();
            return response()->json([
                'data' => [],
                'status_code' => 200,
                'message' => 'Delete user successfully!'
            ]);
        } else {
             return response()->json([
                'data' => [],
                'status_code' => 404,
                'message' => 'User not found!'
            ]);
        }
    }
}
