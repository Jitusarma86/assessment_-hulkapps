<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
    <title>Display</title>
</head>
<body>

<div class="about-wrapper">
                <div class="content" style="height:500px;">
                <br>
                <div class="row">

@foreach($result as $val)

<form id="std" action="{{url('/')}}/student/{id}" method="post" enctype="multipart/form-data">
    @csrf
       <div class="col-lg-7 col-mid-12 col-sm-12">  
                Name:<br>
                <input type="text" class="form-control" name="name" value="{{$val->name}}">
        </div>
        <div class="col-lg-7 col-mid-12 col-sm-12">  
                email:<br>
                <input type="text" class="form-control" name="email" value="{{$val->email}}">
        </div>
        <div class="col-lg-7 col-mid-12 col-sm-12">  
                dob:<br>
                <input type="text" class="form-control" name="dob" value="{{$val->dob}}">
        </div>
        <div class="col-lg-7 col-mid-12 col-sm-12">  
                address:<br>
                <input type="text" class="form-control" name="address" value="{{$val->address}}">
        </div>

        <div class="col-lg-7 col-mid-12 col-sm-12">  
                img:<br>
                <input type="file" name="image" class="form-control" value="">
        </div>
        <br>
        <button class="btn btn-primary" name="submit">Update</button>  
<form>

@endforeach


</div>
</div>
</div>
</body>
</html>