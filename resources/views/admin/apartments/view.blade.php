@extends('admin.layouts.app')
@section('title','View Apartment:' . $apartment->name)
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>View Apartment</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">View Apartment {{$apartment->name}}</li>
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
                        <h3 class="card-title">Apartment {{$apartment->name}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div><strong>Title</strong></div>
                            <div>{{$apartment->title}}</div>
                        </div>
                        <div class="form-group">
                            <div><strong>Address</strong></div>
                            <div>{{$apartment->address}}</div>
                        </div>
                        <div class="form-group">
                            <div><strong>Description</strong></div>
                            <div>{{$apartment->description}}</div>
                        </div>
                        <div class="form-group">
                            <div><strong>Price</strong></div>
                            <div>{{$apartment->price}}</div>
                        </div>
                        <div class="form-group">
                            <div><strong>Deposit</strong></div>
                            <div>{{$apartment->deposit}}</div>
                        </div>
                        <div class="form-group">
                            <div><strong>Owner Name</strong></div>
                            <div>{{$apartment->owner_name}}</div>
                        </div>
                        <div class="form-group">
                            <div><strong>Owner Phone Number</strong></div>
                            <div>{{$apartment->owner_phone_number}}</div>
                        </div>
                        <div class="form-group">
                            <div><strong>Owner Email</strong></div>
                            <div>{{$apartment->owner_email}}</div>
                        </div>
                        <div class="form-group">
                            <div><strong>Images</strong></div>
                            <div>
                                <img id="preview-image-before-upload" src="{{asset($apartment->images)}}"
                                    alt="preview image" style="max-height: 500px;">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="{{route('admin.apartments.index')}}" class="btn btn-secondary">Back</a>
                <a href="{{route('admin.apartments.edit', $apartment->id)}}" class="btn btn-primary">Edit Apartment</a>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@stop