@extends('admin.layouts.app')
@section('title','View User:' . $user->name)
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>View User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">View User {{$user->name}}</li>
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
                        <h3 class="card-title">User {{$user->name}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div><strong>Name</strong></div>
                            <div>{{$user->name}}</div>
                        </div>
                        <div class="form-group">
                            <div><strong>Email</strong></div>
                            <div>{{$user->email}}</div>
                        </div>
                        <div class="form-group">
                            <div><strong>Phone Number</strong></div>
                            <div>{{$user->phone_number}}</div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="{{route('admin.users.index')}}" class="btn btn-secondary">Back</a>
                <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-primary">Edit User</a>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@stop