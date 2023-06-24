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



<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Sl no</th>
      <th scope="col">Name</th>
      <th scope="col">email</th>
      <th scope="col">dob</th>
      <th scope="col">address</th>
      <th scope="col">photo</th>
      <th scope="col">verifies</th>
    </tr>
  </thead>
  <tbody>
    @foreach($result as $val)
        <tr>
            <td>
                1
            </td>
            <td>
                {{$val->name}}
            </td>
            <td>
                {{$val->email}}
            </td>
            <td>
                {{$val->dob}}
            </td>
            <td>
                {{$val->address}}
            </td>
            <td>
                {{$val->phpto}}
            </td>
            <td>
            <a href="{{url('/')}}/verify/{{$val->email}}"> Verify </a>
            </td>
        </tr>
    @endforeach
    
  </tbody>
</table>
</div>
</div>
</div>
</body>
</html>