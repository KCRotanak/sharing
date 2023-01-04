@extends('layouts.adminapp')
@section('content')
    <div id="layout-wrapper">
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    {{$thesis->title}}
	                {{$thesis->description}}

	<iframe height="1000px"  width="100%" src="/assets/{{$thesis->file}}"></iframe>
</div>
</div>
</div>
</div>
@endsection