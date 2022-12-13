<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>THESIS</title>
    <link rel="icon" href="{{ asset('images/Tlogo.png') }}" type="image/jpg" />


    <!-- Fonts -->

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">
    

    <link href="{{ asset('/css/frontcss/home.css') }}" rel="stylesheet">

    <link href="{{ asset('/css/frontcss/auth.css') }}" rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<!-- Navbar start -->
<nav id="navbar" class="">
    <div class="nav-wrapper">
        <!-- Navbar Logo -->
        <div class="logo">
            <a href="/"><img src="{{ asset('images/logo.png') }}" alt=""></a>
        </div>

        {{-- <div class="search">
            <div class="searchBar">
                <input id="searchQueryInput" type="text" name="searchQueryInput" placeholder="Search" value="" />
                <button id="searchQuerySubmit" type="submit" name="searchQuerySubmit" style="margin-top: -30px;"><i class='bx bx-search-alt-2' ></i>
                </button>
            </div>
        </div> --}}
        <!-- Navbar Links -->
        {{-- <ul id="" class="menu">
            <li><a href="/">Home</a></li>

            <li><a href="#browse">Browse</a></li>
        </ul> --}}
    </div>
</nav>
<!-- Navbar end -->

<div class="page-wrapper" style="margin-top: 150px">
    <!--page-content-wrapper-->
    <div class="page-content-wrapper">
        @yield('content')
    </div>
    <!--end page-content-wrapper-->
</div>

</body>
</html>
