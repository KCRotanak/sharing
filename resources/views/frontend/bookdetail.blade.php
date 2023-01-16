@extends('layouts.userapp')
@section('content')
    <div class="loader" style="margin-top: 0px">
        <div class="loader-content">
            <img src="{{ asset('images/load.gif') }}" alt="Loader" class="loader-loader" style="margin-top:300px">
        </div>
    </div>
    <div class="detail">
        <div class="bookdownload">
            {{-- <iframe height="100%" width="100%" src="/assets/{{ $book->file }}"></iframe> --}}
            <img src="{{ asset('../thumnails/' . $book->cover) }}" alt="">
            <a href="{{  route('front_download', $book->file) }}">
                <button >Download&nbsp;
                    <i class='bx bxs-download'></i>
                </button>
            </a>
        </div>
        <div class="bookdetail">
            <span style="width: 950px; " >
                <h3>{{ $book->title }}</h3>
                <p style="text-decoration: underline; font-weight: bold">Book Details</p>
                <b>Author:</b>
                <p>{{ $book->author }}</p>
                <b>Department:</b>
                <p>{{ $book->department->name }}</p>
                <b>Description:</b>
                <p  style="text-align: justify; text-justify: inter-word">{{ $book->description }}</p>
            </span>
            <span class="bookdetail_right">
                <b>Book ID: </b><b style="font-weight: normal">{{ $book->id }}</b><br><br>
                <b>Year:</b>
                <p>{{ $book->year }}</p>

                <b>Lecturer:</b> <br>

                <div class="dropdown" style="cursor: pointer">
                    <p>{{ $book->teacher->name }}</p>
                    <div class="dropdown-content">
                        <p style="color: white">
                            mail:{{ $book->teacher->email }} <br>
                            phone: {{ $book->teacher->phone }}
                        </p>
                    </div>
                </div>

                <br> <b>Company:</b>
                <p>{{ $book->company }}</p>
            </span>
        </div>
    </div>
@endsection
