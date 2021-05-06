@extends('admin_dashboard')
@section('admin_content')


<div class="py-5">
  <span class="font-weight-bold h4 text-light"> OUR&nbsp; EMPLOYEE &nbsp;LIST</span>
  <span class="float-right"><a class="btn btn-info text-light font-weight-bold" href="{{route('admin.employee.add-employee')}}">ADD EMPLOYEE</a> </span>
</div><!--heading  -->


<table class="table table-striped table-dark py-2 ">
<thead class="text-center">
  <tr>
    <th scope="col">Sl</th>
    <th scope="col">First Name</th>
    <th scope="col">Last Name</th>
    <th scope="col">Salary</th>
    <th scope="col">Action</th>
  </tr>
</thead>
  <tbody class="text-center">

      @foreach($all_employee as $v_emp)
          <tr>
            <th scope="row">#emp{{$loop->index +1}}</th>
            <td>{{$v_emp->first_name}}</td>
            <td>{{$v_emp->last_name}}</td>
            <td>{{$v_emp->salary}}</td>



            
            <td>
              <a class="text-success" href="{{url('admin/employee/single-profile-employee/'.$v_emp->id)}}"><i class="far fa-eye"></i></a>
              <a class="text-info" href="{{url('admin/employee/edit-employee/'.$v_emp->id)}}"><i class="fas fa-pen-alt"></i></a>
              <a class="text-danger" href="{{url('admin/employee/delete-employee/'.$v_emp->id)}}" id="delete"><i class="far fa-trash-alt"></i></a>
            </td>
          </tr>
      @endforeach

  </tbody>
</table>

@endsection
