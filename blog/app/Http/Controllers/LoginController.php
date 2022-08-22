<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLoginRequest;
use App\Models\Admin;
use App\Models\Country;
use App\Models\University;
use App\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;

class LoginController extends Controller
{
    use HasApiTokens;

    //
    public function viewAdminLogin()
    {
        return view('guard.login');
    }

    public function index()
    {
        return view('admin.dashboard');
    }

    public function checkAdminIfExists(AdminLoginRequest $request)
    {
        // if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        $credential = $request->only('email', 'password');
        if (Auth::attempt($credential))
            return redirect()->intended('dashboard');
//        throw ValidationException::withMessages([
//            'email' => 'Email OR password is wrong',
//        ]);
        return redirect()->back()->withErrors(['errors' => 'asdasdasdas']);

    }

    public
    function data()
    {
        $admin = Admin::find(1);

        return bcrypt('123456asd');
    }


    public
    function getUniversities($university_id)
    {
        $uni = University::where('country_id', $university_id)->get();
        echo $uni;
    }


    //google login
    public
    function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public
    function handleProviderGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $this->googleUser($user);
            return redirect()->route('dashboard');
        } catch (InvalidStateException $exception) {
            $user = Socialite::driver('google')->stateless()->user();
            $this->googleUser($user);
            return redirect()->route('dashboard');
            //return $exception;
        }

    }


    public
    function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public
    function handleProviderGithubCallback()
    {
        try {
            $user = Socialite::driver('github')->user();
            $this->googleUser($user);
            return redirect()->route('dashboard');

        } catch (\Exception $exception) {
            $user = Socialite::driver('github')->stateless()->user();
            $this->googleUser($user);
//            return redirect() ->route('dashboard');

        }
    }


    public
    function googleUser($data)
    {
        $user = User::where('email', $data->email)->first();
        if (!$user) {
            $user = new User();
            $user->email = $data->email;
            $user->name = $data->name;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->save();
        }
        Auth::login($user);

    }

    public
    function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }


    public
    function registerSanctum(Request $request)
    {
        $request->validate([
            'name' => 'required | string',
            'email' => 'required |   email |   unique:users,email',
            'password' => 'required | string | min:6 ',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return response()->json([
            'message' => 'Success',
        ]);
    }


    public
    function loginSanctum(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        $user = User::where('email', $request->email)->first();


        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

//        $token = $user->createToken('user_token')->plainText();
//        return $user;
        $token = $user->createToken('token')->plainTextToken;
        return $token;
//        return response()->json([
//            'userToken' => $token,
//        ]);

//        if(auth()->attempt(['email' => $request->email , 'password' => $request->password])) {
//            $token = $request->user()->createToken('userToken')->plainText();
//            return response()->json([
//                'userToken' => $token,
//            ]);
//        }
    }



    public function play(Request $request) {
        if(Auth::user() === $request->user())
            return 'Identical Data';
        return 'Not Identical Data';
    }
}










//SESSION_DOMAIN="${APP_URL}"
//APP_URL=http://localhost:8000

//SESSION_DOMAIN="${APP_URL}"
//APP_URL=http://127.0.0.1:8000


