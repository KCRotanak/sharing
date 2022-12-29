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
                                <h4 class="mb-sm-0">Teachers</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item">About</li>
                                        <li class="breadcrumb-item active">Teachers</li>
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

                                        <div class="col" style="margin-left: 60px">
                                            <div id="customerList">
                                                <div class="col-sm-auto">
                                                    <div>
                                                        <a class="btn btn-success" href="javascript:void(0)"
                                                            id="createNewTeacher"><i
                                                                class="ri-add-line align-bottom me-1"></i>
                                                            Create New Teacher</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <table class="table table-bordered data-table">
                                        <thead class="table-light">
                                            <tr>

                                                <th class="sort">No</th>
                                                <th class="sort">Name</th>
                                                <th class="sort">Email</th>
                                                <th class="sort">Phone Number</th>
                                                <th width="280px">Action</th>
                                            </tr>
                                        </thead>

                                    </table>
                                </div>
                                <div class="modal fade" id="ajaxModel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="modelHeading" style="margin-left: 10px"></h4>
                                            </div>
                                            <div class="modal-body">
                                                <form id="teacherForm" name="teacherForm" class="form-horizontal">
                                                    <input type="hidden" name="teacher_id" id="teacher_id">
                                                    <div class="form-group" style="padding: 10px;">
                                                        <label for="name" class="col-sm-2 control-label">Name</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="name"
                                                                name="name" placeholder="Enter Name" value=""
                                                                maxlength="50" required="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="padding: 10px;">
                                                        <label for="email" class="col-sm-2 control-label">Email</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="email"
                                                                name="email" placeholder="Enter email" value=""
                                                                maxlength="50" required="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="padding: 10px;">
                                                        <label for="phone" class="col-sm-4 control-label">Phone
                                                            Number</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="phone"
                                                                name="phone" placeholder="Enter phone" value=""
                                                                maxlength="50" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-offset-2 col-lg-10" style="padding: 10px;">
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
                ajax: "{{ route('teachers.index') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
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
            $('#createNewTeacher').click(function() {
                $('#saveBtn').val("create-teacher");
                $('#teacher_id').val('');
                $('#teacherForm').trigger("reset");
                $('#modelHeading').html("Enter teacher's information");
                $('#ajaxModel').modal('show');
            });

            /*------------------------------------------
            --------------------------------------------
            Click to Edit Button
            --------------------------------------------
            --------------------------------------------*/
            $('body').on('click', '.editTeacher', function() {
                var teacher_id = $(this).data('id');
                $.get("{{ route('teachers.index') }}" + '/' + teacher_id + '/edit', function(data) {
                    $('#modelHeading').html("Edit Teacher's detail");
                    $('#saveBtn').val("edit-user");
                    $('#ajaxModel').modal('show');
                    $('#teacher_id').val(data.id);
                    $('#name').val(data.name);
                    $('#email').val(data.email);
                    $('#phone').val(data.phone);
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
                    data: $('#teacherForm').serialize(),
                    url: "{{ route('teachers.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function(data) {

                        $('#teacherForm').trigger("reset");
                        $('#ajaxModel').modal('hide');
                        table.draw();

                    },
                    error: function(data) {
                        console.log('Error:', data);
                        $('#saveBtn').html('Save Changes');
                    }
                });
            });

            /*------------------------------------------
            --------------------------------------------
            Delete Product Code
            --------------------------------------------
            --------------------------------------------*/
            $('body').on('click', '.deleteTeacher', function() {

                var teacher_id = $(this).data("id");
                confirm("Are You sure want to delete !");

                $.ajax({
                    type: "DELETE",
                    url: "{{ route('teachers.store') }}" + '/' + teacher_id,
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
