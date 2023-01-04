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
        <button>Download</button>
    </div>
    <div class="bookdetail">
        
        <h2>The Flactuation</h2>

            <div class="author">Author:</div>
            
            {{-- <div class="bookid">BookID:</div>
            <div class="data-bookid">007</div>

            <div class="detail">Book Details:</div>
            <div class="data-detail">Donald Remphis</div>

            <div class="year">Year:</div>
            <div class="data-year">2022</div>

            <div class="department">Department:</div>
            <div class="data-department">Department of Information and Communication Engineering</div>

            <div class="lecturer">Lecturer:</div>
            <div class="data-lecturer">Mr. Hok Tin</div>

            <div class="company">Company:</div>
            <div class="data-company">Google, Inc</div>

            <div class="supervisor">Supervisor:</div>
            <div class="data-supervisor">Mr. Leo Messi</div>

            <div class="company-detail" style="text-align: start;">
                <div class="title">Description:</div>
                <div class="data"> In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may used as a placeholder before final copy
                    is available. </div>
            </div> --}}


    </div>
</div>
@endsection