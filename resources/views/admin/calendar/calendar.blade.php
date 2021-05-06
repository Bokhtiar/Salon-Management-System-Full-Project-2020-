 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Salon Calendar</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('back/plugins/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('back/dist/css/adminlte.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('back')}}/plugins/iCheck/flat/blue.css">

  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('back')}}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="https://kit.fontawesome.com/ba78558982.js" crossorigin="anonymous"></script><!-- icon link -->
  <link href="{{asset('calender/css/fullcalendar.min.css')}}" rel='stylesheet' />
  <link href="{{asset('calender/css/fullcalendar.print.css')}}" rel='stylesheet' media='print' />
  
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;1,100&display=swap" rel="stylesheet">
  <style>


    #calendar {
      background-color: #18191D;
      color: #BABAB9;
      max-width: 900px;
      margin: 40px auto;
    }
    .fc-unthemed td.fc-today {
        background: #212529;
    }

    .fc-content {
    text-align: center;
    }
     #model-show{
        width:80%;
        margin-left:0%;
        text-align:center;
    }
    #model-close{
        /*font-size:10px;*/
      
 
    }
    *hr{
        background: black;
    }
    .fc-divider .fc-widget-header{
        background: black;
    }
    .fc-event {
    margin-bottom: 10px;
    height: 20px;
    width: 80px;
    margin-left: 17px;
    border-radius: 8px;
}

    .model{
        position: absolute;
        height : auto;
        top: 10%;
        left: 10%;
        z-index: 999999999999999999;
        background: #383434;
        display: none;
        padding: 50px 20px;
        box-shadow: 0px 0px 10px 0px grey;
    }
    .model-content{
        width: 91%;
        font-size:20px;
        display: flex;
        justify-content: flex-end;
    }
    
    .model-content a{
        font-size: 30px;
        color: white;
        padding : 10px;
        border : 1px solid white;
        border-radius: 50px 50px 50px 50px;
    }
    
    .p-2 {
    padding: .5rem!important;
    border-radius: 10px;
    }
     .content-wrapper {
      min-height: 0px !important;
    }
    
        @media (min-width: 768px){
        .customer-hidden{
            display : none;
        }
    }
    
     .fc-event-container a{
       width : auto !important;
       text-align : center;
   }
   .fc-axis
    {
       display:none !important;
    }
    .fc-unthemed .fc-divider, .fc-unthemed .fc-list-heading td, .fc-unthemed .fc-popover .fc-header {
    background: #191a1b;
    }
    .fc-unthemed .fc-divider, .fc-unthemed .fc-list-heading td, .fc-unthemed .fc-popover .fc-header {
    background: #212529;
    } 
    hr.fc-divider.fc-widget-header {
    display: none;
    }
    .fc-scroller.fc-time-grid-container {
    display: none;
    }

  </style>

