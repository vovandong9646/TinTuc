<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\LoaiTin;
use App\TinTuc;
class AjaxController extends Controller
{
  public function loaitin($idTheLoai){
    $loaitin = LoaiTin::where('idTheLoai',$idTheLoai)->get();
    foreach($loaitin as $lt){
      echo "<option value='$lt[id]'>$lt[Ten]</option>";
    }
  }
}
