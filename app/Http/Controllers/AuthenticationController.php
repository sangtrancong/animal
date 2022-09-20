<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function login(){
        return view('client.login');
    }
    public function postLogin(Request $request){
        $username = $request ->username;
        $pass=$request ->password;
        $account =Account::where('username',$username)->first();
        if($account!=null && Hash::check($pass, $account->password)) {
                request()->session()->invalidate();
                request()->session()->push('adminSession',$account);
                return redirect('/admin/port');
        }
        else return back()->with('loginfail','Email or password incorrect!');
    }
    public function logout(){
        request()->session()->invalidate();
        return redirect("/login");
    }
}
