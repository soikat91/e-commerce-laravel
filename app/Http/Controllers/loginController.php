<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function login(Request $request){

       $user= User::where(['email'=>$request->email])->first();
        // return $user->email;
       if(!$user || Hash::check($request->password,$user->password)){
                return "Email and password is not matched";
       }else{
         $request->session()->put('user',$user);
         return redirect('/');
       }
    }
    public function register(Request $request){
      //return $request->input();

      $user=new User;
      $user->name=$request->name;
      $user->email=$request->email;
      $user->password=$request->password;
      $user->save();

      return redirect("login");
    }
}
