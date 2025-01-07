<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Auth;
class AuthController extends Controller
{
    public function login (){
        
        
        return view('auth.login');
        
    }

    public function auth_login (Request $request){
        
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password], true))
        {
              return redirect('backend/dashboard');
     
        }else{
          return redirect()->back()->with('error', 'Please enter your correct Email and Password');
        }
        
    }


    public function logout (){
        
        
        Auth::logout();
        return redirect(url(''));
        
    }
    
    
}
