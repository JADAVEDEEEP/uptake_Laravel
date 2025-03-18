<table class = "border mt-5 table table-striped">
        
    <tr class="fw-bold">
       <td>ID</td>
       <td>Name</td>
       <td>Email</td>
       <td>Password</td>
    </tr>
    @foreach ($users as $user)
    <tr>
       <td>{{ $user->id }}</td>
       <td>{{ $user->name }}</td>
       <td>{{ $user->email }}</td>
       <td>{{ $user->password }}</td>
    </tr>
    @endforeach
 </table>
</thead>