</head>
<body class="hold-transition sidebar-mini" style="background-color:#212529;" font-family: 'Montserrat';font-size: 22px;>
<div class="wrapper"style="background-color:#212529;">

  
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand  navbar-light " style="background-color:#212529;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item" >
        <a style="color:#CACFD2;" class="nav-link"  data-widget="pushmenu" href="#"><i class="fa fa-bars "></i></a>
      </li>
      
      
    </ul>
    
     <form class="form-inline ml-5 rounded" method="post" action="{{url('admin/search')}}"style="background-color:#CACFD2;">
          @csrf
      <div class="input-group input-group-sm">
        <input  style="background-color:#CACFD2 ;border-radius: 20px;" class=" form-control form-control-navbar border border-secondary rounded" name="search" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button style="background-color:#CACFD2 ;" class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      
      <li class="nav-item mt-2">
        <div class="user-panel  text-center" >
        <div class="image h4" style="color:#CACFD2;">
          <i class="fas fa-user-circle"></i>
        </div>
        </li><!-- profile-->&nbsp;&nbsp;
        <li class="mt-2">
        <div class="info">
          <a style="color:#CACFD2;" href="{{url('admin/setting/update-profile')}}" class="d-block text-light" >{{Auth::User()->first_name}} &nbsp;{{Auth::User()->last_name}}</a>
        </div>
        </li>
        
      </div>
      
      
      
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4"  style="background-color:#212529;">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">

      <span class="brand-text font-weight-light ml-5">Salon Caleandar</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar"style="background-color:#212529;">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 text-center"style="background-color:#212529;">
        <div class="image h3 text-light">
          <i class="fas fa-user-circle"></i>
        </div>
        <br>
        <div class="info">
          <a href="{{url('admin/setting/update-profile')}}" class="d-block">{{Auth::User()->first_name}} &nbsp;{{Auth::User()->last_name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2" style="background-color:#212529;" >
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           <li class="nav-item " font-family: 'Montserrat';font-size: 22px;>
            <a href="{{url('/')}}" class="nav-link ">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                
                DASHBOARD
          
              </p>
            </a>
            <!-- dashboard end -->
          </li>

          <li class="nav-item "font-family: 'Montserrat';font-size: 22px;>
            <a href="{{route('admin.customer.all-customer')}}" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                  CUSTOMER
              </p>
            </a>
          </li>
          
         

          <li class="nav-item"font-family: 'Montserrat';font-size: 22px;>
            <a href="{{route('admin.employee.all-employee')}}" class="nav-link">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                EMPLOYEE
              
              </p>
            </a>
            
          </li>
          
          
         
          
          
          <li class="nav-header">ACTIVITIES</li>
          <li class="nav-item"font-family: 'Montserrat';font-size: 22px;>
            <a href="{{route('admin.fullcalendar')}}" class="nav-link">
              <i class="nav-icon fa fa-calendar"></i>
              <p>
               CALENDER
              </p>
            </a>
          </li>
          <li class="nav-item "font-family: 'Montserrat';font-size: 22px;>
            <a href="{{route('admin.customer.all-customer')}}" class="nav-link">
              <i class="nav-icon fa fa-envelope-o"></i>
              <p> 
                APPOINTMENTS
              </p>
            </a>
          </li>


          <li class="nav-item has-treeview"font-family: 'Montserrat';font-size: 22px;>
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                SETTINGS
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item"font-family: 'Montserrat';font-size: 22px;>
                <a href="{{url('admin/setting/update-profile')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>UPDATE PROFILE</p>
                </a>
              </li>
              <li class="nav-item"font-family: 'Montserrat';font-size: 22px;>
                <a href="{{url('admin/setting/new-admin')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>NEW ADMIN</p>
                </a>
              </li>
            </ul>
          </li>
          
          
          <!--<li class="nav-header">SETTINGS</li>-->
          <!--<li class="nav-item">-->
          <!--  <a href="{{route('admin.setting.update-profile')}}" class="nav-link">-->
          <!--    <i class="nav-icon fa fa-circle-o text-danger"></i>-->
          <!--    <p class="text">UPDATE PROFILE</p>-->
          <!--  </a>-->
          <!--</li>-->
          <!--<li class="nav-item">-->
          <!--  <a href="{{route('admin.setting.reset-passsword')}}" class="nav-link">-->
          <!--    <i class="nav-icon fa fa-circle-o text-warning"></i>-->
          <!--    <p>CHANGE PASSWORD</p>-->
          <!--  </a>-->
          <!--</li>-->
          
          <!--<li class="nav-item">-->
          <!--  <a href="{{route('register')}}" class="nav-link">-->
          <!--    <i class="nav-icon fa fa-circle-o text-warning"></i>-->
          <!--    <p>New Admin</p>-->
          <!--  </a>-->
          <!--</li>-->
          
          
          
          <li class="nav-item logout" font-family: 'Montserrat';font-size: 22px; >
            <a href="{{url('admin/setting/logout')}}" class="nav-link aa">
              <i class="nav-icon fa fa-circle-o text-info"></i>
              <p>LOGOUT</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header"style="background-color:#212529;">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark text-light"><span class="text-light">Salon Calendar</span> </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content" style="background-color:#212529;">

      <div class="container-fluid"style="background-color:#212529;">
        <div class="row" style="background-color:#212529;">
          <!-- /.col -->
          <div class="col-md-9" style="background-color:#212529;">
            <div class="card card-primary">
              <div class="card-body p-0" style="background-color:#18191D;">
                <!-- THE CALENDAR -->
                <div id='calendar'></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-md-3" style="background-color:#18191D;">
            <div class="sticky-top mb-3"style="background-color:#212529;">
              <div class="card"style="background-color:#212529;">
                  
                <div class="card-body p-0">

                    <div class="row text-center">
                            <h4 class="text-danger px-3">Date : <?php echo $date; ?></h4>
                                    <h5 class="text-info px-3">Total Appointments : <?php echo $count; ?> </h5>
                                    <!--<a href="{{ url('/admin/customer/add-customer') }}" class="btn btn-primary btn-sm mx-auto mb-3" style="border-radius: 50px;">Add New Customer<i class="fas fa-arrow-right ml-1"></i></a>-->
                               <?php 
                                            
                                            if($count == 0){ echo "<h4 class=\"text-warning text-center\">Sorry this date haven't Appointments.<h4>";}else{ 
                                            $i= 1; foreach($data as $v){ 
                                            
                                            $employee = DB::table('employees')->where('id' , $v['employee_id'])->first();
                                            
                                            ?>
                                <div class="col-md-12">
                                    
                                    <div  class="p-2 mb-3 text-white" style="background-color:{{$v->color_code}}">
                                           
                                                <span class="">Customer <?php echo ' ' . $i++ ; ?> </span>
                                                <h3 class="info-box-number"><span><?php echo $v['time']; ?></span></h3>
                                                <span class="info-box-number">Name : <span><?php echo $v['first_name'] .' '. $v['last_name']; ?></span></span>
                                                <span class="info-box-number">Phone : <span><?php echo $v['phone']; ?></span></span>
                                                <span class="info-box-number">Mail : <span><?php echo $v['email']; ?></span></span>
                                                <span class="info-box-number">Employee Name : <span><?php echo $employee->first_name . ' '. $employee->last_name; ?></span></span>
                                                 <span class="info-box-number">Comment : <span><?php echo $v['comment']; ?></span></span>
                                                <!--<a href="{{ url('/admin/all/customers/'.$v->date) }}" class="btn btn-primary btn-sm my-2" style="border-radius: 50px;">Show Details <i class="fas fa-arrow-right ml-1"></i></a>-->
                                                 <button type="button" class="btn btn-primary btn-sm my-2 viewData" id="{{$v->id}}" data-toggle="modal" data-target="#customerView"style="border-radius: 50px;">Show Details <i class="fas fa-arrow-right ml-1"></i></button>
                                           
                                        </div>
                                        
                                    </div><?php }} ?>
                                </div>
      

                </div>
              </div>


            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
      
      
      
      <!-- Modal  Customer Details -->
        <div class="modal fade" id="customerView" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
        
                    <div class="modal-body" style="background-color:#212529;width:110%;">
                      <!--  <table class="table table-striped table-dark py-2">-->
                      <!--  <thead class="text-center">-->
                      <!--      <tr>-->
                      <!--          <th scope="col">First Name</th>-->
                      <!--          <th scope="col">Last Name</th>-->
                      <!--          <th scope="col">Email</th>-->
                      <!--          <th scope="col">Mobail</th>-->
                      <!--          <th scope="col">Date</th>-->
                      <!--      </tr>-->
                      <!--  </thead>-->
                      <!--  <tbody class="text-center">-->
                      <!--      <tr>-->
                      <!--          <td id="first_name"></td>-->
                      <!--          <td id="last_name"></td>-->
                      <!--          <td id="email"></td>-->
                      <!--          <td id="phone"></td>-->
                      <!--          <td id="date"></td>-->
                      <!--      </tr>-->
                      <!--  </tbody>-->
                      <!--</table>-->
                      <section class="">
                            <div class="" >
                                <div class=" text-light " style="margin-left:30%; ">
                    
                                    <p class="card-text">
                                        <span><strong>First Name:&nbsp;&nbsp;</strong> <sapn id="first_name"></sapn> </span><br>
                                        <span><strong>Last Name:&nbsp;&nbsp;</strong><sapn id="last_name"</sapn></span><br>
                                        <span><strong>Email:&nbsp;&nbsp;</strong><sapn id="email"</sapn></span><br>
                                        <span><strong>Phone:&nbsp;&nbsp;</strong><sapn id="phone"</sapn></span><br>
                                        <span><strong>Date:&nbsp;&nbsp;</strong><sapn id="date"</sapn></span><br>
                                        <span><strong>time:&nbsp;&nbsp;</strong><sapn id="time"</sapn></span><br>
                                        <span><strong>comment:&nbsp;&nbsp;</strong><sapn id="comment"</sapn></span><br>
                                    </p>
                                </div>
                            </div>
                   </div>
              <div class="modal-footer" style="background-color:#212529;width: 110%;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        
        <style>
      @media screen and (max-width: 576px) {
      .m{
      width:199%;
         }
        }
        
        .in{
            width:60%;
            margin-left:20px;
            height:30px;
        }
      </style>
      
               <!-- Modal -->
   <div class="model m" style="background-color:#212529;" id="model-show">
        <div class="model-content">
        <div class="">
            <form class="form-inline" action="{{url('admin/customer/search-customer')}}" method="post">
                @csrf
               <input style="background-color: black;color:white; border:none;" class="form-control in" type="text" name="search_customer"  placeholder="existing customer is choose for new appointment" required value="">
                <button style="background-color:#CACFD2 ;" class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
            </form>
            
        </div>
        &nbsp;&nbsp;
        
        </div>
            <section>
  <section class="row justify-content-center" style="font-family: 'Montserrat', 'sans-serif';">
    <section class="col-md-10 col-sm-12 col-12 col-lg-10">
      <form class="" action="{{route('admin.customer.store-customer')}}" method="post">
        @csrf
        <div class="row"><!--customer infor form star-->
          <legend class="text-light font-weight-bold h5">CUSTOMER INFO</legend>
          <div class="col-md-4 col-sm-12 col-lg-4 col-12">
            <label class="h6 text-light" for=""> First Name</label>
            <input style="background-color: black;color:white; border:none;" class="form-control" type="text" name="first_name" placeholder="First Name " required value="">
          </div>
          <div class="col-md-4 col-sm-12 col-lg-4 col-12">
            <label class="h6 text-light" for=""> Last Name</label>
            <input style="background-color: black;color:white; border:none;" class="form-control" type="text" name="last_name" placeholder="Last Name " required value="">
          </div>
          <div class="col-md-4 col-sm-12 col-lg-4 col-12">
            <label class="h6 text-light" for=""> Phone</label>
            <input style="background-color: black;color:white; border:none;" class="form-control" type="number" name="phone" placeholder="Phone Number " required value="">
          </div>
        </div><!--customer infor form end-->
        <hr>
        <div class="row"><!--customer socilite start -->
          <legend class="text-light font-weight-bold h5">CUSTOMER SOCIALITE INFO</legend>
          <div class="col-md-4 col-sm-12 col-lg-4 col-12">
            <label class=" h text-light" for=""> Email</label>
            <input style="background-color: black;color:white; border:none;" class="form-control" type="email" name="email" placeholder="Email address" required  value="">
          </div>
          <div class="col-md-4 col-sm-12 col-lg-4 col-12">
            <label class="h text-light" for=""> Whatsapp</label>
            <input style="background-color: black;color:white; border:none;" class="form-control" type="number" name="whatsapp" placeholder="Whatsapp number "  value="">
          </div>
          <div class="col-md-4 col-sm-12 col-lg-4 col-12">
            <label class=" h text-light" for=""> Facebook</label>
            <input style="background-color: black;color:white; border:none;" class="form-control" type="text" name="facebook" placeholder="Facebook account "  value="">
          </div>
        </div><!--customer socilite end -->
        <hr>
        <div class="row"><!--customer schdule start -->
          <legend class="text-light font-weight-bold h5">CUSTOMER SCHEDULE INFO</legend>
          <div class="col-md-4 col-sm-12 col-lg-4 col-12">
            <label class=" h6 text-light" for="">Employee Select</label>
            <select style="background-color: black;color:white; border:none;" required class="form-control" name="employee_id">
              <option value="">Select Employee</option>
              @foreach(App\Employee::where('status',1)->get() as $v_emp)
                <option value="{{$v_emp->id}}">{{$v_emp->first_name}}&nbsp;{{$v_emp->last_name}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-4 col-sm-12 col-lg-4 col-12">
            <label class=" h6 text-light" for="">Schedule Date</label>
            <input style="background-color: black;color:white; border:none;" class="form-control" type="date" name="date" placeholder=" " required value="">
          </div>
          <div class="col-md-4 col-sm-12 col-lg-4 col-12">
            <label class=" h6 text-light" for="">Schedule Time</label>
            <input style="background-color: black;color:white; border:none;" class="form-control" type="time" name="time" placeholder="" required value="">
          </div>
        </div><!--customer schedule end -->
        <hr>
         <div class="row"><!--customer schdule Date -->
          <legend class="text-light font-weight-bold h5"> CUSTOMER REMINDER DATE</legend>
          <div class="col-md-6 col-sm-12 col-lg-6 col-12">
            <label class="h6 text-light" for=""> Date One</label>
            <input style="background-color: black;color:white; border:none;" class="form-control" type="datetime-local" name="reminderDate_one" placeholder=" "  value="">
          </div>
          <div class="col-md-6 col-sm-12 col-lg-6 col-12">
            <label class="h6 text-light" for=""> Date Two</label>
            <input style="background-color: black;color:white; border:none;" class="form-control" type="datetime-local" name="reminderDate_two" placeholder=""  value="">
          </div>
          <div class="col-md-6 col-sm-12 col-lg-6 col-12">
            <label class="h6 text-light" for=""> Date Three</label>
            <input style="background-color: black;color:white; border:none;" class="form-control" type="datetime-local" name="reminderDate_three" placeholder=""  value="">
          </div>
          <div class="col-md-6 col-sm-12 col-lg-6 col-12">
            <label class="h6 text-light" for=""> Date Four</label>
            <input style="background-color: black;color:white; border:none;" class="form-control" type="datetime-local" name="reminderDate_four" placeholder=""  value="">
          </div>
        </div><!--customer schedule Date end -->
        <hr>
        
        <div class=""><!--comment start-->
          <label class="font-weight-bold h5 text-light" for="">Comment Here</label>
          <textarea style="background-color: black;color:white; border:none;" class="form-control" name="comment" placeholder="Enter write the Comment" required rows="4" cols="40"></textarea>
        </div><!--comment end -->
        <input type="hidden" name="status" value="0" >
        <div class="float-right mt-3">
          <input class="btn btn-info" type="submit" name="btn-customer" value="Add Customer">
          <a href="#" class="btn btn-danger" id="model-close" onclick="model_close()">Close</a>
        </div>
      </form>
    </section>
  </section>
</section>
    </div><!-- Model --> 
    
    </section>
    <!-- /.content -->
  </div>



  <!-- /.control-sidebar -->
</div>


<!-- jQuery -->
<script src="{{asset('back')}}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('back')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{asset('back')}}/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('back')}}/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('back')}}/plugins/knob/jquery.knob.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('back')}}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="{{asset('back')}}/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('back')}}/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('back')}}/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('back')}}/dist/js/demo.js"></script>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>



