<div>
    <!-- Nothing worth having comes easy. - Theodore Roosevelt -->
<ul>
    @foreach ($responce as $y )
     <li>{{$y->id}}</li>   
     <li>{{$y->name}}</li>
     <li>{{$y->email}}</li>
</ul>
    @endforeach

</div>
