@extends('admin.layouts.app')
@section('title','Edit Apartment')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{$apartment->title}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.apartments.index')}}">Apartments</a></li>
                    <li class="breadcrumb-item active">{{$apartment->title}}</li>
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
                        <form method="post" action="{{route('admin.apartments.edit.update', $apartment->id)}}"
                            enctype='multipart/form-data'>
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="inputTitle">Title</label>
                                <input type="text" id="inputTitle" name="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    value="{{old('title', $apartment->title ?? '')}}">
                                @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Address</label>
                                <input type="text" id="inputAddress" name="address"
                                    class="form-control @error('address') is-invalid @enderror"
                                    value="{{old('address', $apartment->address ?? '')}}">
                                @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputDescription">Description</label>
                                <textarea id="inputDescription" name="description"
                                    class="form-control @error('description') is-invalid @enderror"
                                    row="4">{{old('description', $apartment->description ?? '')}}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputPrice">Price</label>
                                <input type="text" id="inputPrice" name="price"
                                    class="form-control @error('price') is-invalid @enderror"
                                    value="{{old('price', $apartment->price ?? '')}}">
                                @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputDeposit">Deposit</label>
                                <input type="text" id="inputDeposit" name="deposit"
                                    class="form-control @error('deposit') is-invalid @enderror"
                                    value="{{old('deposit', $apartment->deposit ?? '')}}">
                                @error('deposit')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputOwnerName">Owner Name</label>
                                <input type="text" id="inputOwnerName" name="owner_name"
                                    class="form-control @error('owner_name') is-invalid @enderror"
                                    value="{{old('owner_name', $apartment->owner_name ?? '')}}">
                                @error('owner_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputOwnerPhoneNumber">Owner Phone Number</label>
                                <input type="text" id="inputOwnerPhoneNumber" name="owner_phone_number"
                                    class="form-control @error('owner_phone_number') is-invalid @enderror"
                                    value="{{old('owner_phone_number', $apartment->owner_phone_number ?? '')}}">
                                @error('owner_phone_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputOwnerEmail">Owner Email</label>
                                <input type="text" id="inputOwnerEmail" name="owner_email"
                                    class="form-control @error('owner_email') is-invalid @enderror"
                                    value="{{old('owner_email', $apartment->owner_email ?? '')}}">
                                @error('owner_email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="images">Images</label>
                                <input type="hidden" name="old_images" value="{{$apartment->images}}">
                                <input type="file" id="images" name="images" style="display: none;" />
                                <input type="button" class="form-control @error('images') is-invalid @enderror btn-primary" value="Choose a picture" 
                                    onclick="document.getElementById('images').click();" style="width:20%;" />
                                @error('images')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="photo-preview mt-3">
                                    <img id="preview-image-before-upload" src="{{asset($apartment->images)}}"
                                        alt="preview image" style="max-height: 500px;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <a href="{{route('admin.apartments.index')}}" class="btn btn-secondary">Cancel</a>
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
@section('js')
<script>
    $(document).ready(function (e) {
        $('#images').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image-before-upload').css('display', 'block');
                $('#preview-image-before-upload').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>
@stop