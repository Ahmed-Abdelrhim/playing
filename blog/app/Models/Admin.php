<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $table = 'admins';
    protected $fillable = ['name','email' , 'password','image','created_at','updated_at'];
    protected $hidden = ['created_at','updated_at'];
    public $timestamps = true;

}
