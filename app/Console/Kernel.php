<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use DB;
use App\Employee;
use App\Customer;
use Twilio\Rest\Client;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $data=DB::table('customers')->get();

            foreach($data as $row){
                $threeDayAfter=Date('Y-m-d', strtotime('+3 days'));
                $oneDayAfter=Date('Y-m-d', strtotime('+1 days'));
                $currentDate=Date('Y-m-d');
                $currentTime=Date('H:i');
                $empName = Employee::where('id', $row->employee_id)->first();
                
                $date1 = '';
                $time1 = '';
                $date2 = '';
                $time2 = '';
                $date3 = '';
                $time3 = '';
                $date4 = '';
                $time4 = '';
                
                $timestamp1 = $row->reminderDate_one;
                $timestamp2 = $row->reminderDate_two;
                $timestamp3 = $row->reminderDate_three;
                $timestamp4 = $row->reminderDate_four;
                
                if($timestamp1!=null){
                // dd($timestamp1);
                $splitTimeStamp = explode("T",$timestamp1);
                $date1 = $splitTimeStamp[0];
                $time1 = $splitTimeStamp[1];
                }
                if($timestamp2!=null){
                    $splitTimeStamp = explode("T",$timestamp2);
                $date2 = $splitTimeStamp[0];
                $time2 = $splitTimeStamp[1];
                }
                if($timestamp3!=null){
                    $splitTimeStamp = explode("T",$timestamp3);
                $date3 = $splitTimeStamp[0];
                $time3 = $splitTimeStamp[1];
                }
                if($timestamp4!=null){
                    $splitTimeStamp = explode("T",$timestamp4);
                $date4 = $splitTimeStamp[0];
                $time4 = $splitTimeStamp[1];
                }

                //Before three day send massege
                if(($currentDate == $date1 and $currentTime == $time1) or ($currentDate == $date2 and $currentTime == $time2) or ($currentDate == $date3 and $currentTime == $time3) or ($currentDate == $date4 and $currentTime == $time4)){
                    //for mobile sms
                    try {
                    // Get credentials from .env /
                    //Mobile send message Code /
                        $token = getenv("TWILIO_AUTH_TOKEN");
                        $twilio_sid = getenv("TWILIO_SID");
                        $twilio_verify_sid = getenv("TWILIO_VERIFY_SID");
                
                        $twilio = new Client($twilio_sid, $token);
                        $twilio->messages->create('+88'.$row->phone, array(
                        'From' => '+12029725998',
                        'Body' => 'Dear customer('.$row->first_name. $row->last_name.'), we look forward for your visit in '.$row->date.'days. '.$row->time. ' time. Your hairstylist(' . $empName->first_name . $empName->last_name . ').'
                        ));
                        // Whats App send message Code /
                        
                    } catch (\Throwable $th) {
                        dd($th);
                    }
                    //for whatapp sms
                    try {
                    $twilio = new Client($twilio_sid, $token);
                    $twilio->messages->create('whatsapp:+88' . $row->whatsapp, array(
                        'From' => 'whatsapp:+14155238886',
                        'Body' => 'Dear customer(' . $row->first_name . $row->last_name . '), we look forward for your visit in ' . $row->date . 'days. ' . $row->time . ' time. Your hairstylist(' . $empName->first_name . $empName->last_name . ').'
                    ));
                    } catch (\Throwable $th) {
                        dd($th);
                    }
                }
            }
        })->everyFiveMinutes();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
