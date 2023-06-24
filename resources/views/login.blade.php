<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
<form id="std" action="{{url('/')}}" method="post" enctype="multipart/form-data">
    @csrf
    <br>
       <div class="col-lg-7 col-mid-12 col-sm-12">  
                Email:<br>
                <input type="text" class="form-control" name="email" value="">
        </div>
        <div class="col-lg-7 col-mid-12 col-sm-12">  
                password:<br>
                <input type="password" class="form-control" name="password" value="">
        </div>
        <button class="btn btn-primary" name="submit">Login</button>  
 <form>       
</body>
</html>