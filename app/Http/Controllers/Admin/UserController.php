<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create(Request $request)
    {
        return view('admin.users.create');
    }

    public function store(UserRequest $request)
    {
        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone_number'),
            'password' => Hash::make($request->get('password')),
        ]);
        return redirect(route('admin.users.index'))->with('success', __('Create User successfully!'));
    }

    public function edit(Request $request, $id)
    {
        $user = User::find($id);
        if ($user)
        {
            return view('admin.users.edit', compact('user'));
        } else
        {
            abort(404);
        }
    }

    public function update(UserUpdateRequest $request, $id)
    {
        User::where('id', $id)->update([
            'name' => $request->get('name'),
            'phone_number' => $request->get('phone_number'),
        ]);
        return redirect(route('admin.users.index'))->with('success', __('Update User successfully!'));
    }

    public function changePassword(Request $request, $id)
    {
        $user = User::find($id);
        if ($user)
        {
            return view('admin.users.change-password', compact('user'));
        } else
        {
            abort(404);
        }
    }

    public function savePassword(ChangePasswordRequest $request, $id)
    {
        $user = User::find($id);
        $currentPassword = $request->get('current_password');
        $newPassword = $request->get('new_password');

        if (!(Hash::check($currentPassword, $user->password)))
        {
            return redirect()->back()->withErrors(['current_password' => __('Your current password does not matches with the password.')]);
        }

        if (strcmp($currentPassword, $newPassword)==0) 
        {
            return redirect()->back()->withErrors(['new_password' => __('New Password cannot be same as your current password.')]);
        }

        $user->setPasswordAttribute($newPassword);
        $user->save();

        return redirect(route('admin.users.index'))->with('success', __('Change user password successfully!'));
    }

    public function delete(Request $request)
    {
        if (strcmp(Auth::user()->id, $request->input('user_id')) == 0)
        {
            return redirect()->back()->with('error', __('You can not delete yourself!'));
        }
        $user = User::find($request->input('user_id'));
        if ($user)
        {
            $user->delete();
            return redirect(route('admin.users.index'))->with('success', __('Delete user successfully!'));
        } else
        {
            return redirect(route('admin.users.index'))->with('info', __('User not found!'));
        }
    }
}
