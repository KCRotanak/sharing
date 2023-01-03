@extends('layouts.adminapp')
@section('content')
    <div id="layout-wrapper">
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <form action="{{ url('uploadthesis') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="title" placeholder="Title">
                        <input type="text" name="author" placeholder="Author">
                        <select name="departmentID">
                            <option selected value="Department">Department:</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                        <select name="teacherID">
                            <option selected value="Subject">Subject:</option>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                        <input type="text" name="company" placeholder="Company name">
                        <input type="interger" name="year" placeholder="Year">
                        <input type="text" name="description" placeholder="description">
                        <input type="file" name="file">
                        <input type="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
