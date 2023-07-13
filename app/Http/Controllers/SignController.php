<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Lessor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;



class SignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

   
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'min:6',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
                
            ],
            're_password' => 'required|same:password',
            'agree-term' => 'required'
        ]);
   
       $user = new Users;
       $user->name = $request -> input('name');
       $user->email = $request -> input('email');
       $user->password = Hash::make($request->input('password'));
       $user->role_id = 1;
       $user->save();
       return redirect('index');
    }

    public function createLessor(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'min:6',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/', 
            ],
            'phone' => 'required',
            'address' => 'required',
            're_password' => 'required|same:password',
            'agree-term' => 'required'
        ]);
       $lessor = new Lessor;
       $lessor->name = $request -> input('name');
       $lessor->email = $request -> input('email');
       $lessor->phone = $request -> input('phone');
       $lessor->address = $request -> input('address');
       $lessor->password = Hash::make($request->input('password'));
       $lessor->role_id = 2;
       $lessor->save();
       return redirect('index');
    }

    
    // public function log(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);


    //     $user = Users::where('email', $request -> input('email'))->where('role_id', 1)->first();
    //     $lessor = Lessor::where('email', $request -> input('email'))->where('role_id', 2)->first();
    //     $admin = Users::where('email', $request -> input('email'))->where('role_id', 3)->first();

    //     if ($user && Hash::check($request->password, $user->password)) {
    //         // Authentication successful
    //         dd(Auth::login($user));
    //         Auth::login($user);  // Log in the user
    //         $user->status = 'online';
    //         $request->session()->regenerate();
    //         return redirect()->intended('index');
    //     } else if ($lessor && Hash::check($request->password, $lessor->password)) {
    //         // Authentication successful
    //         dd(Auth::login($lessor));
    //         Auth::login($lessor);  // Log in the lessor
    //         $request->session()->regenerate();
    //         return redirect()->intended('add_product_lessor');
    //     }else if ($admin && Hash::check($request->password, $admin->password)) {
    //         // Authentication successful
    //         Auth::login($admin);  // Log in the admin
    //         $request->session()->regenerate();
    //         return redirect()->intended('admin');
    //     } else {
    //         // Authentication failed
    //         return redirect()->back()->with('error', 'Invalid credentials');
    //     }
    // } 


    public function log(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = Users::where('email', $request->input('email'))->where('role_id', 1)->first();
    $lessor = Lessor::where('email', $request->input('email'))->where('role_id', 2)->first();
    $admin = Users::where('email', $request->input('email'))->where('role_id', 3)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        // Authentication successful
        Auth::login($user);  // Log in the user
        $user->status = 'online';
        $request->session()->regenerate();
        return redirect()->intended('index');
    } else if ($lessor && Hash::check($request->password, $lessor->password)) {
        // Authentication successful
       
        Auth::login($lessor);  // Log in the lessor
        $request->session()->regenerate();
        return redirect()->intended('/product');
    } else if ($admin && Hash::check($request->password, $admin->password)) {
        // Authentication successful
        Auth::login($admin);  // Log in the admin
        $request->session()->regenerate();
        return redirect()->intended('admin');
    } else {
        // Authentication failed
        return redirect()->back()->with('error', 'Invalid credentials');
    }
}


public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('index');
}

}
