<!-- Start Topbar -->
<div class="topbar">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-4 col-12">
                <div class="top-left">

                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="top-middle">
                    <ul class="useful-links">
                        <li><a href="{{route('home')}}">{{__('website_trans.Home')}}</a></li>
                        <li><a href="{{route('about')}}">{{__('website_trans.About Us')}}</a></li>
                        <li><a href="{{route('contact')}}">{{__('website_trans.Contact Us')}}</a></li>
                    </ul>
                </div>

            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="top-end">
                    @auth

                    <div class="user">
                        <i class="lni lni-user"></i>
                        Hello: {{ Auth::user()->fname ??'' }}
                    </div>
                    @endauth
                    <ul class="user-login">
                        @guest
                        @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('website_trans.Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('website_trans.Register') }}</a>
                            </li>
                        @endif
                        @else
                        <li class="nav-item ">
                            {{-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a> --}}

                            {{-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown"> --}}
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('website_trans.Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            {{-- </div> --}}
                        </li>
                    @endguest
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Topbar -->
<!-- Start Header Middle -->

<!-- End Header Middle -->
<!-- Start Header Bottom -->
<div class="container" style="margin-top: 30px">
    <div class="row align-items-center">
        <div class="col-lg-8 col-md-6 col-12">
            <div class="nav-inner">
                <!-- Start Mega Category Menu -->

                    <div class="col-lg-3 col-md-3 col-5" style="margin-right: 70px">
                        <!-- Start Header Logo -->
                        <a class="navbar-brand" href="{{route('home')}}">
                            <img src="/images/logo/logo.svg" alt="Logo">
                        </a>
                        <!-- End Header Logo -->
                    </div>

                <!-- End Mega Category Menu -->
                <!-- Start Navbar -->
                <nav class="navbar navbar-expand-lg">
                    <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                        <ul id="nav" class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a href="/" class="" aria-label="Toggle navigation">{{__('website_trans.Home')}}</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('get_categories')}}" class="" aria-label="Toggle navigation">{{__('website_trans.Categories')}}</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('getproducts')}}" class="" aria-label="Toggle navigation">{{__('website_trans.Products')}}</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('cart.index')}}" class="" aria-label="Toggle navigation">{{__('website_trans.Cart')}}</a>
                            </li>
                            @if (Auth::check() && Auth::user()->orders->count()>0)

                            <li class="nav-item">
                                <a href="{{route('showmyorders')}}" class="" aria-label="Toggle navigation">{{(__('website_trans.MyOrders'))}}</a>
                            </li>
                            @endif

                            <li class="nav-item">
                                <a href="{{route('contact')}}" aria-label="Toggle navigation">{{__('website_trans.ContactUs')}}</a>
                            </li>
                        </ul>

                    </div> <!-- navbar collapse -->

                </nav>
                <!-- End Navbar -->

            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12">
            <!-- Start Nav Social -->
            <div class="nav-social">
                <h5 class="title">{{__('website_trans.Follow Us')}}:</h5>
                <ul>
                    <li>
                        <a href="https://www.facebook.com"><i class="lni lni-facebook-filled"></i></a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com"><i class="lni lni-instagram"></i></a>
                    </li>
                    <li>
                        <a href="https://www.skype.com/en"><i class="lni lni-skype"></i></a>
                    </li>
                </ul>
            </div>
            <!-- End Nav Social -->
        </div>
    </div>
</div>
<!-- End Header Bottom -->
