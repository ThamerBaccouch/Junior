<?php


namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\User;

use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{


    public function LoginPage(){
        return view("Auth.login");
    }
    public function RegisterPage(){
        return view("Auth.register");
    }
    public function ProfilePage(){
        return view("Auth.profile");
    }


    public function Authenticate(Request $request){
        $email=$request->input("email");
        $password=$request->input("password");
        if(Auth::attempt(['email' => $email, 'password' => $password])){
            return redirect("/");
        }else{
            return redirect("/Login");
        }
    }

    public function Logout(){
        Auth::logout();
        return redirect("/");
    }
}
