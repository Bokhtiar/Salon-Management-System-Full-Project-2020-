<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="widh=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <title>Salon Calender</title>
    </head>
    <body>
         @php  $empName = App\Employee::where('id', $user->employee_id)->first(); @endphp
        <p>Dear customer({{$user['first_name']}} {{$user['last_name']}}), we look forward for your visit in {{$user['date']}} days. {{$user['time']}} time. Your hairstylist({{$empName['first_name']}} {{$empName['last_name']}}).</p>
    <p>Thank You</p>
    </body>
</html>