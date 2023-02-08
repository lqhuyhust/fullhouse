<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function update(UserRequest $request, $id)
    {
        User::where('id', $id)->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone_number'),
        ]);
        return redirect(route('admin.users.index'))->with('success', __('Update User successfully!'));
    }

    public function delete(Request $request)
    {
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

    public function view(Request $request, $id)
    {
        $user = User::find($id);
        if ($user)
        {
            return view('admin.users.view', compact('user'));
        } else
        {
            abort(404);
        }
    }
}
