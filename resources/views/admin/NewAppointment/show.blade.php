@extends('admin_dashboard')
@section('admin_content')


<div class="py-5">
  <span class="font-weight-bold h4 text-light"> Existing Customer is Choose For New Appointment</span>
  <span class="float-right"><a class="btn btn-info text-light font-weight-bold" href="{{route('admin.customer.add-customer')}}">ADD CUSTOMER</a> </span>

</div><!--heading  -->
<div class=" table-responsive-lg table-responsive table-responsive-md table-responsive-sm ">
<table class="table table-striped table-dark py-2">
<thead class="text-center">
  <tr>
    <th scope="col">Sl</th>
    <th scope="col">First Name</th>
    <th scope="col">Last Name</th>
    <th scope="col">Employee name</th>
    <th scope="col">Mobail</th>
    <th scope="col">Action</th>
  </tr>
</thead>
<tbody class="text-center">
  @foreach($search_customer as $v_customer)
      <tr>
        <th scope="row">{{$loop->index +1}}</th>
        <td>{{$v_customer->first_name}}</td>
        <td>{{$v_customer->last_name}}</td>
        <td>{{$v_customer->employee->first_name}}&nbsp;{{$v_customer->employee->last_name}}</td>
        <td>{{$v_customer->phone}}</td>
        <td>
          <a class="btn btn-info" href="{{url('admin/customer/appointment-edit-customer/'.$v_customer->id)}}">New Appointment</a>
        </td>
      </tr>NewAppointment
  @endforeach

</tbody>
</table>
</div>

@endsection
