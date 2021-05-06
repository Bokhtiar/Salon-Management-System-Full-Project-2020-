@extends('admin_dashboard')
@section('admin_content')
<style>
    a.btn.btn-success {
    width: 100px;
    
}

</style>

<div style="background-color:#212529;">
<div class=" table-responsive-lg table-responsive table-responsive-md table-responsive-sm ">
<table class="table table-striped table-dark py-2" style="background-color:#212529;">
<thead class="text-center">
  <tr>
    <th scope="col">Sl</th>
    <th scope="col"> First Name</th>
    <th scope="col"> Last Name</th>
    <th scope="col"> E-mail</th>
    <th scope="col">Date </th>
  </tr>
</thead>
<tbody class="text-center">
  @foreach(App\User::all() as $v_user)
      <tr>
        <th scope="row">{{$loop->index +1}}</th>
        <td>{{$v_user->first_name}}</td>
        <td>{{$v_user->last_name}}</td>
        <td>{{$v_user->email}}</td>
        <td>{{$v_user->created_at}}</td>
      </tr>
  @endforeach
  
</tbody>
</table>
</div>



</div>
@endsection
