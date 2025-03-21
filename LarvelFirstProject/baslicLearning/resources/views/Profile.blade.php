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
    <div class="container table" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">
        <h1 class="text-danger">
            profile Page
        </h1>
        @if (session('user'))
        <h4>Name :  {{session('user')}}</h4>
        <h4>Password : {{session('password')}}</h4>
        @else    
        <h1>No user found </h1>
        @endif
    </div>
</body>
</html>