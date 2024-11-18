
@extends('layouts.master')

@section('title')
{{$product->name}}
@endsection
@push('style')
<meta name="csrf-token" content="{{ csrf_token() }}">

@endpush
@section('content')
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">{{__('website_trans.Product-details')}}</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> {{__('website_trans.Home')}}</a></li>
                        {{-- <li>{{$category->slug}}</li> --}}
                        <li>{{$product->name}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
    <input type="hidden" value="{{$product->qty}}" id="qty">
    <div class="p-5">
        <div class="card mb-3 px-5">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{asset($route_product .'/'.$product->image)}}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="card-header">
                            <h5>
                                {{$product->name}}
                                @if($product->trend == 1)
                                    <span class="float-end badge bg-success">{{trans('website_trans.trending')}}</span>
                                @else
                                    <span class="float-end badge bg-danger">{{trans('website_trans.untrending')}}</span>
                                @endif
                            </h5>

                        </div>
                        <div class="py-4">
                            <s>{{trans('website_trans.price')}} : {{$product->price}}$</s>
                            <span
                                class="float-end">{{trans('website_trans.selling_price')}} : {{$product->selling_price}}$</span>
                        </div>
                        <div class="py-4">
                            <p class="card-text">{{$product->description}}</p>
                            <p class="card-text">
                                @if($product->qty > 0)
                                    <small class="badge bg-success">{{trans('website_trans.available')}}</small>
                                @else
                                    <small class="badge bg-danger">{{trans('website_trans.unavailable')}}</small>
                                @endif
                            </p>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-3">
                                @if($product->qty > 0)
                                    <h4 class="py-4">{{trans('website_trans.quantity')}}</h4>
                                    <div class="input-group mb-3">
                                        <button class="input-group-text btn btn-outline-warning"
                                                onclick="increaseQTY()">+
                                        </button>
                                        <input type="text" class="form-control text-center" id="qty_vlaue" readonly
                                                value="1">
                                        <button class="input-group-text btn btn-outline-warning"
                                                onclick="decreaseQTY()">-
                                        </button>
                                    </div>
                                @endif
                            </div>
                            <div class="col-9">


                                <div class="row">
                                    @if($product->qty > 0)
                                    <div class="col">
                                        <h4 class="py-4">{{trans('website_trans.add_to_cart')}}</h4>
                                        <div class="input-group mb-3">
                                            <button class="btn btn-primary" onclick="addToCart()">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
                                            </button>
                                            <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
                                        </div>
                                    </div>
                                    @endif
                                    <div class="col">
                                    
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>




    <div class="px-5">
        <div class="row">
            <div class="card col-6">
                <div class="card-header">
                    <h4 class="py-4">{{trans('website_trans.Specifications')}}</h4>
                </div>
                <div class="card-body">
                    <h6>{{$product->short_description}}</h6>
                    <hr>
                    <p>{{$product->meta_description}}</p>
                </div>

            </div>
            <div class="col-6">
                <div class="card">

                    <h4 class="py-4 card-header">{{trans('website_trans.keywords')}}</h4>

                    <div class="card-body">
                        @foreach($keywords as $keyword)
                            <span class="badge bg-warning">{{$keyword}}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="item-details section">
        <div class="container">
            <div class="top-area">
                <div class="row align-items-center">

                </div>
            </div>
            <div class="product-details-info">
                <div class="single-block">
                    <div class="row">
                        <div class="col-lg-6 col-12">

                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <div class="single-block give-review">

                            {{-- @auth --}}

                            @if (Auth::check() && $product->canReviewProduct(Auth::user()->id, $product->id))

                            <button type="button" class="btn review-btn" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                {{__('reviews_trans.Add Review')}}
                            </button>

                            @endif


                            {{-- @endauth --}}
                        </div>
                    </div>
                    <div class="col-lg-8 col-12">
                        <div class="single-block">
                            <div class="reviews">
                                <h4 class="title">{{__('website_trans.Latest Reviews')}}</h4>
                                <!-- Start Single Review -->
                                {{-- @dd($product->reviews) --}}
                                @foreach ($product->paginatedReviews(10) as $reviews)

                                <div class="single-review">
                                    <div class="review-info">
                                        <h4>{{$reviews->user->fname}}
                                            <span>{{ $reviews->created_at->format('Y-m-d') }}</span>

                                        </h4>
                                        <ul class="stars">
                                            @if ($reviews->rating == 5)
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            @elseif ($reviews->rating == 4)
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star"></i></li>
                                            @elseif ($reviews->rating == 3)
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star"></i></li>
                                            <li><i class="lni lni-star"></i></li>
                                            @elseif ($reviews->rating == 2)
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star"></i></li>
                                            <li><i class="lni lni-star"></i></li>
                                            <li><i class="lni lni-star"></i></li>
                                            @elseif ($reviews->rating == 1)
                                            <li><i class="lni lni-star-filled"></i></li>
                                            <li><i class="lni lni-star"></i></li>
                                            <li><i class="lni lni-star"></i></li>
                                            <li><i class="lni lni-star"></i></li>
                                            <li><i class="lni lni-star"></i></li>
                                            @endif
                                        </ul>
                                        <p>{{$reviews->review}}</p>
                                    </div>
                                </div>
                                @endforeach
                                <!-- End Single Review -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Item Details -->

    <!-- Review Modal -->
    <div class="modal fade review-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('productReview.store')}}" method="post">
                        @csrf
                    <div class="row">
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                            <div class="form-group">
                                <label for="review-rating">Rating</label>
                                <select class="@error('rating') is-invalid @enderror form-control"  id="review-rating" name="rating">
                                    <option value="5">5 Stars</option>
                                    <option value="4">4 Stars</option>
                                    <option value="3">3 Stars</option>
                                    <option value="2">2 Stars</option>
                                    <option value="1">1 Star</option>
                                </select>
                            </div>
                                @error('rating')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

                    </div>
                    <div class="form-group">
                        <label for="review-message">Review</label>
                        <textarea name="review" class="@error('rating') is-invalid @enderror form-control" id="review-message" rows="8" ></textarea>
                    </div>
                    @error('review')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                    <div class="modal-footer button">
                        <button type="submit" class="btn">Submit Review</button>
                    </div>
                </form>
            </div>

            </div>

        </div>
    </div>
    <!-- End Review Modal -->



