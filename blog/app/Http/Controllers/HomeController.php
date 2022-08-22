<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function form() {
        return view('dropzone');
    }

    public function dropzoneImage(Request $request) {
        $image = $request->file;
        return var_dump($image);
        // return $image;
        $image_name = time() . '.' .$image->extension();
        $image->move('assets/images/products',$image_name);
        return response()->json(['success' => 'Successfully']);
    }


    public function custom() {
        return view('custom');
    }

    public function jquery() {
        return view('jquery');
    }

    public function rejectSubmitData(Request $request) {
        return $request->arr;
    }

}