<script src='https://cdn.jsdelivr.net/npm/moment@2.24.0/min/moment.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.min.js'></script>
<script src="{{asset('calender/js/fullcalendar.min.js')}}"></script>

<script>
 
        
$(document).ready(function(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
   $('.viewData').click(function(){
     var id = $(this).attr("id");

     $.ajax({
       url:"/admin/viewcustomers",
       method:"get",
       data: {id : id},
       success:function(data){
            document.getElementById("first_name").innerHTML= data.first_name;
            document.getElementById("last_name").innerHTML= data.last_name;
            document.getElementById("email").innerHTML= data.email;
            document.getElementById("phone").innerHTML= data.phone;
            document.getElementById("date").innerHTML= data.date;
            document.getElementById("time").innerHTML= data.time;
            document.getElementById("comment").innerHTML= data.comment;
             $('#customerView').modal("show");
       }
     });
   });
});

</script>

  <script>
    var funvalue;
    
    function setcustomer(x) {
          if (x.matches) { // If media query matches
             funvalue = "";
          } else {
            funvalue  = "";
          }
        }
        
        var x = window.matchMedia("(max-width: 768px)");
        setcustomer(x); // Call listener function at run time
        x.addListener(setcustomer); // Attach listener function on state changes
    
    
     function model_close()
    {
        document.getElementById('model-show').style.display = "none";
    }
    
      $(function() {

      $('#calendar').fullCalendar({
          header: {
                left: 'prev,next',
                center: 'title',
                right: ''
                },
         dayClick: function(date, jsEvent, view) {

           
       document.getElementById('model-show').style.display = "block";
          },
        defaultView: 'month',
        viewRender: function(date, view, element) {
            
          $.ajax({
            url: "{{ url('admin/calendarValue') }}",
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $("#calendar").fullCalendar( 'refetchEvents' );
                  for(var i=0; i<data.length; i++){
                    title=data[i].views+  funvalue;
                    date=data[i].date;
                    $('#calendar').fullCalendar('renderEvent', {
                        title: title,
                        backgroundColor: '#9500FF',
                        color : '#9500FF',
                        start: date,
                        allDay: true,
                         url: "https://deluxelover.com/admin/calendarCustomer?date=" + date,
                    });
                  }


              },
              error : function (data) {

                alert('Ghorer Dim');
              }
          });
        }
      });
    });

  </script>

</body>
</html>


