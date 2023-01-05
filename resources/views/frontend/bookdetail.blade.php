@extends('layouts.userapp')
@section('content')
<div class="loader" style="margin-top: 0px">
    <div class="loader-content">
        <img src="{{ asset('images/load.gif') }}" alt="Loader" class="loader-loader"  style="margin-top:300px">
    </div>
</div>
<div class="detail"> 
    <div class="bookdownload">
        
        <img src="{{asset ('images/cover_card.png')}}" alt="">
        <button>Download&nbsp;<i class='bx bxs-download' ></i></button>
    </div>
    <div class="bookdetail">
        <span style="width: 950px">
            <h3>The Flactuation</h3>
            <p style="text-decoration: underline; font-weight: bold">Book Details</p>
            <b>Author:</b>
            <p>Donald Remphis</p>
            <b>Department:</b>
            <p>Department of Information and Communication Engineering</p>
            <b>Company:</b>
            <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate 
                the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may
                used as a placeholder before final copy is available.</p>
        </span>
        <span class="bookdetail_right">
            <b>Book ID: </b><b style="font-weight: normal">Hi</b><br><br>
            <b>Year:</b>
            <p>2022</p>
            <b>Lecturer:</b>
            <p>Mr. SOK Kimheng</p>
            <b>Supervisor:</b>
            <p>Mr. Mbappe</p>
        </span>

    </div>
</div>
@endsection