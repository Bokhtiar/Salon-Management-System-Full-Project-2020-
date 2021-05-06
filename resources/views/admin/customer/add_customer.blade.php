@extends('admin_dashboard')
@section('admin_content')

<div class="py-5 container ">
  <span class="font-weight-bold h4 text-light"> NEW&nbsp; CUSTOMER &nbsp;ADD</span>
  <span class="float-right"><a class="btn btn-info text-light font-weight-bold" href="{{route('admin.customer.all-customer')}}">ALL CUSTOMER</a> </span>
</div><!--heading  -->

<section>
  <section class="row justify-content-center">
    <section class="col-md-10 col-sm-12 col-12 col-lg-10">
      <form class="" action="{{route('admin.customer.store-customer')}}" method="post">
        @csrf
        <div class="row"><!--customer infor form star-->
          <legend class="text-light font-weight-bold">CUSTOMER INFO</legend>
          <div class="col-md-4 col-sm-12 col-lg-4 col-12">
            <label class="font-weight-bold h5 text-light" for="">Customer First Name</label>
            <input style="background-color: black;color:white; border:none;" class="form-control" type="text" name="first_name" placeholder="First Name " required value="">
          </div>
          <div class="col-md-4 col-sm-12 col-lg-4 col-12">
            <label class="font-weight-bold h5 text-light" for="">Customer Last Name</label>
            <input style="background-color: black;color:white; border:none;" class="form-control" type="text" name="last_name" placeholder="Last Name " required value="">
          </div>
          <div class="col-md-4 col-sm-12 col-lg-4 col-12">
            <label class="font-weight-bold h5 text-light" for="">Customer phone</label>
            <input style="background-color: black;color:white; border:none;" class="form-control" type="number" name="phone" placeholder="Phone number " required value="">
          </div>
        </div><!--customer infor form end-->
        <hr>
        <div class="row"><!--customer socilite start -->
          <legend class="text-light font-weight-bold">CUSTOMER SOCIALITE INFO</legend>
          <div class="col-md-4 col-sm-12 col-lg-4 col-12">
            <label class="font-weight-bold h5 text-light" for="">Customer Email</label>
            <input style="background-color: black;color:white; border:none;" class="form-control" type="email" name="email" placeholder="Email address"  value="">
          </div>
          <div class="col-md-4 col-sm-12 col-lg-4 col-12">
            <label class="font-weight-bold h5 text-light" for="">Customer Whatsapp</label>
            <input style="background-color: black;color:white; border:none;" class="form-control" type="number" name="whatsapp" placeholder="Whatsapp number "  value="">
          </div>
          <div class="col-md-4 col-sm-12 col-lg-4 col-12">
            <label class="font-weight-bold h5 text-light" for="">Customer Facebook</label>
            <input style="background-color: black;color:white; border:none;" class="form-control" type="text" name="facebook" placeholder="Facebook account "  value="">
          </div>
        </div><!--customer socilite end -->
        <hr>
        <div class="row"><!--customer schdule start -->
          <legend class="text-light font-weight-bold">CUSTOMER SCHEDULE INFO</legend>
          <div class="col-md-4 col-sm-12 col-lg-4 col-12">
            <label class="font-weight-bold h5 text-light" for="">Employee Select</label>
            <select style="background-color: black;color:white; border:none;" required class="form-control" name="employee_id">
              <option value="">Select Employee</option>
              @foreach(App\Employee::where('status',1)->get() as $v_emp)
                <option value="{{$v_emp->id}}">{{$v_emp->first_name}}&nbsp;{{$v_emp->last_name}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-4 col-sm-12 col-lg-4 col-12">
            <label class="font-weight-bold h5 text-light" for="">Schedule Date</label>
            <input style="background-color: black;color:white; border:none;" class="form-control" type="date" name="date" placeholder=" " required value="">
          </div>
          <div class="col-md-4 col-sm-12 col-lg-4 col-12">
            <label class="font-weight-bold h5 text-light" for="">Schedule Time</label>
            <input style="background-color: black;color:white; border:none;" class="form-control" type="time" name="time" placeholder="" required value="">
          </div>
        </div><!--customer schedule end -->
        <hr>
        <div class="row"><!--customer schdule Date -->
          <legend class="text-light font-weight-bold">CUSTOMER Reminder Date</legend>
          <div class="col-md-4 col-sm-12 col-lg-3 col-12">
            <label class="font-weight-bold h5 text-light" for="">Schedule Date 1</label>
            <input style="background-color: black;color:white; border:none;" class="form-control" type="datetime-local" name="reminderDate_one" placeholder=" "  value="">
          </div>
          <div class="col-md-4 col-sm-12 col-lg-3 col-12">
            <label class="font-weight-bold h5 text-light" for="">Schedule Date 2</label>
            <input style="background-color: black;color:white; border:none;" class="form-control" type="datetime-local" name="reminderDate_two" placeholder=""  value="">
          </div>
          <div class="col-md-4 col-sm-12 col-lg-3 col-12">
            <label class="font-weight-bold h5 text-light" for="">Schedule Date 3</label>
            <input style="background-color: black;color:white; border:none;" class="form-control" type="datetime-local" name="reminderDate_three" placeholder=""  value="">
          </div>
          <div class="col-md-4 col-sm-12 col-lg-3 col-12">
            <label class="font-weight-bold h5 text-light" for="">Schedule Date 4</label>
            <input style="background-color: black;color:white; border:none;" class="form-control" type="datetime-local" name="reminderDate_four" placeholder=""  value="">
          </div>
        </div><!--customer schedule Date end -->
        <hr>
        
        <div class=""><!--comment start-->
          <label class="font-weight-bold h5 text-light" for="">Comment Here</label>
          <textarea style="background-color: black;color:white; border:none;" class="form-control" name="comment" placeholder="Enter write the Comment" required rows="4" cols="40"></textarea>
        </div><!--comment end -->
        
        <input type="hidden" name="role_id" value="1" >

        <div class="float-right mt-3">
          <input class="btn btn-info" type="submit" name="btn-customer" value="Add Customer">
        </div>
      </form>
    </section>
  </section>
</section>



@endsection
