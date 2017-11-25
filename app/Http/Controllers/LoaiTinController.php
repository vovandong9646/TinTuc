<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;
use App\Http\Requests\LoaiTinRequest;

class LoaiTinController extends Controller
{
    public function getlist(){
      $loaitin = LoaiTin::all();
      return view("admin.loaitin.list",['loaitin'=>$loaitin]);
    }
    public function getAdd(){
      $theloai = TheLoai::all();
      return view("admin.loaitin.add",['theloai'=>$theloai]);
    }
    public function postAdd(LoaiTinRequest $request){
      $loaitin = new LoaiTin();
      $loaitin->idTheLoai = $request->theloai;
      $loaitin->Ten = $request->txtCateName;
      $loaitin->TenKhongDau = str_slug($request->txtCateName,'-');
      $loaitin->save();

      return redirect()->route('lt.getadd')->with('thanhcong','Thêm Thành Công');
    }
    public function getEdit($id){
      $theloai = TheLoai::all();
      $loaitin = LoaiTin::find($id);
      return view("admin.loaitin.edit",['theloai'=>$theloai,'loaitin'=>$loaitin]);
    }
    public function postEdit($id,LoaiTinRequest $request){
      $loaitin = LoaiTin::find($id);
      $loaitin->idTheLoai = $request->theloai12;
      $loaitin->Ten = $request->txtCateName;
      $loaitin->TenKhongDau = str_slug($request->txtCateName,'-');
      $loaitin->save();
      return redirect()->route('lt.getedit',$loaitin->id)->with('thongbao','Sửa Thành Công');
    }
    public function getDelete($id){
      $loaitin = LoaiTin::find($id);
      $loaitin->delete();
      return redirect()->route('lt.getlist')->with('thongbao','Xóa Thành Công');

    }
}
