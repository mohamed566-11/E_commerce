                <!-- Navbar -->
                <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{route('dashboard')}}" class="nav-link">{{trans('main_header.Home')}}</a>
                    </li>

                    <li>
                        <div class="btn-group mb-1 ">
                            <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if ( Config::get('app.locale')  == 'ar')
                                    {{ LaravelLocalization::getCurrentLocaleName() }}
                                    <img src="{{asset('assets/img/flags/mmmm.jpeg') }}" alt="ar" style="max-width: 20px">
                                @else
                                    {{ LaravelLocalization::getCurrentLocaleName() }}
                                    <img src="{{asset('assets/img/flags/en.png') }}" alt="en" style="max-width: 20px">
                                @endif
                            </button>
                            <div class="dropdown-menu">
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a>
                                @endforeach
                            </div>
                    </li>
                    <li>
                        <div class="btn-group mb-1" >
                            <a class="dropdown-item " href="{{ route('logout') }}" style="color: red"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                {{ __('main_header.Logout') }}
                            </a>
                            <div class="dropdown-menu">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </li>
                    </ul>




                        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">{{ Auth::user()->unreadNotifications->count() }}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">{{ Auth::user()->unreadNotifications->count() }} Notifications</span>

                    @foreach(Auth::user()->unreadNotifications  as $notification)

                    @php
                        $order = \App\Models\Order::find($notification->data['order_id']);
                    @endphp
                    <div class="dropdown-divider"></div>
                    <a href="{{route('orderdetailsfornotification',$notification->data['order_id'])}}" class="dropdown-item">
                        <small>new order => <span>Order_Number:  {{$order->number ?? 'N/A'}}</span></small><br>
                        <i class="fas fa-file mr-2"></i>created_by : {{ $notification->data['user_create_order'] ?? 'N/A' }}
                        <span class="float-right text-muted text-sm">{{ \Carbon\Carbon::parse($notification->created_at)->diffForHumans() }}</span>
                    </a>
                    @endforeach

                    <div class="dropdown-divider"></div>
                    <a href="{{route('markallnotify')}}" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>

            </li>
            <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
            </li>

        </ul>

                </nav>

                <!-- /.navbar -->
