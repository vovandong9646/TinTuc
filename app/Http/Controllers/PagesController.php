<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;
use App\Slide;
use App\TinTuc;
use App\LoaiTin;
use App\Comment;
use App\User;
use Hash,Auth;

class PagesController extends Controller
{
    public function __construct(){
      $theloai = TheLoai::all();
      view()->share('theloai',$theloai);
    }

    public function trangchu(){
      $slide = Slide::all();
      $tinmoinhat = TinTuc::orderBy('id','DESC')->paginate(4);
      $tinnoibat = TinTuc::where('NoiBat',1)->where('id','>',rand(1,100))->paginate(4);
      return view("pages.trangchu",['slide'=>$slide,'tinmoinhat'=>$tinmoinhat,'tinnoibat','tinnoibat'=>$tinnoibat]);
    }
    public function getloaitin($id){
      $loaitin = LoaiTin::find($id);
      $tintuc = TinTuc::where('idLoaiTin',$id)->paginate(6);
      return view("pages.loaitin",['loaitin'=>$loaitin,'tintuc'=>$tintuc]);
    }
    public function getTintuc($idT){
      $tintuc = TinTuc::find($idT);
      $comment = Comment::where('idTinTuc',$idT)->orderBy('id','DESC')->paginate(6);
      $tinlienquan = TinTuc::where('idLoaiTin',$tintuc->idLoaiTin)->take(4)->skip(1)->select('id','TieuDe','Hinh')->get();
      $tinnoibat = TinTuc::where('NoiBat',1)->take(4)->get();
      return view("pages.chitiet",compact('tintuc','comment','tinlienquan','tinnoibat'));
    }
    public function postTimKiem(Request $request){
      $tukhoa = $request->tukhoa;
      $tintuc = TinTuc::where('TieuDe','like',"%$tukhoa%")->paginate(4);
      return view("pages.timkiem",['tukhoa'=>$tukhoa,'tintuc'=>$tintuc]);
    }
    public function getdangky(){
      if(!Auth::check()){
        return view("pages.dangky");
      }else{
        return redirect('/');
      }
    }
    public function postdangky(Request $request){
      $this->validate($request,[
          'txtname'=>'required|min:3|max:255',
          'txtemail'=>'required|min:3|max:255|unique:users,email',
          'txtpass'=>'required|min:3|max:255',
          'txtrepass'=>'required|min:3|max:255|same:txtpass'
        ],[
          'txtname.min'=>'Vui Lòng Nhập Họ Và Tên ít nhất 3 ký tự',
          'txtname.max'=>'Nhập Họ Và Tên không được quá 255 ký tự',
          'txtemail.min'=>'Vui Lòng Nhập Email ít nhất 3 ký tự',
          'txtemail.max'=>'Nhập Email không được quá 255 ký tự',
          'txtemail.unique'=>'Email Đã Tồn Tại Vui Lòng Chọn Email Khác',
          'txtpass.min'=>'Nhập Mật Khẩu phải nhiều hơn 3 ký tự',
          'txtpass.max'=>'Nhập Mật Khẩu phải ít hơn 255 ký tự',
          'txtrepass.same'=>'Mật Khẩu Nhập Lại phải trùng Với Mật Khẩu'
        ]);

        $dangky = new User();
        $dangky->name = $request->txtname;
        $dangky->email = $request->txtemail;
        $dangky->password = Hash::make($request->txtpass);
        $dangky->remember_token = $request->_token;
        $dangky->quyen = 0;
        $dangky->save();
        return redirect('dangky')->with(['color'=>'success','noidung'=>'Đăng Ký Thành Công']);

    }

    public function getdangnhap(){
      if(!Auth::check()){
        return view("pages.dangnhap");
      }else{
        return redirect('/');
      }
    }
    public function postdangnhap(Request $request){
      $this->validate($request,[
        'txtemail'=>'required',
        'txtpass'=>'required'
      ],[
        'txtemail.required'=>'Vui Lòng Nhập Email',
        'txtpass.required'=>'Vui Lòng Nhập Mật Khẩu' 
      ]);

      if(Auth::attempt(['email'=>$request->txtemail,'password'=>$request->txtpass,'quyen'=>0])){
        return redirect()->intended('/');
      }else{
        return redirect('dangnhap')->with(['color'=>'danger','thongbao'=>'Sai Email hoặc Mật Khẩu']);
      }

    }

    public function getdangxuat(){
      Auth::logout();
      return redirect('/');
    }

    public function binhluan(Request $request){
      $this->validate($request,[
        'noidung'=>'required|min:10'
      ],[
        'noidung.required'=>'Vui lòng nhập dữ liệu vào form',
        'noidung.min'=>'Vui lòng nhập nhiều hơn 10 ký tự'
      ]);
        $comment = new Comment();
        $comment->idUser = Auth::user()->id;
        $comment->idTinTuc = (int)$request->idTin;
        $comment->NoiDung = $request->noidung;
        $comment->save();
        return redirect('chitiet/'.$request->idTin);
    }
}
