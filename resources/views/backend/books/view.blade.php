@extends('layouts.adminapp')
@section('content')
    <div id="layout-wrapper">
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <table class="table table-bordered ">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author</th>   
                                <th>Teacher</th>                                               
                                <th>Department</th>        
                                <th>Year</th>                                      
                                <th>description</th>
                            </tr>
                        </thead>
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->title }} </td>
                        <td>{{ $book->author }} </td>     
                        <td>{{ $book->teacher->name}} </td>                                      
                        <td>{{ $book->department->name}} </td>                                               
                        <td>{{ $book->year}} </td>       
                        <td>{{$book->description}}</td> 
                    </tr>
                </table>
	<iframe height="1000px"  width="100%" src="/assets/{{$book->file}}"></iframe>
</div>
</div>
</div>
</div>
@endsection