<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable=[
      'first_name',
      'last_name',
      'present_location',
      'parmanent_location',
      'comment_box',
      'join_date',
      'salary',
    ];

}
