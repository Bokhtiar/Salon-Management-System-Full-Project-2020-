@extends('admin_dashboard')
@section('admin_content')


    <section class="row justify-content-center py-5" style="background-color:black;">
      <div class="col-md-6 col-lg-6 col-sm-12 col-12">
        <div class="row">
          <div class="col-md-6 py-5 mt-5">
            <h4 class="text-center text-light">About {{$profile->last_name}} Profile</h4>
          </div><!--end of first div-->
          <div class="col-md-6">
            <h5 class="text-center text-light">First Name : {{$profile->first_name}} </h5>
            <h5 class="text-center text-light">Last Name : {{$profile->last_name}} </h5>
            <h5 class="text-center text-light">Parmanent location : {{$profile->parmanent_location}} </h5>
            <h5 class="text-center text-light">Present location : {{$profile->present_location}} </h5>
            <h5 class="text-center text-light">Join Date : {{$profile->join_date}} </h5>
            <h5 class="text-center text-light">Salary : {{$profile->salary}} </h5>
            <h5 class="text-center text-light">Comment Box : {{$profile->comment_box}} </h5>
          </div><!--end of last div-->
        </div>
      </div>


    </section>
    <div class="py-5 float-right">
      <a class="btn btn-secondary" href="{{url('admin/employee/edit-employee/'.$profile->id)}}">Edit</a>
    </div><br><br><br><br><br>


@endsection
