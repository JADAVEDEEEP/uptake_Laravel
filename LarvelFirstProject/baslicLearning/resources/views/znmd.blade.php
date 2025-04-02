<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h1>User Data</h1>
@foreach ($student as $stu)

<table class="table table-stripped mt-5">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">password</th>
      </tr>

    <tbody>
        <tr>
          <td>{{$stu->student_id}}</td>
          <td>{{$stu->name}}</td>
          <td>{{$stu->email}}</td>
          <td>{{$stu->password}}</td>
        </tr>
    </tbody>    
    
</thead>





@endforeach


</body>
</html>