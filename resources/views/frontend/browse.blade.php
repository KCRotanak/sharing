@extends('layouts.userapp')
@section('content')
    <div class="loader" style="margin-top: 0px">
        <div class="loader-content">
            <img src="{{ asset('images/load.gif') }}" alt="Loader" class="loader-loader" style="margin-top:300px">
        </div>
    </div>
    <div class="container" style="margin: 125px">
        <div class="row" style="width: 1700px">
            <div class="col-3">
                <h3>Search Filter</h3>
                <form action="{{ route('browse.filter') }}" method="GET">
                    @csrf
                    <div class="card" style="padding: 20px; margin-top: 20px; border-radius: 15px;">
                        <div class="form-group col-12 " style="padding: 10px">
                            <label for="department">Department</label>
                            <select class="form-select" name="inputDep">
                                <option selected value="">Select Department</option>
                                @foreach ($departments as $department)                              
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-12 " style="padding: 10px">
                            <label for="lecturer">Lecturer</label>
                            <select class="form-select" name="inputTec">
                                <option selected value="">Select Lecturer</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-12 " style="padding: 10px">
                            <label for="year">Academic Year</label>
                            <select id="selectYear" class="form-select" name="inputYear">
                                <option selected value=""> Select Year </option>
                                @for ($i = 2000; $i <= 2022; $i++)
                                    <option value="{{ $i }}" class="">{{ $i }} - {{$i+1}}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="form-group" style="padding: 10px">
                            <button type="submit" class="filter-button">Filter</button>
                        </div>

                    </div>
                </form>
            </div>


            <div class="col-8" style="margin-left:50px;">
                <h3>Books</h3>
                @forelse ($books as $book)
                    <div class="browse_card">
                        <img height="100%" width="100%" src="{{ asset('../thumnails/' . $book->cover) }}" alt="">
                        <div class="browse_descript">
                            <span>
                                <p>Title: {{ $book->title }} </p>
                                <p>Author: {{ $book->author }}</p>
                                <p>Department: {{ $book->department->name }}</p>
                                <p>Year: {{ $book->year }} - {{ $book->year+1 }}</p>
                                <p>Description: {{ $book->description }}</p>
                            </span>
                        </div>
                        <a href="{{ url('/bookdetail', $book->id) }}"><button><i class='bx bx-show'></i> View</button></a>
                    </div>
                    @empty
    
                    <div class="container" style="padding: 100px">
                        <div class="row justify-content-lg-center">
                          <div class="col-lg-auto">
                            <img src="{{ asset('images/noresult.png') }}" alt="" style="margin-top: -100px; margin-left: 180px; width: 50%">
                      
                          </div>
                        </div>
                    </div>

                @endforelse
            </div>
        </div>

        <script>
            $('.browse_descript p').text(function(_, txt) {
                if (txt.length > 80) {
                    txt = txt.substr(0, 80) + " ...";
                    $(this).parent().append("");
                }
                $(this).html(txt)
            });
        </script>
    @endsection
