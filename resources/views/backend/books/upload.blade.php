@extends('layouts.adminapp')
@section('content')
    <div id="layout-wrapper">
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                     <!-- start page title -->
                     <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">book</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item">Pages</li>
                                        <li class="breadcrumb-item active">Books</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">Create New Book</h4>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">

                                        <form action="{{ url('uploadbook') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <label for="title" class="form-label">Title</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="title"
                                                        placeholder="Enter book title">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <label for="author" class="form-label">Author</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="author"
                                                        placeholder="Enter author name">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <label for="company" class="form-label">Company</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <input type="text" class="form-control" name="company"
                                                        placeholder="Enter company name">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <label for="department" class="form-label">Department</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <select class="form-select mb-3" aria-label="Default select example" name="departmentID">
                                                        <option selected>Select Department</option>
                                                        @foreach ($departments as $department)
                                                            <option value="{{ $department->id }}">{{ $department->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <label for="dateInput" class="form-label">Academic Supervisor</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <select class="form-select mb-3" aria-label="Default select example" name="teacherID">
                                                        <option selected>Select Academic Supervisor</option>
                                                        @foreach ($teachers as $teacher)
                                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <label for="dateInput" class="form-label">Academic Year</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <select class="form-select mb-3" aria-label="Default select example" name="year">
                                                        <option selected>Select Academic Year</option>
                                                        @for ($i = 2000; $i <= 2022; $i++)
                                               
                                                        <option class="" value="{{ $i }}">{{ $i }}-{{$i+1}}</option>
                                                        @endfor 
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <label for="meassageInput" class="form-label">Description</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <textarea class="form-control" rows="3" placeholder="Enter book description" name="description"></textarea>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <label for="meassageInput" class="form-label">File Upload</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <input class="form-control" type="file" name="file">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-lg-3">
                                                    <label for="meassageInput" class="form-label">Cover Upload</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <input class="form-control" type="file" name="cover">
                                                </div>
                                            </div>
                                            <div class="text-end">
                                               
                                                
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                            
                                        </form>
                                        <a href="{{ route('backend.books.index') }}">
                                            <button class="btn btn-light"
                                            style="float: right; margin-right: 110px; margin-top: -65px">Back</button></a>  

                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
