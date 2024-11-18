<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
    <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">E_commerce</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block">{{Auth::user()->fname}}</a>
        </div>
    </div>

    {{-- <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
            <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
            </button>
        </div>
        </div>
    </div> --}}

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
            <a href="{{route('dashboard')}}" class="nav-link {{$route == 'dashboard' ? 'active' : ''}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                {{trans('main_sidbar_translate.dashboard')}}
                <i class="right fas fa-angle-left"></i>
            </p>
            </a>
            <ul class="nav nav-treeview">
                @if (Auth::user()->is_admin == 1)


                <li class="nav-item menu-open">
                    <a href="{{route('dashboard')}}" class="nav-link {{$route == 'dashboard' ? 'active' : ''}}">
                    <p>
                        {{trans('main_sidbar_translate.dashboard')}}
                    </p>
                    </a>
                </li>
            <li class="nav-item">
                <a href="{{route('categories.index')}}" class="nav-link {{$route == 'categories' ? 'active' : ''}}">
                {{-- <i class="far fa-circle nav-icon"></i> --}}
                <p>{{trans('main_sidbar_translate.categories')}}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('products.index')}}" class="nav-link {{$route == 'products' ? 'active' : ''}} ">
                {{-- <i class="far fa-circle nav-icon"></i> --}}
                <p>{{trans('main_sidbar_translate.products')}}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('orders.index')}}" class="nav-link {{$route == 'orders' ? 'active' : ''}}">
                {{-- <i class="far fa-circle nav-icon"></i> --}}
                <p>{{trans('main_sidbar_translate.orders')}}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('users.index')}}" class="nav-link {{$route == 'users' ? 'active' : ''}}">
                {{-- <i class="far fa-circle nav-icon"></i> --}}
                <p>{{trans('main_sidbar_translate.users')}}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admins')}}" class="nav-link {{$route == 'admins' ? 'active' : ''}}">
                {{-- <i class="far fa-circle nav-icon"></i> --}}
                <p>{{trans('main_sidbar_translate.admins')}}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('deliveries')}}" class="nav-link {{$route == 'deliveries' ? 'active' : ''}}">
                {{-- <i class="far fa-circle nav-icon"></i> --}}
                <p>{{trans('main_sidbar_translate.deliveries')}}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('reviews_product.index')}}" class="nav-link {{$route == 'reviews' ? 'active' : ''}}">
                {{-- <i class="far fa-circle nav-icon"></i> --}}
                <p>{{trans('main_sidbar_translate.reviews')}}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('contact.index')}}" class="nav-link {{$route == 'contact' ? 'active' : ''}}">
                {{-- <i class="far fa-circle nav-icon"></i> --}}
                <p>{{trans('contact.contacts')}}</p>
                </a>
            </li>
            @endif
            @if (Auth::user()->is_admin == 2)

            <li class="nav-item">
                <a href="{{route('dashboard_delivery')}}" class="nav-link {{$route == 'orderdelivery' ? 'active' : ''}}">
                {{-- <i class="far fa-circle nav-icon"></i> --}}
                <p>{{__(('main_sidbar_translate.SearchOrder'))}}</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('delivery_orders')}}" class="nav-link {{$route == 'delivery_orders' ? 'active' : ''}}">
                {{-- <i class="far fa-circle nav-icon"></i> --}}
                <p>{{__('main_sidbar_translate.DeliveryOrders')}}</p>
                </a>
            </li>
            @endif
            </ul>
        </li>


        </ul>
    </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
