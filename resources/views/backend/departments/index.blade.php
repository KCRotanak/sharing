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
                                <h4 class="mb-sm-0">Departments</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item">About</li>
                                        <li class="breadcrumb-item active">Departments</li>
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
                                    <h4 class="card-title mb-0">Data Table</h4>
                                </div>
                                <div class="card-body">
                                    <div id="customerList">
                                        <div class="row g-4 mb-3">
                                            <div class="col-sm-auto">
                                                <div>
                                                    <a class="btn btn-success" href="javascript:void(0)"
                                                        id="createNewDepartment"><i class="ri-add-line align-bottom me-1"></i> Create
                                                        New Department</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <table class="table table-bordered data-table">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="sort">No</th>
                                                <th class="sort">Name</th>
                                                {{-- <th>Details</th> --}}
                                                <th width="280px">Action</th>
                                            </tr>
                                        </thead>
                                      
                                    </table>
                                </div>

                                <div class="modal fade" id="ajaxModel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="modelHeading"></h4>
                                            </div>
                                            <div class="modal-body">
                                                <form id="departmentForm" name="departmentForm" class="form-horizontal">
                                                    <input type="hidden" name="department_id" id="department_id">
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-2 control-label">Name</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" placeholder="Enter Name" value=""
                                                                maxlength="50" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <button type="submit" class="btn btn-primary" id="saveBtn"
                                                            value="create">Save
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <script type="text/javascript">
                $(function() {

                    /*------------------------------------------
                     --------------------------------------------
                     Pass Header Token
                     --------------------------------------------
                     --------------------------------------------*/
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    /*------------------------------------------
                    --------------------------------------------
                    Render DataTable
                    --------------------------------------------
                    --------------------------------------------*/
                    var table = $('.data-table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: "{{ route('departments.index') }}",
                        columns: [{
                                data: 'DT_RowIndex',
                                name: 'DT_RowIndex'
                            },
                            {
                                data: 'name',
                                name: 'name'
                            },
                            // {data: 'detail', name: 'detail'},
                            {
                                data: 'action',
                                name: 'action',
                                orderable: false,
                                searchable: false
                            },
                        ]
                    });

                    /*------------------------------------------
                    --------------------------------------------
                    Click to Button
                    --------------------------------------------
                    --------------------------------------------*/
                    $('#createNewDepartment').click(function() {
                        $('#saveBtn').val("create-department");
                        $('#department_id').val('');
                        $('#departmentForm').trigger("reset");
                        $('#modelHeading').html("Create New Department");
                        $('#ajaxModel').modal('show');
                    });

                    /*------------------------------------------
                    --------------------------------------------
                    Click to Edit Button
                    --------------------------------------------
                    --------------------------------------------*/
                    $('body').on('click', '.editDepartment', function() {
                        var department_id = $(this).data('id');
                        $.get("{{ route('departments.index') }}" + '/' + department_id + '/edit', function(data) {
                            $('#modelHeading').html("Edit Department");
                            $('#saveBtn').val("edit-user");
                            $('#ajaxModel').modal('show');
                            $('#department_id').val(data.id);
                            $('#name').val(data.name);
                            //   $('#detail').val(data.detail);
                        })
                    });

                    /*------------------------------------------
                    --------------------------------------------
                    Create Product Code
                    --------------------------------------------
                    --------------------------------------------*/
                    $('#saveBtn').click(function(e) {
                        e.preventDefault();
                        $(this).html('Save');

                        $.ajax({
                            data: $('#departmentForm').serialize(),
                            url: "{{ route('departments.store') }}",
                            type: "POST",
                            dataType: 'json',
                            success: function(data) {

                                $('#departmentForm').trigger("reset");
                                $('#ajaxModel').modal('hide');
                                table.draw();

                            },
                            error: function(data) {
                                console.log('Error:', data);
                                $('#saveBtn').html('Save');
                            }
                        });
                    });

                    /*------------------------------------------
                    --------------------------------------------
                    Delete Product Code
                    --------------------------------------------
                    --------------------------------------------*/
                    $('body').on('click', '.deleteDepartment', function() {

                        var department_id = $(this).data("id");
                        confirm("Are You sure want to delete !");

                        $.ajax({
                            type: "DELETE",
                            url: "{{ route('departments.store') }}" + '/' + department_id,
                            success: function(data) {
                                table.draw();
                            },
                            error: function(data) {
                                console.log('Error:', data);
                            }
                        });
                    });

                });
            </script>
        @endsection
