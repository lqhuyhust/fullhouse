@extends('web.layouts.app')

@section('title', 'Fullhouse - House for everyone!')
@section('main_heading', $apartment->title)

@section('content')
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <p>{{$apartment->description}}</p>
            <img id="preview-image-before-upload" src="{{asset($apartment->images)}}"
                alt="{{$apartment->images}}" style="max-width: 100%;">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <span class="post-meta">Price: 
                        <strong>{{$apartment->price}}</strong>
                    </span>
                </div>
                <div class="col-12 col-lg-6">
                    <span class="post-meta">Owner: 
                        <strong>{{$apartment->owner_name}}</strong>
                    </span>
                </div>
                <div class="col-12 col-lg-6">
                    <span class="post-meta">Deposit: 
                        <strong>{{$apartment->deposit}}</strong>
                    </span>
                </div>
                <div class="col-12 col-lg-6">
                    <span class="post-meta">Phone Number: 
                        <strong>{{$apartment->owner_phone_number}}</strong>
                    </span>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection