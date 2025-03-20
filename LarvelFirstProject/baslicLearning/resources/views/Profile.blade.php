<div>
    <h1>
        profile Page
    </h1>
    

    @if (session('user'))
    <h1>welcome {{session('user')}}</h1>
    @else    
    <h1>No user found </h1>
    @endif
</div>