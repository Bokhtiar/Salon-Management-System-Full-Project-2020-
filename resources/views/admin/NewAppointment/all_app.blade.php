@extends('admin_dashboard')
@section('admin_content')
<style>
    a.btn.btn-success {
    width: 100px;
}
</style>

<div class="py-5">

  


</div><!--heading  -->

<div class=" table-responsive-lg table-responsive table-responsive-md table-responsive-sm ">
<table class="table table-striped table-dark py-2" style="background-color:#212529;">
<thead class="text-center">
  <tr>
    <th scope="col">Sl</th>
    <th scope="col">First Name</th>
    <th scope="col">Last Name</th>
    <th scope="col">Mobail</th>
    <th scope="col">E-mail</th>
    <!--<th scope="col">Status</th>-->
    <th scope="col">Action</th>
  </tr>
</thead>
<tbody class="text-center">
  @foreach(App\Customer::all() as $v_customer)
      <tr>
        <th scope="row">{{$loop->index +1}}</th>
        <td>{{$v_customer->first_name}}</td>
        <td>{{$v_customer->last_name}}</td>
        <td>{{$v_customer->phone}}</td>
        <td>{{$v_customer->email}}</td>
         <!--<td>-->
         <!--   @if($v_customer->status==1)-->
         <!--     <span class="bg-success rounded" >complate</span>-->
         <!--   @else-->
         <!--     <span class="bg-danger rounded" >Incomplate</span>-->
         <!--   @endif-->
         <!--       </td>-->
                <td>
                    <!--@if($v_customer->status==0)-->
                    <!--  <span class="" ><a class="bg-success rounded" href="{{url('admin/customer/active-customer/'.$v_customer->id)}}">complate</a> </span>-->
                    <!--@else-->
                    <!--  <span class="" ><a class="bg-danger rounded" href="{{url('admin/customer/inactive-customer/'.$v_customer->id)}}">Incomplate</a> </span>-->
                    <!--@endif-->
       
          <a class="text-success" href="{{url('admin/customer/single-profile-customer/'.$v_customer->id)}}"><i class="far fa-eye"></i></a>
          <a class="text-info" href="{{url('admin/customer/edit-customer/'.$v_customer->id)}}"><i class="fas fa-pen-alt"></i></a>
          <a class="text-danger" href="{{url('admin/customer/delete-customer/'.$v_customer->id)}}" id="delete"><i class="far fa-trash-alt"></i></a>
        </td>
      </tr>
  @endforeach

</tbody>
</div>
</table>




@endsection
