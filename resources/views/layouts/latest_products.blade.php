<section class="trending-product section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>{{__('website_trans.new Product')}}</h2>
                    <p>{{__('website_trans.new_desc')}}</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($latest_products as $latest_product)


            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Product -->
                <div class="single-product">
                    <div class="product-image" style="height: 200px" >
                        <img src="{{asset($route_products .'/'.$latest_product->image)}}" alt="#">
                        {{-- <div class="button">
                            <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                        </div> --}}
                    </div>
                    <div class="product-info" style="height: 150px">
                        <span class="category">{{$latest_product->category->name}}</span>
                        <h4 class="title">
                            <a href={{route('get_product_slug',[$latest_product->category->slug,$latest_product->slug])}}>{{$latest_product->name}}</a>
                        </h4>
                        <ul class="review">
                            @if ($latest_product->averageRating() == 5)
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            @elseif ($latest_product->averageRating() == 4)
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star"></i></li>
                            @elseif ($latest_product->averageRating() == 3)
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star"></i></li>
                            <li><i class="lni lni-star"></i></li>
                            @elseif ($latest_product->averageRating() == 2)
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star"></i></li>
                            <li><i class="lni lni-star"></i></li>
                            <li><i class="lni lni-star"></i></li>
                            @elseif ($latest_product->averageRating() == 1)
                            <li><i class="lni lni-star-filled"></i></li>
                            <li><i class="lni lni-star"></i></li>
                            <li><i class="lni lni-star"></i></li>
                            <li><i class="lni lni-star"></i></li>
                            <li><i class="lni lni-star"></i></li>
                            @endif
                            <li><span>{{$latest_product->averageRating()}}</span></li>
                        </ul>
                        <div class="price">
                            <span class="float-start">
                                {{$latest_product->selling_price}}
                            </span>
                                <span class="float-end">
                                <s>{{$latest_product->price}}</s>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- End Single Product -->
            </div>
            @endforeach
        </div>
    </div>
</section>
