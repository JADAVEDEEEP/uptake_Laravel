<h1>Bat Yahi He ki Yato Win He yato Learn He</h1>

@php
    $deep=['deep','jadav'];
    $deep2=10;
@endphp
<ul>
@foreach ($deep as $y)
 <li> {{$loop->iteration}}-{{$y}}</li>   
@endforeach

@if ($deep2>=10)
you are valid
@else
you are not valid 
@endif

</ul>