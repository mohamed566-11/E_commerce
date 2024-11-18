    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/LineIcons.3.0.css')}}" />
    <link rel="stylesheet" href="{{asset('css/tiny-slider.css')}}" />
    <link rel="stylesheet" href="{{asset('css/glightbox.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/main.css')}}" />
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    {{-- @if( Config::get('app.locale') == 'ar')
        <!--RTL Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css"
            integrity="sha384-PJsj/BTMqILvmcej7ulplguok8ag4xFTPryRq8xevL7eBYSmpXKcbNVuy+P0RMgq"
            crossorigin="anonymous">
    @else
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
            crossorigin="anonymous">

    @endif --}}
    <link rel="icon" href="{{ asset('assets/logo/favicon.svg') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{asset('assets/css/owl/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl/owl.theme.default.css')}}">
    @stack('style')