@endsection


@push('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>

    var qty = $('#qty').val();

    function increaseQTY() {
        var value = parseInt($('#qty_vlaue').val());

        value = isNaN(value) ? 0 : value;

        if (value < qty) {

            value++

            $('#qty_vlaue').val(value)
        }

    }

    function decreaseQTY() {
        var value = parseInt($('#qty_vlaue').val());

        value = isNaN(value) ? 0 : value;

        if (value > 1) {
            value --;
            $('#qty_vlaue').val(value)
        }

    }



    function addToCart(){
        var product_id = $('#product_id').val();
        var qty = $('#qty_vlaue').val();
        // console.log('product id is : '+ product_id  + ' and qty is : ' + qty);
        $.ajax({
            method : 'POST',
            url : "{{route('product.addToCart')}}",
            data : {
                'product_id': product_id,
                'qty': qty
            },
            success:function (res){
                Swal.fire(res.msg)
            }
        })
    }

</script>

<script type="text/javascript">
    const current = document.getElementById("current");
    const opacity = 0.6;
    const imgs = document.querySelectorAll(".img");
    imgs.forEach(img => {
        img.addEventListener("click", (e) => {
            //reset opacity
            imgs.forEach(img => {
                img.style.opacity = 1;
            });
            current.src = e.target.src;
            //adding class
            //current.classList.add("fade-in");
            //opacity
            e.target.style.opacity = opacity;
        });
    });
</script>
@endpush
