<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;
use App\Employee;
use App\User;
use App\Todo;
use Carbon\Carbon;

class adminDashboardController extends Controller
{
      public function index(){
        $amout_customer=Customer::all()->count();
        $amout_employee=Employee::all()->count();
        $amout_admin_owner=User::all()->count();
        $amout_todo=Todo::all()->count();
        $startDate = Carbon::today();
        $endDate = Carbon::today()->addDays(5);
        $customer = Customer::whereBetween('date', [$startDate, $endDate])->get();
        return view('admin.index',compact('customer','amout_customer','amout_employee','amout_admin_owner','amout_todo'));
      }
      
        public function search(Request $request){
        $search=$request->search;
        $customer=Customer::where('first_name', 'like','%'.$search.'%')
                          ->orWhere('last_name', 'like','%'.$search.'%')
                          ->orWhere('email', 'like','%'.$search.'%')
                          ->orWhere('phone', 'like','%'.$search.'%')
                          ->get();
        return view('admin.todo.all_todo',compact('customer'));
      }
      
      
      public function all_admin(){
       return view('admin.todo.all_admin');   
      }
}
