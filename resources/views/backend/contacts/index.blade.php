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
                                <h4 class="mb-sm-0">Messages</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item">Contact</li>
                                        <li class="breadcrumb-item active">Messages</li>
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
                                                <th>No</th>
                                                <th>Email</th>
                                                <th>Subject</th>
                                                <th width="280px">Action</th>
                                            </tr>
                                        </thead>

                                        @foreach ($contacts as $contact)
                                            <tr>
                                                <td>{{ $contact->id }}</td>
                                                <td>{{ $contact->email }}</td>
                                                <td>{{ $contact->subject }}</td>
                                                {{-- <td>{{ $contact->name }}</td> --}}

                                                <td>
                                                    <form action="{{ route('contact.destroy', $contact->id) }}"
                                                        method="POST">

                                                        <a class="btn btn-sm btn-secondary"
                                                            href="{{ route('contact.show', $contact->id) }}">Show</a>

                                                        @csrf
                                                        @method('DELETE')

                                                        {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <button type="submit" class="btn btn-sm btn-danger show-alert-delete-box"
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
    </div>
@endsection
