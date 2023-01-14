@extends('layouts.adminapp')
@section('content')
    <div id="layout-wrapper">
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->`
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">book</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item">Pages</li>
                                        <li class="breadcrumb-item active">Book's detail</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <h4 class="card-title mt-2">Data Table</h4>
                                        </div>
                                        <table class="table table-bordered ">
                                            <thead class="table-light">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Title</th>
                                                    <th>Author</th>
                                                    <th>Teacher</th>
                                                    <th>Department</th>
                                                    <th>Company</th>
                                                    <th>Year</th>
                                                    <th>Description</th>
                                                </tr>
                                            </thead>
                                            <tr>
                                                <td>{{ $book->id }}</td>
                                                <td>{{ $book->title }} </td>
                                                <td>{{ $book->author }} </td>
                                                <td>{{ $book->teacher->name }} </td>
                                                <td>{{ $book->department->name }} </td>
                                                <td>{{ $book->company }} </td>
                                                <td>{{ $book->year}}-{{ $book->year+1}} </td>
                                                <td>{{ $book->description }} </td>
                                            </tr> 
                                        </thead>
                                        </table>
                                        <iframe height="1000px" width="500px" src="/assets/{{ $book->file }}"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
