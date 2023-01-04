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
                                <h4 class="mb-sm-0">Thesis</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item">Pages</li>
                                        <li class="breadcrumb-item active">Thesis</li>
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
                                        <div class="col" style="margin-left: 70px">
                                            <div id="customerList">
                                                <div class="row">
                                                    <div class="col-sm-auto">
                                                        <div>
                                                            <a class="btn btn-success" href="{{ url('/upload') }}"><i
                                                                    class="ri-add-line align-bottom me-1"></i> Create New Thesis</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @endif

                                    <table class="table table-bordered data-table" id="myTable">
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
                                                <th width="280px">Action</th>
                                            </tr>
                                        </thead>

                                        @foreach ($thesis as $thesis)
                                            <tr>
                                                <td>{{ $thesis->id }}</td>
                                                <td>{{ $thesis->title }} </td>
                                                <td>{{ $thesis->author }} </td>
                                                <td>{{ $thesis->teacherID}} </td>
                                                <td>{{ $thesis->departmentID}} </td>
                                                <td>{{ $thesis->company}} </td>
                                                <td>{{ $thesis->year}} </td>
                                                <td>{{ $thesis->description}} </td>
                                                <td>
                                                    <form action="" method="POST">
                                                        <a class="btn btn-sm btn-secondary"
                                                        href="{{ url('/view', $thesis->id) }}">View</a>
                                                        <a class="btn btn-sm btn-primary"href="{{ url('/download', $thesis->file) }}"
                                                           >Download</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger show-alert-delete-box"
                                                            data-toggle="tooltip" title='Delete'>Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>      
@endsection
