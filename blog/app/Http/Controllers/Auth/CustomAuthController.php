<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Hash;
class CustomAuthController extends Authenticatable
{
    //
    public function viewPlay() {
        return view('admin.dashboard');
    }

    public function checkAdminIfExists(AdminLoginRequest $request) {
        if(auth()->guard('admin')->attempt(['email' => $request->email , 'password' => $request->password])) {
            return redirect()->route('dashboard');
        }


        $admin = Admin::find(1);
        if(Hash::check($request->password , $admin->password)) {
            return true;
        }


        else {
            return'Email or password is wrong!';
        }

//        return $request;


    }

    public function data() {
        $admin = Admin::find(1);

        return bcrypt('123456asd');
    }

}
