<div>
    <!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
<ul>
    @foreach ($user as $x)
    <li>{{$x->id}}</li>
<li>{{$x->name}}</li>
<li>{{$x->email}}</li>
<ul>    
@endforeach
</div>

