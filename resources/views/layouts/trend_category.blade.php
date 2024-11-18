<div class="py-5">
    <div class="container">
        <h2 class="text-center">{{trans('website_trans.trend_category')}}</h2>

        <div class="owl-carousel trend_category trend_product owl-theme py-5">
            @foreach($featured_categories as $featured_category)
                <div class="item">
                    <a href="{{route('get_category_slug',$featured_category->slug)}}">
                        <div class="card my-5" style="width: 18rem;">
                            <img src="{{asset($route_categorys.'/'.$featured_category->image)}}" class=" card-img-top img-responsive"
                                style="height: 250px; width: 100%;" alt="...">
                            <div class="card-body" style="height: 150px">
                                <h5 class="card-title">{{$featured_category->meta_title}}</h5>
                                <p class="card-text">{{$featured_category->meta_description}}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

    </div>
</div>
