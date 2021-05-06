@extends('admin_dashboard')
@section('admin_content')
<!-- actully this is password reset page, currently change the page add the new admin page and password reset page remove  -->



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <title>calender</title>
  </head>


  <body style="background-color: #202125; color:#fff; height:700px;" >




		<style media="screen">
			.first-lear{
				height: 250px;
				width: 250px;
				background-color: #F5F5F5;
				margin-top: 20%;
				margin-left: 20%;
				border-radius: 100%;
				position: absolute;
			}
			.secound-lear{
				height:120px;
				width: 140px;
				background: #34414E;
				text-align: center;
				position: relative;
				position: absolute;
				margin-top: 25%;
				margin-left: 22%;
			}
			.thard-lear{
				height:100px;
				width: 120px;
				background: #465866;
				text-align: center;
				position: relative;
				position: absolute;
				margin-top: 7%;
				margin-left: 7%;
			}
			.font{
				height:50px;
				width: 70px;
				background: #465866;
				text-align: center;
				color: #75828D;
				position: relative;
				margin-top: 22%;
				margin-left: 20%;
			}
		</style>


		<section class="row p-5">
      <div class="col-md-6">
        <div class="">
          <div class="first-lear" >
              <div class="secound-lear">
                <div class="thard-lear">
                  <div class="font">
                    <i class=" h1 far fa-user"></i>
                  </div>
                </div>
              </div>
          </div>
        </div><!--image -->
      </div>
      <div class="col-md-6 justify-content-center" style="margin-top: 10%;">
        <div class=" col-md-8">
          <h3 class="text-center text-light bg-info rounded">
            ADD NEW REGISTER
          </h3>

        <form class="" action="{{url('admin/setting/store')}}" method="post">
            @csrf
          <div class="">
            <label for="">FIRST NAME</label>
            <input type="text" class="form-control" placeholder="first name" name="first_name" value="" required>
          </div>
          <div class="">
            <label for="">LAST NAME</label>
            <input type="text" class="form-control" placeholder="last name" name="last_name" value="" required>
          </div>
          <div class="">
            <label for="">E-MAIL</label>
            <input type="email" class="form-control " name="email" placeholder="email" value="" required>
          </div>
          <div class="">
            <label for="">PASSWORD</label>
            <input type="password" class="form-control" placeholder="password" name="password" value="" required>
          </div>
          <div class=" float-right mt-2">
            <input class="btn btn-info" type="submit" name="btn" value="Submit">
          </div>

        </form>
      </div>
</div>



		</section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>

@endsection
