
@extends('layouts.master')

@section('title')
{{__('website_trans.Contact Us')}}
@endsection

@section('content')
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">{{__('website_trans.Contact Us')}}</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i>{{__('website_trans.Home')}} </a></li>
                        <li>{{__('website_trans.Contact Us')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Contact Area -->
    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="contact-head">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>{{__('website_trans.Contact Us')}}</h2>
                            
                        </div>
                    </div>
                </div>
                <div class="contact-info">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-12">
                            <div class="single-info-head">
                                <!-- Start Single Info -->
                                <div class="single-info">
                                    <i class="lni lni-map"></i>
                                    <h3>{{__('website_trans.Address')}}</h3>
                                    <ul>
                                        <li>bani-suif</li>
                                    </ul>
                                </div>
                                <!-- End Single Info -->
                                <!-- Start Single Info -->
                                <div class="single-info">
                                    <i class="lni lni-phone"></i>
                                    <h3>{{__('website_trans.Call us on')}}</h3>
                                    <ul>
                                        <li><a href="tel:+201113604940">+201113604940 (Toll free)</a></li>
                                    </ul>
                                </div>
                                <!-- End Single Info -->
                                <!-- Start Single Info -->
                                
                                <!-- End Single Info -->
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 col-12">
                            <div class="contact-form-head">
                                <div class="form-main">
                                    <form class="form" method="post" action="{{route('contact.store')}}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <input name="name" type="text" placeholder="{{(__('website_trans.Your Name'))}}"
                                                        required="required" class="@error('name') is-invalid @enderror">
                                                </div>
                                                @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <input name="sub" type="text" placeholder="{{(__('website_trans.Your Subject'))}}"
                                                        required="required" class="@error('sub') is-invalid @enderror">
                                                </div>
                                                @error('sub')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <input name="email" type="email" placeholder="{{(__('website_trans.Your Email'))}}"
                                                        required="required" class="@error('email') is-invalid @enderror">
                                                </div>
                                                @error('email')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <input name="phone" type="text" placeholder="{{(__('website_trans.Your Phone'))}}"
                                                        required="required" class="@error('phone') is-invalid @enderror">
                                                </div>
                                                @error('phone')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group message">
                                                    <textarea name="msg" placeholder="{{__('website_trans.Your Message')}}" required class="@error('msg') is-invalid @enderror"></textarea>
                                                </div>
                                                @error('msg')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group button">
                                                    <button type="submit" class="btn ">{{__('website_trans.Submit Message')}}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Contact Area -->
@endsection


