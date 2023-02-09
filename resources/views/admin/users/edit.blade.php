@extends('admin.layouts.app')
@section('title','Edit User')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit User: {{$user->email}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">Users</a></li>
                    <li class="breadcrumb-item active">{{$user->email}}</li>
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
                        <h3 class="card-title">Edit</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('admin.users.edit.update', $user->id)}}"
                            enctype='multipart/form-data'>
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" id="inputName" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{old('name', $user->name ?? '')}}">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputPhoneNumber">Phone Number</label>
                                <input type="text" id="inputPhoneNumber" name="phone_number"
                                    class="form-control @error('phone_number') is-invalid @enderror"
                                    value="{{old('phone_number', $user->phone_number ?? '')}}">
                                @error('phone_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <a href="{{route('admin.users.index')}}" class="btn btn-secondary">Cancel</a>
                                    <a href="{{route('admin.users.change_password',$user->id)}}" class="btn btn-primary">Change Password</a>
                                    <input type="submit" value="Update user" class="btn btn-success float-right">
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
