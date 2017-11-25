<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function getlist(){
      $user = User::all();
      return view("admin.user.list",['user'=>$user]);
    }
    public function getAdd(){
      return view("admin.user.add");
    }
    public function postAdd(UserRequest $request){
      $user = new User();
      $user->name = $request->txtUser;
      $user->email = $request->txtEmail;
      $user->password = bcrypt('$request->txtPass');
      $user->quyen = $request->rdoLevel;
      $user->save();
      return redirect()->route('user.getadd')->with('thongbao','Them Thanh Cong');
    }
}
