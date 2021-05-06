@extends('admin_dashboard')
@section('admin_content')


    <!-- Main content -->
    <section class="content" style="background-color: #212529; color: white;">
      <div class="container-fluid"style="background-color: #212529; color: white;">
          <legend class="text-center rounded" style="background-color: #34495E; color: white; ">Customer Schedule Info</legend>
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary "style="background-color: #212529; color: white;">
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
              
            <div class="card">
             
              <div class="card-body"style="background-color: #212529; color: white;">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity"style="background-color: #212529; color: white;">
                     
                    
                    <!-- Post -->
                    <div class="post">
                        <div class="row">
                          <div class="col-md-6 col-ms-12 col-lg-6 col-12 text-light ">
                            <strong>Customer First Name</strong><hr>
                            <strong>Customer Last Name</strong><hr>
                            <strong>Customer Phone</strong><hr>
                            <strong>Employee Name</strong><hr>
                            <strong>Work Status</strong><hr>
                            <strong>Customer Comment</strong><hr>
                            <strong>Customer Email</strong><hr>
                            <strong>Customer Whatsapp</strong><hr>
                            <strong>Customer Facebook</strong><hr>
                          </div>
                          <div class="col-md-6 col-ms-12 col-lg-6 col-12 text-light">
                            <strong>{{$profile->first_name}}</strong><hr>
                            <strong>{{$profile->last_name}}</strong><hr>
                            <strong>{{$profile->phone}}</strong><hr>

                            <strong>{{$profile->employee->first_name}}&nbsp;{{$profile->employee->last_name}}</strong><hr>

                            @if($profile->status==1)
                            <span class="bg-success rounded" >complate</span><hr>
                            @else
                            <span class="bg-danger rounded" >Incomplate</span><hr>
                            @endif
                            <strong>{{$profile->comment}}</strong><hr>

                            <strong>{{$profile->email}}</strong><hr>
                            <strong>{{$profile->whatsapp}}.</strong><hr>
                            <strong>{{$profile->facebook}}.</strong><hr>
                          </div>
                          <div class="float-right ml-auto">
                            <a class="btn btn-info " href="{{route('admin.customer.all-customer')}}">Back</a>
                            <a class="btn btn-success " href="{{url('/')}}">Dashboard</a>
                          </div>
                        </div>
                    </div><!-- /.card-body -->
                  </div>
            <!-- /.nav-tabs-custom -->
              </div>
          <!-- /.col -->
              </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
