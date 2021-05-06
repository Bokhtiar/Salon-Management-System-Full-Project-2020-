<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employee;
use App\Customer;
use DB;
use Session;
use Response;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_employee=Employee::latest()->get();
            return view('admin.employee.all_employee',compact('all_employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employee.add_employee');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
        'first_name'=>'required',
        'last_name'=>'required',
        'present_location'=>'required',
        'parmanent_location'=>'required',
        'comment_box'=>'required',
        'join_date'=>'required',
        'salary'=>'required',
      ]);

        $employee=new Employee;
          $employee['first_name']=$request->first_name;
          $employee['last_name']=$request->last_name;
          $employee['present_location']=$request->present_location;
          $employee['parmanent_location']=$request->parmanent_location;
          $employee['comment_box']=$request->comment_box;
          $employee['join_date']=$request->join_date;
          $employee['salary']=$request->salary;
        $employee->save();
        Session::flash('insert','Customer Added Sucessfully...');
        return redirect()->route('admin.employee.all-employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function inactive($id)
    {
        $inactive=Employee::find($id);
          $inactive['status']=0;
        $inactive->save();
        Session::flash('inactive','inactive Sucessfully...');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    

    public function active($id)
    {
        $active=Employee::find($id);
          $active['status']=1;
        $active->save();
        Session::flash('Active','active Sucessfully...');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function profile($id)
    {
        $profile=Employee::find($id);
          return view('admin.employee.profile_employee',compact('profile'));
    }

    public function calendar()
    {
        $date  = date('Y-m-d');
        $dateWishCustomers = Customer::where('date',$date)->get();
        $count = Customer::where('date', $date)->count();
      return view('admin.calendar.index', compact('dateWishCustomers' , 'date', 'count'));
    }

    public function allCustomers($date)
    {
        $dateWishCustomers = Customer::where('date', $date)->get();
        return view('admin.calendar.customers', compact('dateWishCustomers'));
    }
    
    public function viewCustomers(Request $request)
    {
        $customerDetails = Customer::where('id', $request->id)->first();
        return  Response::json($customerDetails);
    }
    
    public function calendarData()
    {

        $data = Customer::select(DB::raw('DATE(date) as date'), DB::raw('count(*) as views'))
        ->groupBy('date')
        ->get();
        return Response($data);
    }
    
    public function calendarCustomer()
    {
        $date = $_GET['date'];
        $data = Customer::where('date', $date)->get();
        $count = Customer::where('date', $date)->count();
        return view('admin.calendar.calendar', compact('data', 'date' , 'count'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_employee=Employee::find($id);
          return view('admin.employee.edit_employee',compact('edit_employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request,[
        'first_name'=>'required',
        'last_name'=>'required',
        'present_location'=>'required',
        'parmanent_location'=>'required',
        'comment_box'=>'required',
        'join_date'=>'required',
        'salary'=>'required',
      ]);
      $employee_update=Employee::find($id);
        $employee_update['first_name']=$request->first_name;
        $employee_update['last_name']=$request->last_name;
        $employee_update['present_location']=$request->present_location;
        $employee_update['parmanent_location']=$request->parmanent_location;
        $employee_update['comment_box']=$request->comment_box;
        $employee_update['join_date']=$request->join_date;
        $employee_update['salary']=$request->salary;
      $employee_update->save();
      Session::flash('update','Customer Updated Sucessfully...');
      return redirect()->route('admin.employee.all-employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_employee=Employee::find($id);
          $delete_employee->delete();
          Session::flash('delete','delete Sucessfully...');
        return redirect()->back();
    }
}
