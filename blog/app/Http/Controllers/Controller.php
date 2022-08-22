<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLoginRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Admin;
use Hash;
use Illuminate\Http\Request;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    //php artisan ui bootstrap --auth
    //أحمد عبدالرحيم أحمد محمد

//    public function viewAdminLogin() {
//        return view('guard.login');
//    }
}
