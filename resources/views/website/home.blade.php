    @extends('layouts.master')

    @section('title')
    {{__('website_trans.E-Commerce Platform')}}
    @endsection
    @push('style')
    <style>
        .card{
            box-shadow: 7px 7px 15px;
        }
        .owl-carousel .card { overflow: hidden;}
        .owl-carousel .item img{ transition: all .2s ease-in-out; }
        .owl-carousel .item img:hover { transform: scale(1.1);  }


    </style>
    @endpush
    @section('content')
        <!-- Start Hero Area -->
        <section class="hero-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-12 custom-padding-right">
                        <div class="slider-head">
                            <!-- Start Hero Slider -->
                            <div class="hero-slider">
                                <!-- Start Single Slider -->
                                    @foreach ($TopSellingProducts as $product)
                                <div class="single-slider">
                                    <div class="card mb-3" style="height: 500px;">
                                        <div class="row g-0">
                                            <div class="col-md-7">
                                            <img src="{{asset($route_products .'/'.$product->image)}}" style="height: 600px;" class="img-fluid rounded-start" alt="...">
                                            </div>
                                            <div class="col-md-5">
                                            <div class="card-body" style="margin-top: 150px">
                                                <h5 class="card-title">{{$product->name}}</h5>
                                                <p class="card-text">{{$product->meta_description}}</p>
                                                <p class="card-text"><small class="text-body-secondary">{{$product->short_description}}</small></p>
                                                {{-- <h4><span>Price:</span></h4> --}}
                                                <h4>
                                                <h5 >{{__('website_trans.Price')}}:
                                                    {{$product->selling_price}}
                                                </h5>
                                                    <span>
                                                    <s>{{$product->price}}</s>
                                                </span></h4>
                                        <div class="button" style="margin-top: 40px">


                                            <a href="{{route('get_product_slug',[$product->category->slug,$product->slug])}}" class="btn">Shop Now</a>
                                        </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                </div>

                                @endforeach

                                <!-- End Single Slider -->
                                <!-- Start Single Slider -->
                                
                                <!-- End Single Slider -->
                            </div>
                            <!-- End Hero Slider -->
                        </div>
                    </div>

                    <div class="col-lg-4 col-12" style="height: 700px">
                        <h4>{{__('website_trans.TopSellingProduct')}}</h4>
                    <!-- Start Single Product -->
                    <div class="single-product">
                        <div class="product-image" style="height: 260px" >
                            <img src="{{asset($route_products .'/'.$TopSellingProduct->image)}}" alt="#">
                            {{-- <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                            </div> --}}
                        </div>
                        <div class="product-info">
                            <h4 class="title">
                                <p>{{__('website_trans.TopSellingProduct')}}</p>

                            </h4>
                            <h4 class="title">
                                <a href="{{route('get_product_slug',[$TopSellingProduct->category->slug,$TopSellingProduct->slug])}}">{{$TopSellingProduct->name}}</a>
                            </h4>
                            <ul class="review">
                                @if ($TopSellingProduct->averageRating() == 5)
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                @elseif ($TopSellingProduct->averageRating() == 4)
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                @elseif ($TopSellingProduct->averageRating() == 3)
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                @elseif ($TopSellingProduct->averageRating() == 2)
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                @elseif ($TopSellingProduct->averageRating() == 1)
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                @endif
                                <li><span>{{$TopSellingProduct->averageRating()}}</span></li>
                            </ul>
                            <div class="price">
                                <span class="float-start">
                                    {{$TopSellingProduct->selling_price}}
                                </span>
                                    <span class="float-end">
                                    <s>{{$TopSellingProduct->price}}</s>
                                </span>                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </section>
        <!-- End Hero Area -->

        <!-- Start Featured Categories Area -->

    @include('layouts.trend_category');

    @include('layouts.topselling_product');



        <!-- End Features Area -->

        <!-- Start Trending Product Area -->
    @include('layouts.trend_product');
        <!-- End Trending Product Area -->

        <!-- Start Banner Area -->
        
        <!-- End Banner Area -->

        <!-- Start Special Offer -->
        
        <!-- End Special Offer -->

        <!-- Start Home Product List -->
        
        <!-- End Home Product List -->

        <!-- Start Brands Area -->
        <div class="brands">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-md-12 col-12">
                        <h2 class="title">{{__('website_trans.Popular Brands')}}</h2>
                    </div>
                </div>

                <div class="brands-logo-wrapper">

                    <div class="brands-logo-carousel d-flex align-items-center justify-content-between">
                        @foreach ($trend_products as $trend_product)
                        <div class="brand-logo">
                            <img src="{{asset($route_products .'/'.$trend_product->image)}}" alt="#">
                        </div>
                        @endforeach
                    </div>

                </div>

            </div>
        </div>
        <!-- End Brands Area -->

        <!-- Start Blog Section Area -->
        @include('layouts.latest_products');
        <!-- End Blog Section Area -->

        <!-- Start Shipping Info -->

        <!-- End Shipping Info -->

    @endsection

    @push('js')
    <script type="text/javascript">
        //========= Hero Slider
        tns({
            container: '.hero-slider',
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 0,
            items: 1,
            nav: false,
            controls: true,
            controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
        });

        //======== Brand Slider
        tns({
            container: '.brands-logo-carousel',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 15,
            nav: false,
            controls: false,
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 3,
                },
                768: {
                    items: 5,
                },
                992: {
                    items: 6,
                }
            }
        });
    </script>
    {{-- <script>
        const finaleDate = new Date("February 15, 2023 00:00:00").getTime();

        const timer = () => {
            const now = new Date().getTime();
            let diff = finaleDate - now;
            if (diff < 0) {
                document.querySelector('.alert').style.display = 'block';
                document.querySelector('.container').style.display = 'none';
            }

            let days = Math.floor(diff / (1000 * 60 * 60 * 24));
            let hours = Math.floor(diff % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
            let minutes = Math.floor(diff % (1000 * 60 * 60) / (1000 * 60));
            let seconds = Math.floor(diff % (1000 * 60) / 1000);

            days <= 99 ? days = `0${days}` : days;
            days <= 9 ? days = `00${days}` : days;
            hours <= 9 ? hours = `0${hours}` : hours;
            minutes <= 9 ? minutes = `0${minutes}` : minutes;
            seconds <= 9 ? seconds = `0${seconds}` : seconds;

            document.querySelector('#days').textContent = days;
            document.querySelector('#hours').textContent = hours;
            document.querySelector('#minutes').textContent = minutes;
            document.querySelector('#seconds').textContent = seconds;

        }
        timer();
        setInterval(timer, 1000);
    </script> --}}
    <script>
        $('.trend_product').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            rtl:true,
            dots:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:3
                }
            }
        })

        $('.trend_category').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            rtl:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:3
                }
            }
        })
    </script>
    @endpush
