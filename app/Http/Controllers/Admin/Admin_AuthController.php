<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Admin_AuthController extends Controller
{
    //

    public function index(){

        /*
         User::create([
            'fileno' => 'Admin',
            'firstname' => 'Soyinka',
            'surname' => 'Olabode',
            'middlename' => 'Abiodun',
            'email' => 'olabode@gmail.com',
            'password' => bcrypt('soyinka2020'),
            'role' => 'admin'

        ]);   
        */
        

        return view('admin.auth.login');
    }

    public function login(LoginRequest $request){

        //dd(Auth::check());


        $email = $request->input('email');
        $password = $request->input('password');
        //dd($password);
        
        if (Auth::attempt(['email'=>$email, 'password'=>$password, 'role'=>'admin' ])){
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard.index');
            
        }else{
            return back()->withErrors(['email' => 'Invalid login credentials'])->withInput();
        }

        return back()->withErrors(['email' => 'Invalid login credentials'])->withInput();
    }


    public function logout(Request $request){
        Auth::logout();
        return redirect()->route('admin.auth.index');
    }
}
