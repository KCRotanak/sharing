@extends('layouts.userapp')
@section('content')
    <div class="ads_browse">
        <div class="loader" style="margin-top: 0px ">
            <div class="loader-content">
                <img src="{{ asset('images/load.gif') }}" alt="Loader" class="loader-loader"  style="margin-top:300px">
            </div>
        </div>
        <div class="ads_text">

            <p style="font-size: 50px">FIND GOOD THESIS</p>
            <p style="font-size: 25px; margin-top: -20px">Browse for informations, ideas to complete your thesis.</p>
            <p style="font-size: 25px; margin-top: -20px">Find any related deatils as you wish.</p>
            
            <a href="/browse">
                <button>Browse more books</button>
            </a>
            
        </div>
        
        <img class="bg_img" src="{{ asset('images/new_back.png') }}" alt="">

    </div>
    <div class="latest_book">
            <p class="category_latest">Latest books</p>
        <div class="latest_card swiper">
            {{-- =swiper --}}
                    <div class="slide-content">
                        <div class="card-wrapper swiper-wrapper">
                            @foreach($book as $book)
                            <div class="card swiper-slide">
                                <div class="image-content">
                                    <div class="card-image">
                                        <img height="100%" width="100%" src="{{ asset('../thumnails/' . $book->cover) }}" alt="">
                                    </div>
                                    <div class="card_detail">
                                        <span>
                                            <p>Title: {{$book->title}}</p>
                                            <p>Author: {{$book->author}}</p>
                                            <p>Department: {{$book->department->name}}</p>
                                            <a href="{{ url('/bookdetail', $book->id) }}"><button>View</button></a>
                                    </span>
                                    </div>
                                </div>                               
                            </div>
                            @endforeach
                        </div>
                    </div>
                   
                
                <div class="swiper-button-next swiper-navBtn"></div>
                <div class="swiper-button-prev swiper-navBtn"></div>
                <div class="swiper-pagination"></div>
        </div>
        
    </div>
    <div class="recommand_book">
        <img src="{{asset('images/3people.png')}}" alt="">
        <div class="suggestion">
            <span>
                <p class="suggestion_title">Any Suggestion?</p>
                <p style="margin-top: -20px">Feel free to send us a message.</p>
                
                <a href="/contact">
                    <button>Contact Us</button>
                </a>
            </span>
        </div>
    </div>
    {{-- Swiper JS --}}
    <script src="js/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".slide-content", {
            slidesPerView: 3,
            spaceBetween: 0,
            slidesPerGroup: 3,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            }
        });
    </script>

@endsection