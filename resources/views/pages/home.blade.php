@extends('layouts.app')

@section('title')
    NOMADS
@endsection
@section('content')
    <!-- Header -->
    <header class="text-center">
        <h1>Explore the World</h1>
        <p class="mt-3">As Easy As Possible</p>
        <a href="#popular" class="btn btn-get-started px-4 mt-4">Get Started</a>
    </header>
    <!-- Main -->
    <main>
        <!-- Statistic -->
        <div class="container">
            <section class="section-stats row justify-content-center" id="stats">
            <div class="col-3 col-md-2 stats-detail">
                <h2>20k</h2>
                <p>Members</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>12</h2>
                <p>Countries</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>3k</h2>
                <p>Hotels</p>
            </div>
            <div class="col-3 col-md-2 stats-detail">
                <h2>72</h2>
                <p>Partners</p>
            </div>
            </section>
        </div>
        <!-- Popular Heading -->
        <section class="section-popular" id="popular">
            <div class="container">
            <div class="row">
                <div class="col text-center section-popular-heading">
                <h2>Popular Travel</h2>
                <p>Visit the Most Iconic Places</p>
                </div>
            </div>
            </div>
        </section>
        <!-- Popular Content -->
        <section class="section-popular-content" id="popularContent">
            <div class="container">
            <div class="section-popular-travel row justify-content-center">    
                @foreach ($items as $item)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card-travel text-center d-flex flex-column" style="background-image: url('{{$item->galleries->count() ? Storage::url($item->galleries->first()->image) : ''}}')">
                        <div class="travel-country">{{$item->location}}</div>
                        <div class="travel-location">{{$item->title}}</div>
                        <div class="travel-button mt-auto">
                        <a href="{{route('detail', $item->slug)}}" class="btn btn-travel-details px-4">View Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            </div>
        </section>
        <!-- Network -->
        <section class="section-networks" id="networks">
            <div class="container">
            <div class="row">
                <div class="col-md-4">
                <h2>Our Networks</h2>
                <p>
                    Companies that trust us <br />
                    more than just a trip
                </p>
                </div>
                <div class="col-md-8 text-center">
                <img src="frontend/images/Partner pic1x.png" alt="Partners Logo" class="img-partner" />
                </div>
            </div>
            </div>
        </section>
        <!-- Testimonials Heading -->
        <section class="section-testimonial-heading" id="testimonialHeading">
            <div class="container">
            <div class="row">
                <div class="col text-center">
                <h2>They Are Loving Us</h2>
                <p>
                    Moments Were Giving Them the Best<br />
                    Experience
                </p>
                </div>
            </div>
            </div>
        </section>
        <section class="section-testimonial-content" id="testimonialContent">
            <div class="container">
            <div class="section-popular-travel row justify-content-center">
                <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="card card-testimonial text-center">
                    <div class="testimonial-content">
                    <img src="frontend/images/Ellipse 3.png" alt="user" class="mb-4 rounded-circle" />
                    <h3 class="mb-4">John Connor</h3>
                    <p class="testimonial">“Lorem ipsum dolor sit amet, consectetur adipiscing elit ut ali purus sit amet luctus venenatis”</p>
                    </div>
                    <hr />
                    <p class="mt-2 trip-to">Trip to Bali, Indonesia</p>
                </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="card card-testimonial text-center">
                    <div class="testimonial-content">
                    <img src="frontend/images/Ellipse 3-1.png" alt="user" class="mb-4 rounded-circle" />
                    <h3 class="mb-4">Alicia Jane</h3>
                    <p class="testimonial">“Lorem ipsum dolor sit amet, consectetur adipiscing elit ut ali purus sit amet luctus venenatis”</p>
                    </div>
                    <hr />
                    <p class="mt-2 trip-to">Trip to Paris, France</p>
                </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="card card-testimonial text-center">
                    <div class="testimonial-content">
                    <img src="frontend/images/Ellipse 3-2.png" alt="user" class="mb-4 rounded-circle" />
                    <h3 class="mb-4">Ali Mahzial</h3>
                    <p class="testimonial">“Lorem ipsum dolor sit amet, consectetur adipiscing elit ut ali purus sit amet luctus venenatis”</p>
                    </div>
                    <hr />
                    <p class="mt-2 trip-to">Trip to Tokyo, Japan</p>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                <a href="#" class="btn btn-need-help px-4 mt-4 mx-1">I Need Help</a>
                <a href="{{route('register')}}" class="btn btn-get-started px-4 mt-4 mx-1">Get Started</a>
                </div>
            </div>
            </div>
        </section>
    </main>
@endsection