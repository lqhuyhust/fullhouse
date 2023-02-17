@extends('admin.layouts.app')
@section('title','Change user password')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Change user password: {{$user->email}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">Users</a></li>
                    <li class="breadcrumb-item active">Change user password</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Change user password</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('admin.change_password.save', $user->id)}}"
                            enctype='multipart/form-data'>
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="inputCurrentPassword">Current Password</label>
                                <input type="password" id="inputCurrentPassword" name="current_password"
                                    class="form-control @error('current_password') is-invalid @enderror"
                                    value="{{old('current_password', $user->current_password ?? '')}}">
                                @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputNewPassword">New Password</label>
                                <input type="password" id="inputNewPassword" name="new_password"
                                    class="form-control @error('new_password') is-invalid @enderror"
                                    value="{{old('new_password', $user->new_password ?? '')}}">
                                @error('new_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <a href="{{route('admin.users.index')}}" class="btn btn-secondary">Cancel</a>
                                    <input type="submit" value="Save" class="btn btn-success float-right">
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@stop
