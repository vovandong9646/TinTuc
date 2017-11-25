<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','PagesController@trangchu');
Route::get('loaitin/{id}','PagesController@getloaitin');
Route::get('chitiet/{idT}','PagesController@getTintuc');
Route::post('/timkiem','PagesController@postTimKiem');
Route::get('/dangky','PagesController@getdangky');
Route::post('/dangky','PagesController@postdangky');
Route::get('/dangnhap','PagesController@getdangnhap');
Route::post('/dangnhap','PagesController@postdangnhap');
Route::get('/dangxuat','PagesController@getdangxuat');
Route::post('binhluan','PagesController@binhluan');


Route::get('admin/login',['as'=>'admin.getlogin','uses'=>'LoginAdminController@getadminlogin']);
Route::post('admin/login',['as'=>'admin.postlogin','uses'=>'LoginAdminController@postadminlogin']);
Route::get('admin/logout',['as'=>'admin.getlogout','uses'=>'LoginAdminController@getadminlogout']);
Route::get('admin',function(){
  return redirect('admin/login');
});

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){

  Route::get('dashboard',function(){
    return view("admin.DashBoard");
  });

  Route::group(['prefix'=>'theloai'],function(){
    Route::get('list',['as'=>'tl.getlist','uses'=>'TheLoaiController@getlist']);
    Route::get('add',['as'=>'tl.getadd','uses'=>'TheLoaiController@getAdd']);
    Route::post('add',['as'=>'tl.postadd','uses'=>'TheLoaiController@postAdd']);
    Route::get('edit/{id}',['as'=>'tl.getedit','uses'=>'TheLoaiController@getEdit']);
    Route::post('edit/{id}',['as'=>'tl.postedit','uses'=>'TheLoaiController@postEdit']);
    Route::get('delete/{id}',['as'=>'tl.postdelete','uses'=>'TheLoaiController@postDelete']);
  });
  Route::group(['prefix'=>'loaitin'],function(){
    Route::get('list',['as'=>'lt.getlist','uses'=>'LoaiTinController@getlist']);
    Route::get('add',['as'=>'lt.getadd','uses'=>'LoaiTinController@getAdd']);
    Route::post('add',['as'=>'lt.postadd','uses'=>'LoaiTinController@postAdd']);
    Route::get('edit/{id}',['as'=>'lt.getedit','uses'=>'LoaiTinController@getEdit']);
    Route::post('edit/{id}',['as'=>'lt.postedit','uses'=>'LoaiTinController@postEdit']);
    Route::get('delete/{id}',['as'=>'lt.getdelete','uses'=>'LoaiTinController@getDelete']);
  });
  Route::group(['prefix'=>'tintuc'],function(){
    Route::get('list/',['as'=>'tt.getlist','uses'=>'TinTucController@getlist']);
    Route::get('add/',['as'=>'tt.getadd','uses'=>'TinTucController@getAdd']);
    Route::post('add/',['as'=>'tt.postadd','uses'=>'TinTucController@postAdd']);
    Route::get('edit/{id}',['as'=>'tt.getedit','uses'=>'TinTucController@getEdit']);
    Route::post('edit/{id}',['as'=>'tt.postedit','uses'=>'TinTucController@postEdit']);
    Route::get('delete/{id}','TinTucController@getDelete');
  });
  Route::group(['prefix'=>'ajax'],function(){
    Route::get('loaitin/{idTheLoai}','AjaxController@loaitin');
  });
  Route::group(['prefix'=>'user'],function(){
    Route::get('list/',['as'=>'user.getlist','uses'=>'UserController@getlist']);
    Route::get('add/',['as'=>'user.getadd','uses'=>'UserController@getAdd']);
    Route::post('add/',['as'=>'user.postadd','uses'=>'UserController@postAdd']);
  });
  Route::get('binhluan','CommentController@getBinhLuan');
  Route::get('/binhluan/delete/{$idCm}','CommentController@deletecomment');

});

