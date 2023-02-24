@extends('web.layouts.app')

@section('title', 'Fullhouse - House for everyone!')
@section('home_heading', 'Fullhouse')
@section('sub_heading', 'House for everyone!')

@section('button')
<button class="btn btn-primary" id="search-btn">Advanced Search Box</button>
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('index')}}" method="get">
                <div class="modal-header btn-primary">
                    <h5 class="modal-title" id="searchModalLabel">Advanced Search Box</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mt-3 text-start">
                        <h5 class="text-secondary fw-bolder">Keyword</h5>
                        <input class="form-control" id="keyword" name="keyword" type="text" placeholder="Keyword">
                    </div>
                    <div class="form-group mt-3 text-start">
                        <h5 class="text-secondary fw-bolder">Price</h5>
                        <select name="price" id="price" class="form-control">
                            <option value="0">Choose price range</option>
                            <option value="1">< 5.000.000 VND</option>
                            <option value="2">5.000.000 - 10.000.000 VND</option>
                            <option value="3">10.000.000 - 20.000.000 VND</option>
                            <option value="4">> 20.000.000 VND</option>
                        </select>
                    </div>
                    <div class="form-group mt-3 text-start">
                        <h5 class="text-secondary fw-bolder">Area</h5>
                        <select name="area" id="area" class="form-control">
                            <option value="0">Choose area range</option>
                            <option value="1">< 30 m2</option>
                            <option value="2">30 - 50 m2</option>
                            <option value="3">50 - 100 m2</option>
                            <option value="4">> 100 m2</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="app">
    <mainapp></mainapp>
</div>
@endsection

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
                        alt="{{$apartment->images}}" style="width: 100%;">
                    <h3 class="post-subtitle">{{$apartment->description}}</h3>
                </a>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <span class="post-meta">Address: 
                            <strong>{{$apartment->address}}</strong>
                        </span>
                    </div>
                    <div class="col-12 col-lg-6">
                        <span class="post-meta">Area: 
                            <strong>{{$apartment->area}} m2</strong>
                        </span>
                    </div>
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
            </div>
            <!-- Divider-->
            <hr class="my-4" />
            @endforeach
            <!-- Pager-->
            <div class="d-flex justify-content-end mb-4">
                {{$apartments->links('vendor.pagination.bootstrap-4')}}
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    $('#search-btn').click(function() {
        var searchModal = new bootstrap.Modal($('#searchModal'), {
            keyboard: false
        });
        searchModal.show();
    });
</script>
@endsection