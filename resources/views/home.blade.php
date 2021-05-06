@extends('admin_dashboard')
@section('admin_content')
<style>
    a.btn.btn-success {
    width: 100px;
}
</style>

<div class="container-fluid" style="background-color:#212529;">
  <!-- Small boxes (Stat box) -->
  <div class="row" style="background-color:#212529;">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">

        <div class="inner">
          <?php $amount_customer=App\Customer::all()->count(); ?>
          <h4><?php echo App\Customer::all()->count();;  ?>&nbsp; <span class="h5">Customer</span></h4>

          <p>OUR CUSTOMER</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="{{route('admin.customer.all-customer')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">

        <div class="inner">
          <?php $amout_employee=App\Employee::all()->count(); ?>
          <h4><?php echo App\Employee::all()->count();; ?> &nbsp; <span class="h5">Employee</span><sup style="font-size: 20px"></sup></h4>

          <p>OUR EMPLOYEE</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="{{route('admin.employee.all-employee')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">

        <div class="inner">
          <?php $amout_admin_owner=App\User::all()->count(); ?>
          <h4><?php echo App\User::all()->count();; ?> &nbsp; <span class="h5">Admin&Owner</span></h4>

          <p>Admin area</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="{{url('admin/all-admin')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">

          <h4><?php echo App\Customer::all()->count();;  ?>&nbsp; <span class="h5">APPOINTMENTS</span> </h4>

          <p>APPOINTMENTS</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="{{route('admin.customer.all-customer')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->
  <!-- Main row -->
  <div class="row">
    <!-- Left col -->
    <section class="col-lg-12 col-md-12 col-sm-12 connectedSortable py-3"> <!-- main content area -->
      <div class="py-5 text-center">
        <span class="font-weight-bold h4 text-light">All Appointment For This Week</span>
      </div>
      <div class="float-right mb-2">
        <form class="form-inline" action="{{url('admin/customer/search-date')}}" method="post" style="background-color:#CACFD2;">
          @csrf
          <input style="background-color:#CACFD2;" type="date" name="date" value="">
          <input style="background-color:#CACFD2;" class="" type="submit" name="btn" value="Search">
        </form>
      </div>
      <div class=" table-responsive-lg table-responsive table-responsive-md table-responsive-sm ">
      <table class="table table-striped table-dark py-2">
      <thead class="text-center">
        <tr>
          <th scope="col">Sl</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Employee name</th>
          <th scope="col">E-mail</th>
          <th scope="col">Mobail</th>
          <th scope="col">DATE</th>
          <th scope="col">TIME</th>
          <th scope="col">COMMENT</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody class="text-center">
          
        @foreach(App\Customer::whereBetween('date', [Carbon\Carbon::now()->startOfWeek(),Carbon\Carbon::now()->endOfWeek()])->get() as $v_customer)
            <tr>
              <th scope="row">#S{{$loop->index +1}}</th>
              <td>{{$v_customer->first_name}}</td>
              <td>{{$v_customer->last_name}}</td>
              <td>{{$v_customer->employee->first_name}}&nbsp;{{$v_customer->employee->last_name}}</td>
              <td>{{$v_customer->email}}</td>
              <td>{{$v_customer->phone}}</td>
              <td>{{$v_customer->date}}</td>
              <td>{{$v_customer->time}}</td>
              <td>{{$v_customer->comment}}</td>


              <td>
                <a class="text-success" href="{{url('admin/customer/single-profile-customer/'.$v_customer->id)}}"><i class="far fa-eye"></i></a>
                <a class="text-info" href="{{url('admin/customer/edit-customer/'.$v_customer->id)}}"><i class="fas fa-pen-alt"></i></a>
                <a class="text-danger" href="{{url('admin/customer/delete-customer/'.$v_customer->id)}}" id="delete"><i class="far fa-trash-alt"></i></a>
              </td>
            </tr>
        @endforeach

      </tbody>
      </table>
      </div>
    </section>
  </div>
  <!-- /.row (main row) -->

    </div><!-- /.container-fluid -->





@endsection
