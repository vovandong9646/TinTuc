<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinTuc;
use App\TheLoai;
use App\LoaiTin;
use App\Http\Requests\TinTucRequest;

class TinTucController extends Controller
{
  public function getlist(){
    $tintuc = TinTuc::orderBy('id','DESC')->get();
    return view("admin.tintuc.list",['tintuc'=>$tintuc]);
  }
  public function getAdd(){
    $theloai = TheLoai::all();
    $loaitin = LoaiTin::all();
    return view("admin.tintuc.add",['theloai'=>$theloai,'loaitin'=>$loaitin]);
  }
  public function postAdd(TinTucRequest $request){
    $tintuc = new TinTuc();
    $tintuc->idLoaiTin = $request->loaitin;
    $tintuc->TieuDe = $request->tieude;
    $tintuc->TomTat = $request->tomtat;
    $tintuc->NoiDung = $request->noidung;
    $tintuc->TieuDeKhongDau = str_slug($request->tieude,'-');
    $tintuc->NoiBat = $request->noibat;
    $tintuc->SoLuotXem = 0;

    if($request->hasFile("image")){
      $file = $request->file("image");
      $name = $file->getClientOriginalName();
      $Hinh = str_random(4)."_".$name;
      while(file_exists("Upload/tintuc/".$Hinh)){
        $Hinh = str_random(4)."_".$name;
      }
      $file->move("Upload/tintuc",$Hinh);
      $tintuc->Hinh = $Hinh;
    }else{
      $tintuc->Hinh = "";
    }
    $tintuc->save();
    return redirect()->route('tt.getadd')->with('thongbao','Thêm Thành Công');
  }
  public function getEdit($id){
    $theloai = TheLoai::all();
    $loaitin = LoaiTin::all();
    $tintuc = TinTuc::find($id);
    return view("admin.tintuc.edit",['theloai'=>$theloai,'loaitin'=>$loaitin,'tintuc'=>$tintuc]);
  }
  public function postEdit($id,TinTucRequest $request){
    $theloai = TheLoai::all();
    $loaitin = LoaiTin::all();
    $tintuc = TinTuc::find($id);
    $tintuc->idLoaiTin = $request->loaitin;
    $tintuc->TieuDe = $request->tieude;
    $tintuc->TomTat = $request->tomtat;
    $tintuc->NoiDung = $request->noidung;
    $tintuc->TieuDeKhongDau = str_slug($request->tieude,'-');
    $tintuc->NoiBat = $request->noibat;
    $tintuc->SoLuotXem = 0;
    if($request->hasFile("image"))
    {
      $file = $request->file("image");
      $name = $file->getClientOriginalName();
      $Hinh = str_random(4)."_".$name;
      while(file_exists("Upload/tintuc/".$Hinh)){
        $Hinh = str_random(4)."_".$name;
      }
      $file->move("Upload/tintuc",$Hinh);
      unlink("Upload/tintuc/".$tintuc->Hinh);
      $tintuc->Hinh = $Hinh;
    }
    $tintuc->save();
    return redirect()->route('tt.getlist');
  }
  public function getDelete($id){
    $tintuc = TinTuc::find($id);
    $tintuc->delete();
    return redirect()->route('tt.getlist');
  }

}
