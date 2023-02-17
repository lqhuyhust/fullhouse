@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('css')

<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title"><b>5 Latest Apartments</b></h3>
                            <a href="{{route('admin.apartments.index')}}" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Address</th>
                                    <th>Price</th>
                                    <th>Deposit</th>
                                    <th>Owner Name</th>
                                    <th>Owner Phone Number</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($apartments as $apartment)
                                <tr>
                                    <td>{{$apartment->id}}</td>
                                    <td>{{$apartment->title}}</td>
                                    <td>{{$apartment->address}}</td>
                                    <td>{{$apartment->price}}</td>
                                    <td>{{$apartment->deposit}}</td>
                                    <td>{{$apartment->owner_name}}</td>
                                    <td>{{$apartment->owner_phone_number}}</td>
                                    <td class="apartment-actions text-right">
                                        <a class="btn btn-primary btn-sm"
                                            href="{{route('admin.apartments.view',$apartment->id)}}">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm"
                                            href="{{route('admin.apartments.edit',$apartment->id)}}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="delete btn btn-danger btn-sm" href="#" data="{{$apartment->id}}">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title"><b>5 Latest Users</b></h3>
                            <a href="{{route('admin.users.index')}}" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone_number}}</td>
                                    <td class="user-actions text-right">
                                        <a class="btn btn-info btn-sm"
                                            href="{{route('admin.users.edit',$user->id)}}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="delete btn btn-danger btn-sm" href="#" data="{{$user->id}}">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')

@endsection