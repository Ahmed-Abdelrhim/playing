<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name' , 'email' , 'phone','salary' , 'job' ,'created_at','updated_at'];
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = true;
}
