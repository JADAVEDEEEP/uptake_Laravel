<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Document</title>
</head>
<body>
  <div>
    <form action="login2" method="post">
        @csrf
{{--         
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
     --}}
      {{-- <div class="cotainer">
      <input type="text" name="user">
      <span class="text-danger">
        @error('user')
           {{$message}}
        @enderror
      <br>
      <br>
      <input type="password" name="password">
      <span class="text-danger">
        @error('password')
           {{$message}}
        @enderror
      <br>
      <br>
      <input type="submit"> --}}
      <div class="container">
      <form>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" class="form-control" name="user" aria-describedby="emailHelp">
          <span class="text-danger">
            @error('user')
               {{$message}}
            @enderror
                </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
  
          <input type="password" class="form-control" name="password">
          <span class="text-danger">
            @error('password')
               {{$message}}
            @enderror
        </div>
  
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>

</body>
</html>