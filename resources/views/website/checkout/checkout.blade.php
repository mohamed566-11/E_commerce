@extends('layouts.master')

@section('title')
{{__('website_trans.checkout')}}
@endsection

@section('content')

    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">{{__('website_trans.checkout')}}</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i>{{__('website_trans.Home')}} </a></li>
                        <li>{{__('website_trans.checkout')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->


    <!--====== Checkout Form Steps Part Start ======-->

    <div class="container">
        <div class="row py-5">
            <div class="col-5">
                <div class="card">
                    <div class="card-title text-center"><h3>{{trans('website_trans.order_details')}}</h3></div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>

                            <tr>
                                <th>#</th>
                                <th>{{trans('website_trans.product')}}</th>
                                <th>{{trans('website_trans.quantity')}}</th>
                                <th>{{__('website_trans.price for qty')}}</th>
                                <th>{{trans('website_trans.selling_price')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i = 1; @endphp
                            @php $total_price = 0; @endphp
                            @foreach($carts as $cart)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$cart->product->name}}</td>
                                    <td>{{$cart->qty}}</td>
                                    <td>{{$cart->product->selling_price}}</td>
                                    <td> @php $product_total = $cart->Product->selling_price *  $cart->qty; @endphp
                                        {{$product_total}}</td>
                                </tr>
                                @php $total_price += $cart->Product->selling_price * $cart->qty ; @endphp
                            @endforeach
                            </tbody>
                        </table>
                        <div class="col-8">
                            <h5 id="total">{{__('website_trans.Total Price')}} : {{$total_price}}</h5>
                        </div>
                    </div>
                    {{-- <button type="submit">Place Order</button> --}}
                </div>
            </div>
            <div class="col-7">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="card">
                    <div class="card-title text-center"><h3>{{trans('website_trans.customer_details')}}</h3></div>
                    <div class="card-body">
                        <form action="{{route('createorder')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="firstname" class="form-label">{{trans('website_trans.first_name')}}</label>
                                    <input type="text" class="form-control" value="{{$user->fname}}" name="fname"   id="firstname" placeholder="{{trans('website_trans.first_name')}}">
                                </div>
                                <div class="col">
                                    <label for="lastname" class="form-label">{{trans('website_trans.last_name')}}</label>
                                    <input type="text" value="{{$user->lname}}" class="form-control" name="lname"  id="lastname" placeholder="{{trans('website_trans.last_name')}}">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="email" class="form-label">{{trans('website_trans.email')}}</label>
                                    <input type="email" value="{{$user->email}}" class="form-control" name="email"  id="email" placeholder="{{trans('website_trans.email')}}">
                                </div>
                                <div class="col">
                                    <label for="phone" class="form-label">{{trans('website_trans.phone')}}</label>
                                    <input type="phone" class="form-control" value="{{$user->phone}}" name="phone"  id="phone" placeholder="{{trans('website_trans.phone')}}">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="address1" class="form-label">{{trans('website_trans.address_1')}}</label>
                                    <input type="text" class="form-control" value="{{$user->address1}}" name="address1"  id="address1" placeholder="{{trans('website_trans.address_1')}}">
                                </div>
                                <div class="col">
                                    <label for="address2" class="form-label">{{trans('website_trans.address_2')}}</label>
                                    <input type="text" class="form-control" value="{{$user->address2}}" name="address2"  id="address2" placeholder="{{trans('website_trans.address_2')}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="city" class="form-label">{{trans('website_trans.city')}}</label>
                                    <input type="text" class="form-control" value="{{$user->city}}" name="city"  id="city" placeholder="{{trans('website_trans.city')}}">
                                </div>
                                <div class="col">
                                    <label for="country" class="form-label">{{trans('website_trans.country')}}</label>
                                    <input type="text" class="form-control" value="{{$user->country}}" name="country"  id="country" placeholder="{{trans('website_trans.country')}}">
                                </div>
                                <div class="col">
                                    <label for="pincode" class="form-label">{{trans('website_trans.pincode')}}</label>
                                    <input type="text" class="form-control" value="{{$user->pincode}}" name="pincode"  id="pincode" placeholder="{{trans('website_trans.pincode')}}">
                                </div>
                                <input type="hidden" name="total_price" value="{{$total_price}}">
                            </div>
                            <div class="col-8" style="margin-top: 20px; margin-left:250px">
                                <button type="submit" class="btn btn-success">{{__('website_trans.place_order')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!--====== Checkout Form Steps Part Ends ======-->
@endsection





