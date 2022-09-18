<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use DB;
class AuthController extends Controller
{
    public function getLogin() {

        if(Session::get("user")){
             if(Session::get("user")->isAdmin == 1 ) {
                return redirect()->route("dashboard");
            }else{
                $categories = DB::table("categories")->get();
                return view("gallery",compact("categories"));
            }
        }
       

        return view("login");
    }

     public function doLogout(Request $request) {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
     }

    public function doLogin(Request $request) {

        $email = $request->get("email");
        $password = $request->get("password");

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            $categories = DB::table("categories")->first();

            Session::put("defaultCat",$categories->ID);
            Session::put("isLoggedIn",1);
            Session::put("user",Auth::user());

            if(Auth::user()->isAdmin == 1 ) {
                Session::put("title","Dashboard");
                return redirect()->route("dashboard");
            }else{
                Session::put("title","Gallery");
                $categories = DB::table("categories")->get();
                return view("gallery",compact("categories"));
            }
        }else{
            return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }

    }
}
