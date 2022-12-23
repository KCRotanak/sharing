@extends('layouts.userapp')
@section('content')
    <div class="loader" style="margin-top:0px">
        <div class="loader-content">
            <img src="{{ asset('images/load.gif') }}" alt="Loader" class="loader-loader" />
        </div>
    </div>

    <div class="container" style="margin: 140px">
        <div class="row" style="width: 1700px">
            <div class="col-3">
                <form action="">
                    <div class="card" style="padding: 20px">
                        <div class="form-group col-12 " style="padding: 10px">
                            <label for="department">Department</label>
                            <select class="form-select">
                                <option selected>Select Department</option>
                                <option value=" ">GIC</option>
                                <option value=" ">GCI</option>
                                <option value=" ">GEE</option>
                            </select>
                        </div>
                        <div class="form-group col-12 " style="padding: 10px">
                            <label for="lecturer">Lecturer</label>
                            <select class="form-select">
                                <option selected>Select Lecturer</option>
                                <option value=" ">GIC</option>
                                <option value=" ">GCI</option>
                                <option value=" ">GEE</option>
                            </select>
                        </div>
                        <div class="form-group col-12 " style="padding: 10px">
                            <label for="year">Year</label>
                            <select id="selectYear" class="form-select">
                                @for ($i = 2000; $i <= 2022; $i++)
                                    <option class="">{{ $i }}</option>
                                @endfor 
                            </select>
                        </div>

                        <div class="form-group" style="padding: 10px">
                            <button type="button" class="btn btn-secondary" style="width: 200px">Filter</button>
                        </div>

                    </div>
                </form>
            </div>

            <div class="browse_card">
                <img src="{{asset ('images/cover_card.png')}}" alt="">
                <div class="browse_descript">
                    <span>
                        <p>Title: Bus Ticket Reservation System</p>
                        <p>Author: Twinkle</p>
                        <p>Department: GIC</p>
                        <p>Year: 2022</p>
                        <p>Description: blah blah blah</p>
                    </span>
                </div>
                <button><i class='bx bx-show'></i> View</button>
            </div>

        </div>
    </div>
@endsection
