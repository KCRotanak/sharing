@extends('layouts.userapp')
@section('content')
{{-- <div class="loader" style="margin-top: 0px">
    <div class="loader-content">
        <img src="{{ asset('images/load.gif') }}" alt="Loader" class="loader-loader"  style="margin-top:300px">
    </div>
</div> --}}
    <div class="ads_browse">
        <div class="loader" style="margin-top: 0px">
            <div class="loader-content">
                <img src="{{ asset('images/load.gif') }}" alt="Loader" class="loader-loader"  style="margin-top:300px">
            </div>
        </div>
        <div class="ads_text">
            <p style="font-size: 50px">FIND GOOD THESIS</p>
            <p style="font-size: 25px; margin-top: -20px">Browse your information to complete your thesis.</p>
            
            <a href="/browse">
                <button>Browse more books</button>
            </a>
            
        </div>
            <img src="{{ asset('images/books_below_nav.png') }}" alt="">
    </div>
    <div class="latest_book">
            <p class="category_latest">Latest books</p>
        <div class="latest_card swiper">
            {{-- =swiper --}}
            
                    <div class="slide-content">
                        <div class="card-wrapper swiper-wrapper">
                            <div class="card swiper-slide">
                                <div class="image-content">
                                    <div class="card-image">
                                        <img src="{{ asset('images/cover_card.png') }}" alt="" class="card-img">
                                    </div>
                                    <div class="card_detail">
                                        <span>
                                            <p>Title: Bus Ticket Reservation</p>
                                            <p>Author: Twinkle</p>
                                            <p>Department: GIC</p>
                                        
                                        <button>View</button>
                                    </span>

                                    </div>
                                </div>
                                
                            </div>
                            <div class="card swiper-slide">
                                <div class="image-content">
                                    <div class="card-image">
                                        <img src="{{ asset('images/cover_card.png') }}" alt="" class="card-img">
                                    </div>
                                    <div class="card_detail">
                                        <span>
                                            <p>Title: Bus Ticket Reservation</p>
                                            <p>Author: Twinkle</p>
                                            <p>Department: GIC</p>
                                       
                                        <button>View</button>
                                    </span>

                                    </div>
                                </div>
                                
                            </div>
                            <div class="card swiper-slide">
                                <div class="image-content">
                                    <div class="card-image">
                                        <img src="{{ asset('images/cover_card.png') }}" alt="" class="card-img">
                                    </div>
                                    <div class="card_detail">
                                        <span>
                                            <p>Title: Bus Ticket Reservation</p>
                                            <p>Author: Twinkle</p>
                                            <p>Department: GIC</p>
                                      
                                        <button>View</button>
                                    </span>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="card swiper-slide">
                                <div class="image-content">
                                    <div class="card-image">
                                        <img src="{{ asset('images/cover_card.png') }}" alt="" class="card-img">
                                    </div>
                                    <div class="card_detail">
                                        <span>
                                            <p>Title: Bus Ticket Reservation</p>
                                            <p>Author: Twinkle</p>
                                            <p>Department: GIC</p>
                                       
                                        <button>View</button>
                                    </span>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="card swiper-slide">
                                <div class="image-content">
                                    <div class="card-image">
                                        <img src="{{ asset('images/cover_card.png') }}" alt="" class="card-img">
                                    </div>
                                    <div class="card_detail">
                                        <span>
                                            <p>Title: Bus Ticket Reservation</p>
                                            <p>Author: Twinkle</p>
                                            <p>Department: GIC</p>
                                   
                                        <button>View</button>
                                    </span>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="card swiper-slide">
                                <div class="image-content">
                                    <div class="card-image">
                                        <img src="{{ asset('images/cover_card.png') }}" alt="" class="card-img">
                                    </div>
                                    <div class="card_detail">
                                        <span>
                                            <p>Title: Bus Ticket Reservation</p>
                                            <p>Author: Twinkle</p>
                                            <p>Department: GIC</p>
                                        
                                        <button>View</button>
                                    </span>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="card swiper-slide">
                                <div class="image-content">
                                    <div class="card-image">
                                        <img src="{{ asset('images/cover_card.png') }}" alt="" class="card-img">
                                    </div>
                                    <div class="card_detail">
                                        <span>
                                            <p>Title: Bus Ticket Reservation</p>
                                            <p>Author: Twinkle</p>
                                            <p>Department: GIC</p>
                                        
                                        <button>View</button>
                                    </span>
                                    </div>
                                </div>
                            </div>
                            <div class="card swiper-slide">
                                <div class="image-content">
                                    <div class="card-image">
                                        <img src="{{ asset('images/cover_card.png') }}" alt="" class="card-img">
                                    </div>
                                    <div class="card_detail">
                                        <span>
                                            <p>Title: Bus Ticket Reservation</p>
                                            <p>Author: Twinkle</p>
                                            <p>Department: GIC</p>
                                        
                                        <button>View</button>
                                    </span>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="card swiper-slide">
                                <div class="image-content">
                                    <div class="card-image">
                                        <img src="{{ asset('images/cover_card.png') }}" alt="" class="card-img">
                                    </div>
                                    <div class="card_detail">
                                        <span>
                                            <p>Title: Bus Ticket Reservation</p>
                                            <p>Author: Twinkle</p>
                                            <p>Department: GIC</p>
                                      
                                        <button>View</button>
                                    </span>
                                    </div>
                                </div>
                                
                            </div>
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
