<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   
    {{"Hello"}}
    <br>
    {{$name}}
    <br>
    {{--HTML CODE--}}
    {{!! "<h1>Sudhikaran Jaruri he</h1>" !!}}
   <br>
   {{--JAVSCRIPT CODE WRITE SYNTAX --}}
     {{!! "
     <script>alert('Deep Jadav')</script>" !!}}
   
@php
    $Addtion=10+30;
    $nas=['deep','rahu','jason'];
    
@endphp

<ul>
@foreach ($nas as $x)

{{--ITERATION FOREACH METHOD--}}

{{-- <li>{{$loop->iteration}}-{{ $x }}</li> --}}


{{--INDEX FOREACH METHOD--}}

{{-- <li>{{$loop->index}}-{{ $x }}</li> --}}


{{--COUNT FOREACH METHOD--}}

<li>{{$loop->count}}-{{ $x }}</li>

@endforeach

@php   
@endphp
{{-- 
{{--LARAVEL BALDE TEMPLATES SUBVIEWS--}}
{{-- @include('welcome') --}} 
@include('BladeTemplateLearning')

@section('BladeTemplateLearning')
</ul>
</body>
</html>