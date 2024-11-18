
    @extends('dashboard.master')


    @section('title')
    dashboard
    @endsection

    @section('css')

    @endsection
    @section('content')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{trans('main_sidbar_translate.dashboard')}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">{{__('main_sidbar_translate.Home')}}</a></li>
                    <li class="breadcrumb-item active">{{trans('main_sidbar_translate.dashboard')}}</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div>


            <div class="row">
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{\App\Models\Order::all()->count()}}</h3>

                    <p>{{trans('dashboard.Orders')}}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{route('orders.index')}}" class="small-box-footer">{{trans('dashboard.More info')}} <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{\App\Models\User::where('is_admin','==',0)->count()}}</h3>

                    <p>{{trans('dashboard.users')}}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>

                </div>
                <a href="{{route('users.index')}}" class="small-box-footer">{{trans('dashboard.More info')}} <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{\App\Models\User::where('is_admin','=',1)->count()}}</h3>

                    <p>{{trans('dashboard.admins')}}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>

                </div>
                <a href="{{route('admins')}}" class="small-box-footer">{{trans('dashboard.More info')}} <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{\App\Models\User::where('is_admin','=',2)->count()}}</h3>

                    <p>{{trans('dashboard.deliveries')}}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>

                </div>
                <a href="{{route('deliveries')}}" class="small-box-footer">{{trans('dashboard.More info')}} <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{\App\Models\Category::all()->count()}}</h3>

                    <p>{{trans('dashboard.categories')}}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{route('categories.index')}}" class="small-box-footer">{{trans('dashboard.More info')}} <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{\App\Models\Product::all()->count()}}</h3>
                    <p>{{trans('dashboard.products')}}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{route('products.index')}}" class="small-box-footer">{{trans('dashboard.More info')}} <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{\App\Models\product_review::all()->count()}}</h3>

                    <p>{{trans('dashboard.reviews_products')}}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{route('reviews_product.index')}}" class="small-box-footer">{{trans('dashboard.More info')}} <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{\App\Models\contact::all()->count()}}</h3>

                    <p>{{trans('dashboard.contact')}}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{route('contact.index')}}" class="small-box-footer">{{trans('dashboard.More info')}} <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            </div>





    @php
    // echo 'Current PHP version: ' . phpversion();
    @endphp

    @endsection

    @section('script')

    @endsection
