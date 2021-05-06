@extends('admin_dashboard')
@section('admin_content')

<!-- Register -->
      <div class="bg-black"style=" background-color: #212529; color:white;">
         <div class="container"style=" background-color: #212529; color:white;">
            <div class="row justify-content-center align-items-center d-flex vh-100">
               <div class="col-lg-4 mx-auto">
                  <div class="osahan-login py-4">
                     <div class="text-center mb-4">
                        <a href="index.html"><img src="images/fav.svg" alt=""></a>
                        <h5 class="font-weight-bold mt-3 mr-5">About me</h5>
                        <p class="text-muted mr-5">Make the most of your professional life</p>
                     </div>
                     <form action="{{url('admin/setting/store-update-profile/'.Auth::id())}}" method="post">
                       @csrf
                        <div class="form-row">
                           <div class="col">
                              <div class="form-group">
                                 <label class="mb-1">First name</label>
                                 <div class="position-relative icon-form-control">
                                    <i class="mdi mdi-account position-absolute"></i>
                                    <input style="background-color: ;color:; border:none;" placeholder="Enter your first name" type="text" class="form-control" name="first_name" value="{{Auth::User()->first_name}}">
                                 </div>
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-group">
                                 <label class="mb-1">Last name</label>
                                 <div class="position-relative">
                                    <input style="background-color: ;color:; border:none;" placeholder="Enter your last name" type="text" name="last_name" class="form-control" value="{{Auth::User()->last_name}}">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label class="mb-1">Email</label>
                           <div class="position-relative icon-form-control">
                              <i class="mdi mdi-email-outline position-absolute"></i>
                              <input style="background-color: ;color:; border:none;" placeholder="" type="email" class="form-control" name="email" value="{{Auth::User()->email}}" >
                           </div>
                        </div>


                        <button class="btn btn-success text-uppercase" type="submit">Update Profile </button>

                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End Register -->
      
      
      
   
      
      <h2>password reset</h2>
      

<br><br>
<div class="row justify-content-center">
  <div class="col-md-6 col-lg-6 col-sm-12">


  <legend class="text-center text-light h5">Change Password</legend>

  <form method="POST" action="{{ url('admin/setting/change-password') }}">
      @csrf


      <div class="form-group row">
          <label  for="password" class="col-md-4 col-form-label text-light h5 text-md-right">{{ __('Password') }}</label>

          <div class="col-md-6">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="old_password" required autocomplete="new-password">

          </div>
      </div>



      <div class="form-group row">
          <label for="password" class="col-md-4 col-form-label text-light h5 text-md-right">New Password</label>

          <div class="col-md-6">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

          </div>
      </div>


      <div class="form-group row">
          <label for="confirm_password" class="col-md-4 col-form-label text-light h5 text-md-right">{{ __('confirm Password') }}</label>

          <div class="col-md-6">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">

          </div>
      </div>









      <div class="form-group row mb-0">
          <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary">
                  {{ __('Reset Password') }}
              </button>
          </div>
      </div>
  </form>
</div><!-- end of Password change area --->
</div>




@endsection
