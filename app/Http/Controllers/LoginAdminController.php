<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginAdminRequest;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    public function getadminlogin(){
      if(!Auth::check())
      {
        return view("admin.login.login");
      }else {
        return redirect()->back();
      }
    }
    public function postadminlogin(LoginAdminRequest $request){
      $login = [
        'email' => $request->email,
        'password'=>$request->password,
        'quyen'=>1
      ];
      if(Auth::attempt($login))
      {
        return redirect()->intended('admin/dashboard');
      }else {
        return redirect('admin/login');
      }
    }
    public function getadminlogout(){
      Auth::logout();
      return redirect()->route('admin.getlogin');
    }
}
