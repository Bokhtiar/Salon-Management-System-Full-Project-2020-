@extends('admin_dashboard')
@section('admin_content')
<style>
    a.btn.btn-success {
    width: 100px;
}
</style>

<div class="py-5">
  <span class="font-weight-bold h4 text-light"> OUR&nbsp; CUSTOMER &nbsp;LIST</span>
  
   <a class="btn btn-primary float-right" href="{{route('admin.customer.add-customer')}}">Add Customer</a>

</div><!--heading  -->
<div class="float-right mb-2">
  <form class="form-inline" action="{{url('admin/customer/search-date')}}" method="post">
    @csrf
    <input style="background-color:#CACFD2;" type="date" name="date" value="">
    <input style="background-color:#CACFD2;" class="" type="submit" name="btn" value="Search">
  </form>
</div><!--search date form -->
<div class=" table-responsive-lg table-responsive table-responsive-md table-responsive-sm ">
<table class="table table-striped table-dark py-2" style="background-color:#212529;">
<thead class="text-center">
  <tr>
    <th scope="col">Sl</th>
    <th scope="col">First Name</th>
    <th scope="col">Last Name</th>
    <th scope="col">Phone</th>
    <th scope="col">E-mail</th>
    <th scope="col">Action</th>
  </tr>
</thead>
<tbody class="text-center">
  @foreach($all_customer as $v_customer)
      <tr>
        <th scope="row">{{$loop->index +1}}</th>
        <td>{{$v_customer->first_name}}</td>
        <td>{{$v_customer->last_name}}</td>
        <td>{{$v_customer->phone}}</td>
        <td>{{$v_customer->email}}</td>
        <td>
          <a class="text-success" href="{{url('admin/customer/single-profile-customer/'.$v_customer->id)}}"><i class="far fa-eye"></i></a>
          <a class="text-info" href="{{url('admin/customer/edit-customer/'.$v_customer->id)}}"><i class="fas fa-pen-alt"></i></a>
          <a class="text-danger" href="{{url('admin/customer/delete-customer/'.$v_customer->id)}}" id="delete"><i class="far fa-trash-alt"></i></a>
        </td>
      </tr>
  @endforeach
  {{ $all_customer->links() }}
</tbody>
</div>
</table>




@endsection
