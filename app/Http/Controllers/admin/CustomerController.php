<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppoinmentMail;
use App\Customer;
use App\Employee;
use Twilio\Rest\Client;
use Session;
use DB;
use Carbon\Carbon;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $all_customer=Customer::latest()->where('role_id',1)->paginate(10);
        return view('admin.customer.all_customer',compact('all_customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //date_default_timezone_set('Asia/Dhaka');   
        return view('admin.customer.add_customer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
       
     
       $color_code = ['#212529', '#17a2b8!important', '#28a745!important', '#ffc107!important','#dc3545!important'];
        $customer=new Customer;
          $customer['employee_id']=$request->employee_id;
          $customer['first_name']=$request->first_name;
          $customer['last_name']=$request->last_name;
          $customer['email']=$request->email;
          $customer['phone']=$request->phone;
          $customer['whatsapp']=$request->whatsapp;
          $customer['facebook']=$request->facebook;
          $customer['comment']=$request->comment;
          $customer['date']=$request->date;
          $customer['role_id']=$request->role_id;
          $customer['reminderDate_one']=$request->reminderDate_one;
          $customer['reminderDate_two']=$request->reminderDate_two;
          $customer['reminderDate_three']=$request->reminderDate_three;
          $customer['reminderDate_four']=$request->reminderDate_four;
          $customer['time']=$request->time;
          $customer['color_code']=$color_code[array_rand($color_code)];


    /*Get Employee Name */    
     $empName = Employee::where('id', $request->employee_id)->first();
    

    // try {
    // /* Get credentials from .env */
    // /* Mobile send message Code */
    //   $token = getenv("TWILIO_AUTH_TOKEN");
    //   $twilio_sid = getenv("TWILIO_SID");
    //   $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");

    //   $twilio = new Client($twilio_sid, $token);
    //   $twilio->messages->create('+88'.$request->phone, array(
    //     'From' => '+12029725998',
    //     'Body' => 'Dear customer('.$request->first_name. $request->last_name.'), we look forward for your visit in '.$request->date.'days. '.$request->time. ' time. Your hairstylist(' . $empName->first_name . $empName->last_name . ').'
    //   ));
    //   /* Whats App send message Code */
      
    // } catch (\Throwable $th) {
    //   dd($th);
    // }
    // try {
    // $twilio = new Client($twilio_sid, $token);
    // $twilio->messages->create('whatsapp:+88' . $request->whatsapp, array(
    //   'From' => 'whatsapp:+14155238886',
    //   'Body' => 'Dear customer(' . $request->first_name . $request->last_name . '), we look forward for your visit in ' . $request->date . 'days. ' . $request->time . ' time. Your hairstylist(' . $empName->first_name . $empName->last_name . ').'
    // ));
    // } catch (\Throwable $th) {
    //   dd($th);
    // }
        $customer->save();
        Mail::to($request->email)->send(new AppoinmentMail($customer));
        Session::flash('insert','Customer Added Sucessfully...');
        return redirect()->route('admin.customer.all-customer');
    }
    
    //old customer appointmnet customer 
     public function app_store(Request $request)
    {
        //dd($request->all());
       
     
       $color_code = ['#212529', '#17a2b8!important', '#28a745!important', '#ffc107!important','#dc3545!important'];
        $customer=new Customer;
          $customer['employee_id']=$request->employee_id;
          $customer['first_name']=$request->first_name;
          $customer['last_name']=$request->last_name;
          $customer['email']=$request->email;
          $customer['phone']=$request->phone;
          $customer['whatsapp']=$request->whatsapp;
          $customer['facebook']=$request->facebook;
          $customer['comment']=$request->comment;
          $customer['date']=$request->date;
          $customer['role_id']=$request->role_id;
          $customer['reminderDate_one']=$request->reminderDate_one;
          $customer['reminderDate_two']=$request->reminderDate_two;
          $customer['reminderDate_three']=$request->reminderDate_three;
          $customer['reminderDate_four']=$request->reminderDate_four;
          $customer['time']=$request->time;
          $customer['color_code']=$color_code[array_rand($color_code)];


    /*Get Employee Name */    
     $empName = Employee::where('id', $request->employee_id)->first();
    

    // try {
    // /* Get credentials from .env */
    // /* Mobile send message Code */
    //   $token = getenv("TWILIO_AUTH_TOKEN");
    //   $twilio_sid = getenv("TWILIO_SID");
    //   $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");

    //   $twilio = new Client($twilio_sid, $token);
    //   $twilio->messages->create('+88'.$request->phone, array(
    //     'From' => '+12029725998',
    //     'Body' => 'Dear customer('.$request->first_name. $request->last_name.'), we look forward for your visit in '.$request->date.'days. '.$request->time. ' time. Your hairstylist(' . $empName->first_name . $empName->last_name . ').'
    //   ));
    //   /* Whats App send message Code */
      
    // } catch (\Throwable $th) {
    //   dd($th);
    // }
    // try {
    // $twilio = new Client($twilio_sid, $token);
    // $twilio->messages->create('whatsapp:+88' . $request->whatsapp, array(
    //   'From' => 'whatsapp:+14155238886',
    //   'Body' => 'Dear customer(' . $request->first_name . $request->last_name . '), we look forward for your visit in ' . $request->date . 'days. ' . $request->time . ' time. Your hairstylist(' . $empName->first_name . $empName->last_name . ').'
    // ));
    // } catch (\Throwable $th) {
    //   dd($th);
    // }
        $customer->save();
        Mail::to($request->email)->send(new AppoinmentMail($customer));
        Session::flash('insert','Customer Added Sucessfully...');
        return redirect('admin/customer/all-app');
    }
    
    
    
    
    
    
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function inactive($id)
     {
         $inactive=Customer::find($id);
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
      public function profile($id)
      {
          $profile=Customer::find($id);
            return view('admin.customer.customer_profile',compact('profile'));
      }

      /**
       * Show the form for editing the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */


     public function active($id)
     {
         $active=Customer::find($id);
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
      public function edit($id)
      {
          $edit_customer=Customer::find($id);
            return view('admin.customer.edit_customer',compact('edit_customer'));
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
        'employee_id'=>'required',
        'first_name'=>'required',
        'last_name'=>'required',
        'phone'=>'required',
        'comment'=>'required',
        'time'=>'required',
        'date'=>'required',
      ]);
      $customer_update=Customer::find($id);
        $customer_update['employee_id']=$request->employee_id;
        $customer_update['first_name']=$request->first_name;
        $customer_update['last_name']=$request->last_name;
        $customer_update['email']=$request->email;
        $customer_update['phone']=$request->phone;
        $customer_update['whatsapp']=$request->whatsapp;
        $customer_update['facebook']=$request->facebook;
        $customer_update['comment']=$request->comment;
        $customer_update['date']=$request->date;
        $customer_update['time']=$request->time;
      $customer_update->save();
      Session::flash('update','Customer Updated Sucessfully...');
      return redirect()->route('admin.customer.all-customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function search(Request $request){

       $search_data=Customer::where('date',$request->date)->get();
        return view('admin.customer.search',compact('search_data'));


     }


     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
    public function destroy($id)
    {
        $customer_delete=Customer::find($id);
          $customer_delete->delete();
          Session::flash('delete','delete Sucessfully...');
        return redirect()->back();

    }
    
    
    /**
     * Show the form for search existing customer a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search_customer_appointment(Request $request)
    {
           $search=$request->search_customer;
           $search_customer=Customer::where('first_name', 'like','%'.$search.'%')
                                        ->orWhere('last_name', 'like','%'.$search.'%')
                                        ->orWhere('phone', 'like','%'.$search.'%')
                                        ->get();
           return view('admin.NewAppointment.show',compact('search_customer'));
    }
    
    
    
     public function appointment_edit_customer($id)
    {
        $edit_customer=Customer::find($id);
           return view('admin.NewAppointment.edite',compact('edit_customer'));
    }
    
     public function all_app()
    {
        
           return view('admin.NewAppointment.all_app');
    }
    
}