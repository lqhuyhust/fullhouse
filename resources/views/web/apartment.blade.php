@extends('web.layouts.app')

@section('title', 'Fullhouse - House for everyone!')
@section('main_heading', $apartment->title)

@section('css')
<style>
    .close {
        position: absolute;
        right: 10px;
        top: 0px;
        font-size: xx-large;
        font-weight: 900;
    }
</style>
@endsection

@section('button')
<a href="{{route('index')}}" class="btn btn-light">Go To Homepage</a>
@endsection

@section('content')
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
                <div>{{session('success')}}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <p>{{$apartment->description}}</p>
            <img id="preview-image-before-upload" src="{{asset($apartment->images)}}"
                alt="{{$apartment->images}}" style="width: 100%;">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <span class="post-meta">Price: 
                        <strong>{{$apartment->price}} VND</strong>
                    </span>
                </div>
                <div class="col-12 col-lg-6">
                    <span class="post-meta">Owner: 
                        <strong>{{$apartment->owner_name}}</strong>
                    </span>
                </div>
                <div class="col-12 col-lg-6">
                    <span class="post-meta">Deposit: 
                        <strong>{{$apartment->deposit}} VND</strong>
                    </span>
                </div>
                <div class="col-12 col-lg-6">
                    <span class="post-meta">Phone Number: 
                        <strong>{{$apartment->owner_phone_number}}</strong>
                    </span>
                </div>
            </div>
            <a href="{{route('payment', $apartment->id)}}" class="btn btn-success">Deposit Payment</a>
        </div>
    </div>
</div>
@endsection