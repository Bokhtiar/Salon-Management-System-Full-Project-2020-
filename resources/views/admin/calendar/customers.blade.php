@extends('admin_dashboard')
@section('admin_content')
    <style>
        a.btn.btn-success {
            width: 100px;
        }
    </style>

    <div class="py-5">
        <span class="font-weight-bold h4 text-light"> OUR&nbsp; CUSTOMER &nbsp;LIST</span>


    </div><!--heading  -->
    <table class="table table-striped table-dark py-2">
        <thead class="text-center">
        <tr>
            <th scope="col">Sl</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Mobail</th>
            <th scope="col">Date</th>
        </tr>
        </thead>
        <tbody class="text-center">
        @php($key = 1);
        @foreach($dateWishCustomers as $v_customer)
            <tr>
                <th scope="row">{{$key++}}</th>
                <td>{{$v_customer['first_name']}}</td>
                <td>{{$v_customer['last_name']}}</td>
                <td>{{$v_customer['email']}}</td>
                <td>{{$v_customer['phone']}}</td>
                <td>{{$v_customer['date']}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection
