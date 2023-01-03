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

    </div>
</div>
@endsection