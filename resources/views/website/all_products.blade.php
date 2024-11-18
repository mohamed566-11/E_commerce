
@extends('layouts.master')

@section('title')
{{__('website_trans.Products')}}
@endsection

@section('content')
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">{{__('website_trans.Products')}}</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i>{{__('website_trans.Home')}} </a></li>
                        <li>{{__('website_trans.Products')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->


    <section class="trending-product section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2> {{__('website_trans.Products')}}</h2>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $product)


                <div class="col-lg-3 col-md-6 col-12">

                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image" style="height: 200px" >
                            <img src="{{asset($route .'/'.$product->image)}}" alt="#">
                            {{-- <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                            </div> --}}
                        </div>
                        <div class="product-info" style="height: 150px">
                            <span class="category">{{$product->category->name}}</span>
                            <h4 class="title">
                                <a href="{{route('get_product_slug',[$product->category->slug,$product->slug])}}">{{$product->name}}</a>
                            </h4>
                            <ul class="review">
                                @if ($product->averageRating() == 5)
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                @elseif ($product->averageRating() == 4)
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                @elseif ($product->averageRating() == 3)
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                @elseif ($product->averageRating() == 2)
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                @elseif ($product->averageRating() == 1)
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                @endif
                                <li><span>{{$product->averageRating()}}</span></li>
                            </ul>                            <div class="price">
                                <span class="float-start">
                                    {{$product->selling_price}}
                                </span>
                                    <span class="float-end">
                                    <s>{{$product->price}}</s>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- End Single Product -->
                </div>
                @endforeach
                {{-- {{ $products->links() }} --}}
            </div>



        </div>
    </section>

@endsection


