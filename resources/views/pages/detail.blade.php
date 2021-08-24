@extends('layouts.app')

@section('title','Detail Travel')
@section('content')
<!-- Main -->
<main>
    <section class="section-details-header"></section>
    <section class="section-details-content">
    <div class="container">
        <div class="row">
        <div class="col ml-3">
            <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Paket Travel</li>
                <li class="breadcrumb-item active">Details</li>
            </ol>
            </nav>
        </div>
        </div>
        <div class="row">
        <div class="col-lg-8 pl-lg-8">
            <div class="card card-details">
            <h1>{{$item->title}}</h1>
            <p>{{$item->location}}</p>
            @if ($item->galleries->count())
                <div class="gallery">
                    <div class="xzoom-container">
                    <img src="{{Storage::url($item->galleries->first()->image)}}" alt="" class="xzoom" id="xzoom-default" xoriginal="{{Storage::url($item->galleries->first()->image)}}" />
                    </div>
                    <div class="xzoom-thumbs">
                        @foreach ($item->galleries as $gallery)
                        <a href="{{Storage::url($gallery->image)}}">
                            <img src="{{Storage::url($gallery->image)}}" alt="" class="xzoom-gallery" width="128" xpreview="{{Storage::url($gallery->image)}}" />
                        </a>
                        @endforeach
                    </div>
                </div>
            @endif
            <h2>Tentang Wisata</h2>
            <p>
                {!! $item->about !!}
            </p>
            <div class="features row">
                <div class="col-md-4">
                <img src="{{url('frontend/images/Icon.png')}}" alt="" class="features-image" />
                <div class="description">
                    <h3>Featured Event</h3>
                    <p>{{$item->featured_event}}</p>
                </div>
                </div>
                <div class="col-md-4 border-left">
                <img src="{{url('frontend/images/Icon-1.png')}}" alt="" class="features-image" />
                <div class="description">
                    <h3>Language</h3>
                    <p>{{$item->language}}</p>
                </div>
                </div>
                <div class="col-md-4 border-left">
                <img src="{{url('frontend/images/Icon-2.png')}}" alt="" class="features-image" />
                <div class="description">
                    <h3>Foods</h3>
                    <p>{{$item->foods}}</p>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-details card-right">
            <h2>The Departing Members</h2>
            <div class="members my-2">
                <img src="{{url('frontend/images/Ellipse 4.png')}}" alt="" class="member-image mr-1" />
                <img src="{{url('frontend/images/Ellipse 5.png')}}" alt="" class="member-image mr-1" />
                <img src="{{url('frontend/images/Ellipse 6.png')}}" alt="" class="member-image mr-1" />
                <img src="{{url('frontend/images/Ellipse 7.png')}}" alt="" class="member-image mr-1" />
                <img src="{{url('frontend/images/Ellipse 8.png')}}" alt="" class="member-image mr-1" />
                <img src="{{url('frontend/images/+9.png')}}" alt="" class="member-image mr-1" />
            </div>
            <hr />
            <h2>Trip Information</h2>
            <table class="trip-informations">
                <tr>
                <th width="50%">Date of Departure</th>
                <td width="50%" class="text-end">{{\Carbon\Carbon::create($item->date_of_departure)->format('F n, Y')}}</td>
                </tr>
                <tr>
                <th width="50%">Duration</th>
                <td width="50%" class="text-end">{{$item->duration}}</td>
                </tr>
                <tr>
                <th width="50%">Type</th>
                <td width="50%" class="text-end">{{$item->type}}</td>
                </tr>
                <tr>
                <th width="50%">Price</th>
                <td width="50%" class="text-end">${{$item->price}}.00 / Person</td>
                </tr>
            </table>
            </div>
            <div class="join-container">
                @auth
                    <form action="{{route('checkout_process' , $item->id)}}" method="post">
                        @csrf
                        <button class="btn btn-block btn-join-now mt-3 py-2 w-100" type="submit">Join Now</button>
                    </form>    
                @endauth
                @guest
                    <a href="{{route('login')}}" class="btn btn-join-now mt-2 py-2 w-100"> Login or Register to Join </a>
                @endguest
            </div>
        </div>
        </div>
    </div>
    </section>
</main>
@endsection

@push('prepend-style')
<link rel="stylesheet" href="/frontend/libraries/xzoom/xzoom.css" />
@endpush
@push('addon-script')
<script src="/frontend/libraries/xzoom/xzoom.min.js"></script>
<script>
$(document).ready(function () {
    $(".xzoom, .xzoom-gallery").xzoom({
    zoomwidth: 500,
    title: false,
    tint: "#333",
    xoffset: 15,
    });
});
</script>
@endpush