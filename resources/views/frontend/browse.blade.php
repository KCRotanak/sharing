@extends('layouts.userapp')
@section('content')
    <div class="container" style="margin: 140px">
        <div class="row">
            <div class="col-4">
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
                                <option class="">{{$i}}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="form-group" style="padding: 10px">
                            <button type="button" class="btn btn-secondary" style="width: 200px">Filter</button>
                        </div>

                    </div>
                </form>
            </div>

            <div class="col-8">
                <div class="card">
                    <h1>Hello World</h1>
                </div>
            </div>


        </div>


    </div>
@endsection
