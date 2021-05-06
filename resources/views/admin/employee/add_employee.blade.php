@extends('admin_dashboard')
@section('admin_content')

<div class="py-5 ">
  <span class="font-weight-bold h4 text-light"> NEW&nbsp; EMPLOYEE &nbsp;ADD</span>
  <span class="float-right"><a class="btn btn-info text-light font-weight-bold" href="{{route('admin.employee.all-employee')}}">ALL EMPLOYEE</a> </span>
</div><!--heading  -->

<div class="row justify-content-center">
  <div class="col-md-10">


    <form method="post" action="{{route('admin.employee.store-employee')}}" enctype="multipart/form-data">
      @csrf
          <div class="form-row">
            <div class="form-group col-md-6">
              <label  class="text-light font-weight-bold h5"  for="inputEmail4">Employee First Name</label>
              <input style="background-color: black;color:white; border:none;" placeholder="Type here first name" type="text" class="form-control" name="first_name" id="inputEmail4">
            </div><!--frist name -->
            <div class="form-group col-md-6">
              <label class="text-light font-weight-bold h5" for="inputPassword4">Employee Last Name</label>
              <input style="background-color: black;color:white; border:none;" placeholder="Type here last name" type="text" class="form-control" name="last_name" id="inputEmail4">
            </div><!--last name -->
          </div>



          <div class="form-group">
            <label class="text-light font-weight-bold h5" for="inputAddress">Employee Present Address</label>
            <input style="background-color: black;color:white;border:none;"  type="text" class="form-control" id="inputAddress" name="present_location" placeholder="1234 Main St">
          </div>


          <div class="form-group">
            <label class="text-light font-weight-bold h5" for="inputAddress2">Employee Permanent  Address </label>
            <input style="background-color: black;color:white;border:none;"  type="text" class="form-control" id="inputAddress2" name="parmanent_location" placeholder="Apartment, studio, or floor">
          </div>



          <div class="form-row">
              <div class="form-group col-md-6">
                <label class="text-light font-weight-bold h5" for="inputCity">About Employee</label>
                <input style="background-color: black;color:white;border:none;" placeholder="About employee" type="text" class="form-control" name="comment_box" id="inputCity">
              </div>
              <div class="form-group col-md-4">
                <label class="text-light font-weight-bold h5" for="inputState">Employee Join date</label>
                <input style="background-color: black;color:white;border:none;" placeholder="About employee" type="date" class="form-control" name="join_date" id="inputCity">
              </div>
              <div class="form-group col-md-2">
                <label class="text-light font-weight-bold h5" for="inputZip">Employee Salary</label>
                <input style="background-color: black;color:white;border:none;" name="salary" placeholder="employee Salary" type="text" class="form-control" id="inputZip">
              </div>
            </div>



            <div class="float-right">
              <input class="btn btn-info" type="submit" name="btn_submit" value="Add Employee">
            </div>
</form>
</div>
</div><!--end of fully wrapper --->
<br><br><br><br>





@endsection
