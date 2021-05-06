<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable=[
      'employee_id','first_name','last_name','email','phone','whatsapp','facebook','comment','date','time','status','reminderDate_one','reminderDate_two','reminderDate_three','reminderDate_four',
    ];


    public function employee(){
      return $this->belongsTo(Employee::class);
    }
}
