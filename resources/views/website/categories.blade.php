
@extends('layouts.master')

@section('title')
{{__('website_trans.Categories')}}
@endsection

@section('content')
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">{{__('website_trans.Categories')}}</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> {{__('website_trans.Home')}}</a></li>
                        <li>{{__('website_trans.Categories')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->


    <div class="py-5">
        <div class="container">
            <h2 class="text-center">{{trans('website_trans.category')}}</h2>
            <div class="row">
                @foreach($categories as $category)
                    <div class="col-md-4">
                        {{-- {{route('get_category_slug',$category->slug)}} --}}
                        <a href="{{route('get_category_slug',$category->slug)}}">
                            <div class="card my-5" style="width: 18rem;">
                                <img src="{{asset($route .'/'.$category->image)}}" class=" card-img-top img-responsive" style= "height: 250px; width: 100%;" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$category->meta_title}}</h5>
                                    <p class="card-text">{{$category->meta_description}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            </div>


    </div>
@endsection


