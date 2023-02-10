@extends('web.layouts.app')

@section('title', 'Fullhouse - House for everyone!')
@section('main_heading', 'Fullhouse')
@section('sub_heading', 'House for everyone!')

@section('content')
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">.
            @foreach ($apartments as $apartment)
            <div class="post-preview">
                <a href="{{route('apartment', $apartment->id)}}">
                    <h2 class="post-title">{{$apartment->title}}</h2>
                    <img id="preview-image-before-upload" src="{{asset($apartment->images)}}"
                        alt="{{$apartment->images}}" style="max-width: 100%;">
                    <h3 class="post-subtitle">{{$apartment->description}}</h3>
                </a>
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
            <!-- Divider-->
            <hr class="my-4" />
            @endforeach
            <!-- Pager-->
            <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older
                    Posts →</a></div>
        </div>
    </div>
</div>
@endsection