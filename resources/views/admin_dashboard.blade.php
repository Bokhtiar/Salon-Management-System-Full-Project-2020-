
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
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('back')}}/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('back')}}/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('back')}}/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('back')}}/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('back')}}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="https://kit.fontawesome.com/ba78558982.js" crossorigin="anonymous"></script><!-- icon link -->
  <style>
  ul .logout:hover {
  background: red;
  display: block;
}
    
    body{
        background-color:#212529;
    }
     .content-wrapper {
      min-height: 0px !important;
    }
</style>
</head>
<body class="hold-transition sidebar-mini" style="background-color:#212529;">
<div class="wrapper">

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
      <span class="brand-text font-weight-light text-center ml-5">Salon Calendar</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 text-center">
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
                  CUSTOMERS
              </p>
            </a>
          </li>
          
         

          <li class="nav-item"font-family: 'Montserrat';font-size: 22px;>
            <a href="{{route('admin.employee.all-employee')}}" class="nav-link">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                EMPLOYEES
              
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
            <a href="{{url('admin/customer/all-app')}}" class="nav-link">
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
                SETTING
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
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content" style="background-color:#212529;">
      @yield('admin_content')
    </section>
    <!-- /.content -->
  </div>


  <!-- Control Sidebar -->

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
<!-- jvectormap -->
<script src="{{asset('back')}}/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{asset('back')}}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('back')}}/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{asset('back')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="{{asset('back')}}/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('back')}}/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="{{asset('back')}}/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{asset('back')}}/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('back')}}/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('back')}}/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('back')}}/dist/js/demo.js"></script>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" charset="utf-8"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js" charset="utf-8"></script>





  @if(Session::has('insert'))
    <script type="text/javascript">
      swal("Inserted Data","Added Sucessfully...","success")
    </script>
  @endif


  @if(Session::has('update'))
    <script type="text/javascript">
      swal("Updated Data","Update Sucessfully...","success")
    </script>
  @endif

  @if(Session::has('delete'))
    <script type="text/javascript">
      swal("delete Successfully","delete secessfully","success")
    </script>
  @endif

  @if(Session::has('inactive'))
    <script type="text/javascript">
      swal("Incomplate","Incomplate Unsuccessfully","success")
    </script>
  @endif

  @if(Session::has('Active'))
    <script type="text/javascript">
      swal("Complate","Complate Successfully","success")
    </script>
  @endif

  @if(Session::has('reset_password'))
    <script type="text/javascript">
      swal("Enter your valid Password","Dont matched the password plz inter your valid password...","success")
    </script>
  @endif
  
  @if(Session::has('exists'))
    <script type="text/javascript">
      swal("Email Exists"," E-mail Already Exists...","success")
    </script>
  @endif


<script type="text/javascript">

  $(document).on("click","#delete",function(e){
  e.preventDefault();
  var link=$(this).attr("href");
  bootbox.confirm("are you want to delete",function(confirmed){
    if(confirmed){
      window.location.href=link;
  };
  });
  });
</script>
</body>
</html>
