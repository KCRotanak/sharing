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
                                <h4 class="mb-sm-0">Department</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Page</a></li>
                                        <li class="breadcrumb-item active">Department</li>
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
                                    <h4 class="card-title mb-0">Add, Edit & Remove</h4>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div id="customerList">
                                        <div class="row g-4 mb-3">
                                            <div class="col-sm-auto">
                                                <div>
                                                    <button type="button" class="btn btn-success add-btn"
                                                        data-bs-toggle="modal" id="create-btn" data-bs-target="#addModal"><i
                                                            class="ri-add-line align-bottom me-1"></i> Add</button>
                                                    <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i
                                                            class="ri-delete-bin-2-line"></i></button>
                                                </div>
                                            </div>
                                            <div class="col-sm">
                                                <div class="d-flex justify-content-sm-end">
                                                    <div class="search-box ms-2">
                                                        <input type="text" class="form-control search"
                                                            placeholder="Search...">
                                                        <i class="ri-search-line search-icon"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="table-responsive table-card mt-3 mb-1">
                                            <table class="table align-middle table-nowrap" id="customerTable">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col" style="width: 50px;">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="checkAll" value="option">
                                                            </div>
                                                        </th>
                                                        <th class="sort" data-sort="phone">ID</th>
                                                        <th class="sort" data-sort="customer_name">Department</th>
                                                        <th class="sort" data-sort="date">Joining Date</th>
                                                        <th class="sort"></th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list form-check-all">
                                                    @php $i=1; @endphp
                                                    @foreach ($departments as $key => $department)
                                                        <tr>
                                                            <th scope="row">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="chk_child" value="option1">
                                                                </div>
                                                            </th>
                                                            <td class="id" style="display:none;"><a
                                                                    href="javascript:void(0);"
                                                                    class="fw-medium link-primary">#VZ2101</a>
                                                            </td>
                                                            <td class="phone">{{ $department->id }}</td>
                                                            <td class="customer_name">{{ $department->name }}</td>
                                                            <td class="date"> {{ $department->created_at }}</td>
                                                            {{-- <td class="status"><span
                                                                    class="badge badge-soft-success text-uppercase">Check</span>
                                                            </td> --}}
                                                            <td>
                                                                <div class="d-flex gap-2">
                                                                    <div class="edit">
                                                                        <button class="btn btn-sm btn-success edit-item-btn"
                                                                            type="button"
                                                                            onclick="getDepartmentID({{$department->id}})"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#editModal">Edit</button>
                                                                    </div>
                                                                    <div class="remove">
                                                                        <button
                                                                            class="btn btn-sm btn-danger remove-item-btn"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#deleteRecordModal">Remove</button>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                    @endforeach
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="noresult" style="display: none">
                                                <div class="text-center">
                                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                        colors="primary:#121331,secondary:#08a88a"
                                                        style="width:75px;height:75px"></lord-icon>
                                                    <h5 class="mt-2">Sorry! No Result Found</h5>
                                                    {{-- <p class="text-muted mb-0">We've searched more than 150+ Orders We did
                                                        not find any orders for you search.</p> --}}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-end">
                                            <div class="pagination-wrap hstack gap-2">
                                                <a class="page-item pagination-prev disabled" href="#">
                                                    Previous
                                                </a>
                                                <ul class="pagination listjs-pagination mb-0"></ul>
                                                <a class="page-item pagination-next" href="#">
                                                    Next
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end col -->
                    </div>

                    <div class="modal fade" id="addModal" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-light p-3">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Department</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                        id="close-modal"></button>
                                </div>
                                <form method="post" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3" id="modal-id" style="display: none;">
                                            <label for="id-field" class="form-label">ID</label>
                                            <input type="text" class="form-control" placeholder="ID" />
                                        </div>

                                        <div class="mb-2">
                                            <label for="customername-field" class="form-label">Department</label>
                                            <input type="text" class="form-control" placeholder="Enter the Department"
                                                name="name" />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="button" class="btn btn-light"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success"  name="add-btn">Add
                                                Customer</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-light p-3">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Department</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                        id="close-modal"></button>
                                </div>
                                <form method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="modal-body">

                                        <div class="mb-3" id="modal-id" style="display: none;">
                                            <label for="id-field" class="form-label">ID</label>
                                            <input type="text" class="form-control" placeholder="ID" readonly />
                                        </div>

                                        <div class="mb-2">
                                            <label for="customername-field" class="form-label">Department</label>
                                            <input type="text" class="form-control" placeholder="Enter Name" required
                                                name="name" value="{{ old('name') }}" />
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="button" class="btn btn-light"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="text" class="btn btn-success"
                                                 name="add-btn">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                        id="btn-close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST">
                                        <div class="mt-2 text-center">
                                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                                colors="primary:#f7b84b,secondary:#f06548"
                                                style="width:100px;height:100px">
                                            </lord-icon>
                                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                                <h4>Are you Sure ?</h4>
                                                <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Record
                                                    ?
                                                </p>
                                            </div>
                                        </div>
                                        @method('DELETE')
                                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                            <button type="button" class="btn w-sm btn-light"
                                                data-bs-dismiss="modal">Close</button>
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="button" class="btn w-sm btn-danger ">Yes,
                                                Delete It!</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <script>
            $(document).ready(function() {
        
            let department_id;

            function getDepartmentID(id) {
                department_id = id;
                alert(id);
            }

            function update() {
                alert(department_id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                e.preventDefault();
                var formData = {
                    name: "helo",
                };
                var ajaxurl = 'todo';
                $.ajax({
                    type: type,
                    url: `/update/department/${department_id}`,
                    data: formData
                    success: function(data) {
                        alert("Success");
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }
        });

        </script> --}}
    @endsection
