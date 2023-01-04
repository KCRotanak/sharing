<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>THESIS</title>
    <!--favicon-->
    <link rel="icon" href="{{ asset('images/Tlogo.png') }}" type="image/jpg" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />

    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <link href="{{ asset('/css/frontcss/home.css') }}" rel="stylesheet">

    <link href="{{ asset('/css/frontcss/contact.css') }}" rel="stylesheet">

    <link href="{{ asset('/css/frontcss/browse.css') }}" rel="stylesheet">

    <link href="{{ asset('/css/frontcss/bookdetail.css') }}" rel="stylesheet">

    {{-- swiper css --}}
    <link rel="stylesheet" href="{{ asset('/css/frontcss/swiper-bundle.min.css') }} ">
    

</head>

<body>
    {{-- <div class="loader" style="margin-top: 0px">
        <div class="loader-content">
            <img src="{{ asset('images/load.gif') }}" alt="Loader" class="loader-loader"  style="margin-top:300px">
        </div>
    </div> --}}
     <!-- Navbar start -->
     <nav id="navbar" class="">
        <div class="nav-wrapper">
            <!-- Navbar Logo -->
            <div class="logo">
                <!-- Logo Placeholder for Inlustration -->
                <a href="/"><img src="{{ asset('images/logo.png') }}" alt=""></a>
            </div>
            
            <ul id="" class="menu">
                @php
                    $currentRouteName = request()
                        ->route()
                        ->getName();
                @endphp

                <li><a href="{{ asset('/') }}" class="{{ $currentRouteName === 'home' ? 'active' : '' }} six">Home</a></li>
                <li><a href="{{ asset('/browse') }}" class="{{ $currentRouteName === 'browse' ? 'active' : '' }} one">Browse</a></li>
                <li><a href="{{ asset('/contact') }}"  class="{{ $currentRouteName === 'contactus.create' ? 'active' : '' }} one">Contact</a></li>
                <li>
                    <div class="search-box">
                        <button class="btn-search"><i class='bx bx-search'></i></button>
                        <input type="text" class="input-search" placeholder="Type to Search...">
                      </div>
                </li>
            </ul>

            <!-- Navbar Links -->

        </div>
    </nav>
    <!-- Navbar end -->

    <div class="page-wrapper">
            @yield('content')
    </div>

    <!-- footer start -->
    <div class="mt-0 pt-5 pb-5 footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-xs-12 about-company">
                    <h2 style="font-size: 20px">THESIS</h2>
                    <p class="pr-5 text-white-50" style="font-size: 14px">A website where you can research for information, download thesis.</p>
                    <p class="pr-5 text-white-50" style="font-size: 14px">Complete your thesis with us.</p>
                    <p><a href="#"><i class='bx bxl-facebook-circle'
                                style='color:#ffffff; font-size:30px'></i></a>
                        <a href="#"><i class='bx bxl-instagram' style='color:#fff; font-size:30px'></i></a>
                        <a href="#"><i class='bx bxl-telegram' style='color:#fff; font-size:30px'></i></a>
                        <a href="#"><i class='bx bx-envelope' style='color:#fff; font-size:30px'></i></a>
                    </p>
                </div>

                <div class="col-lg-4 col-xs-12 location">
                    <h4 class="mt-lg-0 mt-sm-4" style="font-size: 20px">Location</h4>
                    <p class="mb-0" style="font-size: 14px"><i class='bx bx-map'></i>#123, St 123, Toul Tompong, Phnom Penh</p>
                    <br />
                    <p class="mb-0" style="font-size: 14px"><i class='bx bxs-phone-call'></i>(+855) 12-123-456</p>
                    <br />
                    <p style="font-size: 14px"><i class='bx bx-envelope'></i>thesis@gmail.com</p>
                </div>

                <div class="col-lg-3 col-xs-12 links">
                    <h4 class="mt-lg-0 mt-sm-3" style="font-size: 20px">Links</h4>
                    <ul class="m-0 p-0">
                        <li><a href="/">Home</a></li>
                        <li><a href="/browse">Browse</a></li>
                        <li><a href="/contact">Contact Us</a></li>
                        <li><a href="/#">Privacy & Policy</a></li>
                        <li><a href="/admin">Admin</a></li>
                    </ul>
                    
                </div>

            </div>
            <div class="row mt-5">
                <div class="col copyright">
                    <p class=""><small class="text-white-50">© 2022. All Rights Reserved.</small></p>
                </div>
            </div>
        </div>
    </div>
    <!-- footer end -->

    <script>
        $(document).ready(function() {
            // show the alert
            $(".alert").fadeTo(2000, 500).slideUp(500, function() {
                $(".alert").alert('close');
            });
        });
    </script>

    <script>
        datePickerId.min = new Date().toISOString().split("T")[0];
    </script>

    <script>
        //Get the button
        let mybutton = document.getElementById("btn-back-to-top");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction();
        };

        function scrollFunction() {
            if (
                document.body.scrollTop > 20 ||
                document.documentElement.scrollTop > 20
            ) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }
        
        // When the user clicks on the button, scroll to the top of the document
        mybutton.addEventListener("click", backToTop);

        function backToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>

    {{-- nav bar active--}}
    <script>
        $(document).ready(function() {

            $(".one").click(function() {
                $(this).addClass("active").siblings().removeClass("active");
            });
        });
    </script>

<script>
    window.onload = function() {
        setTimeout(function() {
            var loader = document.getElementsByClassName("loader")[0];
            loader.className = "loader fadeout";
            setTimeout(function() {
                loader.style.display = "none"
            }, 1000)
        }, 500)
    }
</script>
</body>
