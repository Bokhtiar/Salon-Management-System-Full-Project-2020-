@extends('admin_dashboard')
@section('admin_content')

<div class="py-5">
  <span class="font-weight-bold h4 text-light"> &nbsp; TO DO &nbsp;NEW</span>
  <span class="float-right"><a class="btn btn-info text-light font-weight-bold" href="{{route('admin.todo.all-todo')}}">ALL TODO</a> </span>
</div><!--heading  -->

<section class="row justify-content-center">
  <div class="col-lg-6 col-md-6 col-sm-12 col-12">
      <form class="" action="{{url('admin/todo/update-todo/'.$todo_edit->id)}}" method="post">
        @csrf
        <div class="form-group">
          <label class="font-weight-bold h5 text-light" for="">Todo Title</label>
          <input style="background-color: black;color:white; border:none;" class="form-control" type="text" name="title" placeholder="Todo Title" required value="{{$todo_edit->title}}">
        </div>

        <div class="form-group">
          <label class="font-weight-bold h5 text-light" for="">Start time</label>
          <input style="background-color: black;color:white; border:none;" class="form-control" type="time" name="start_time"  required value="{{$todo_edit->start_date}}">
        </div>

        <div class="form-group">
          <label class="font-weight-bold h5 text-light" for="">End Time</label>
          <input style="background-color: black;color:white; border:none;" class="form-control" type="time" name="end_time" placeholder="Todo Title" required value="{{$todo_edit->end_date}}">
        </div>

        <div class="float-right">
          <input type="submit" class="btn btn-info" name="btn" value="Update Todo">
        </div>
      </form>
  </div>
</section>



@endsection
