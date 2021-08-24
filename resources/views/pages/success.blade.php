@extends('layouts.success')

@section('title','Checkout Success')

@section('content')
    <!-- Main -->
<main>
    <div class="section-success d-flex align-items-center">
        <div class="col text-center">
        <img src="{{url('frontend/images/Payment Succes logo.png')}}" alt="" />
        <h1>Payment Success!</h1>
        <p>
            We’ve sent you email for the <br />
            transaction detail
        </p>
        <a href="{{url('/')}}" class="btn btn-home-page mt-3 px-5">Home Page</a>
        </div>
    </div>
</main>
@endsection

