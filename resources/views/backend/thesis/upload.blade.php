<form action="{{url('uploadthesis')}}" method="post" enctype="multipart/form-data">

    @csrf

<input type="text" name="name" placeholder=" Name">

<input type="file" name="file">

<input type="submit" >


</form>