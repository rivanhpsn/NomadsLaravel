@extends('layouts.checkout')

@section('title','Checkout')

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
                    <li class="breadcrumb-item">Details</li>
                    <li class="breadcrumb-item active">Checkout</li>
                    </ol>
                </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 pl-lg-8">
                <div class="card card-details">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h1>Who’s Going?</h1>
                    <p>Trip to {{$item->travel_package->title}}, {{$item->travel_package->location}}</p>
                    <div class="attendee">
                    <table class="table table-responsive-sm text-center">
                        <thead class="border-top">
                        <tr>
                            <td>Picture</td>
                            <td>Name</td>
                            <td>Nationality</td>
                            <td>VISA</td>
                            <td>Passport</td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        
                        @forelse ($item->details as $detail)
                            <tr>
                                <td>
                                <img src="https://ui-avatars.com/api/?name={{$detail->username}}" height="60" class="rounded-circle"/>
                                </td>
                                <td class="align-middle">{{$detail->username}}</td>
                                <td class="align-middle">{{$detail->nationality}}</td>
                                <td class="align-middle">{{$detail->is_visa ? '30 Days' : 'N/A'}}</td>
                                <td class="align-middle">{{\Carbon\Carbon::createFromDate($detail->doe_passport) > \Carbon\Carbon::now() ? 'Active' : 'Inactive'}}</td>
                                <td class="align-middle">
                                    <a href="{{route('checkout-remove', $detail->id)}}">
                                        <img src="{{url('frontend/images/Cross button.png')}}" height="25" width="25" />
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">
                                    No Visitor
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    </div>
                    <div class="member mt-3">
                    <h2>Add Member</h2>
                    <form class="row g-3" method="post" action="{{route('checkout-create', $item->id)}}">
                        @csrf
                        <div class="col-auto">
                            <label for="username" class="visually-hidden">Name</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Username" />
                        </div>
                        <div class="col-auto">
                            <label for="nationality" class="visually-hidden">Nationality</label>
                            <input type="text" name="nationality" class="form-control" style="width:50px" id="nationality" required placeholder="Nationality" />
                        </div>
                        <div class="col-auto">
                            <label for="is_visa" class="visually-hidden">Visa</label>
                            <select name="is_visa" id="is_visa" required class="form-select">
                                <option value="VISA" selected>VISA</option>
                                <option value="1">30 Days</option>
                                <option value="0">N/A</option>
                            </select>
                        </div>
                        <div class="col-auto">
                            <label for="doe_passport" class="visually-hidden">DOE Passport</label>
                            <input type="text" class="form-control datepicker" name="doe_passport" id="doe_passport" placeholder="DOE Passport" />
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-add-now">Add Now</button>
                        </div>
                    </form>
                    <h3 class="mt-mb-8">Note</h3>
                    <p class="disclaimer mb-0">You are only able to invite member that has registered Nomads</p>
                    </div>
                </div>
                </div>
                <div class="col-lg-4">
                <div class="card card-details card-right">
                    <h2>Checkout Informations</h2>
                    <table class="trip-informations">
                    <tr>
                        <th width="50%">Members</th>
                        <td width="50%" class="text-end">{{$item->details->count()}}person</td>
                    </tr>
                    <tr>
                        <th width="50%">Additional Visa</th>
                        <td width="50%" class="text-end">$ {{$item->additional_visa}},00</td>
                    </tr>
                    <tr>
                        <th width="50%">Trip Price</th>
                        <td width="50%" class="text-end">${{$item->travel_package->price}}.00/ Person</td>
                    </tr>
                    <tr>
                        <th width="50%">Sub Total</th>
                        <td width="50%" class="text-end">$ {{$item->transaction_total}},00</td>
                    </tr>
                    <tr>
                        <th width="50%">Total (+Unique Code)</th>
                        <td width="50%" class="text-end text-total">
                        <span class="text-blue">$ 279,</span>
                        <span class="text-orange">{{mt_rand(0,99)}}</span>
                        </td>
                    </tr>
                    </table>
                    <hr />
                    <h2>Payment Instruction</h2>
                    <p class="payment-instruction">Please complete the payment before you continue the trip</p>
                    <div class="bank">
                    <div class="bank-item pb-3">
                        <img src="{{url('frontend/images/pay icon.png')}}" alt="" class="bank-image" />
                        <div class="description">
                        <h3>PT Nomads ID</h3>
                        <p>
                            Bank Central Asia<br />
                            0812 2929 2929
                        </p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="bank-item pb-3">
                        <img src="{{url('frontend/images/pay icon.png')}}" alt="" class="bank-image" />
                        <div class="description">
                        <h3>PT Nomads ID</h3>
                        <p>
                            Bank Mandiri<br />
                            1111 1112 1113
                        </p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    </div>
                </div>
                <div class="join-container">
                    <a href="{{route('checkout-success', $item->id)}}" class="btn btn-join-now mt-2 py-2 w-100"> I Have Made Payment </a>
                </div>
                <div class="cancel-container">
                    <a href="{{route('detail', $item->travel_package->slug)}}" class="btn text-muted mt-2 py-2 w-100">Cancel Booking</a>
                </div>
                </div>
            </div>
            </div>
        </section>
    </main>
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="{{url('frontend/libraries/combined/css/gijgo.min.css')}}" />
@endpush

@push('addon-script')
    <script src="{{url('frontend/libraries/combined/js/gijgo.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $(".datepicker").datepicker({
                format: 'yyyy-mm-dd',
                uiLibrary: "bootstrap4",
                icons: {
                rightIcon: "<img src='{{url('frontend/images/Polygon 2.png')}}'/>",
                },
            });
        });
    </script>
@endpush