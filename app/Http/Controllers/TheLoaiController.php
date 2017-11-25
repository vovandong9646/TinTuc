<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\Http\Requests\TheLoaiRequest;
use DateTime;

class TheLoaiController extends Controller
{
    public function getlist(){
      $theloai = TheLoai::all();
      return view("admin.theloai.list",['theloai'=>$theloai]);
    }
    public function getAdd(){
      return view("admin.theloai.add");
    }
    public function postAdd(TheLoaiRequest $request){
      $theloai = new TheLoai();
      $theloai->Ten = $request->txtCateName;
      $theloai->TenKhongDau = str_slug($request->txtCateName,'-');
      $theloai->save();
      return redirect()->route('tl.getadd')->with('thanhcong','Them Thanh Cong');
    }
    public function getEdit($id){
      $theloai = TheLoai::find($id);
      return view("admin.theloai.edit",['theloai'=>$theloai]);
    }
    public function postEdit($id,TheLoaiRequest $request){
      $theloai = TheLoai::find($id);
      $theloai->Ten = $request->txtCateName;
      $theloai->TenKhongDau = str_slug($request->txtCateName,'-');
      $theloai->save();
      return redirect()->route('tl.getedit',$theloai->id)->with('thanhcong','Sửa Thanh Cong');
    }
    public function postDelete($id){
      $theloai = TheLoai::find($id);
      $theloai->delete();
      return redirect()->route('tl.getlist')->with('thongbao','xóa thành công');
    }
}
