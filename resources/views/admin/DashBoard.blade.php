@extends('admin.layout.index')
@section('title','Trang Thống Kê Của Admin')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thống Kê
                    <small></small>
                </h1>
            </div>
            <?php  
            	$theloai = DB::table('theloai')->count();
            	$loaitin = DB::table('loaitin')->count();
            	$baiviet = DB::table('tintuc')->count();
            	$admin = DB::table('users')->where('quyen',1)->count();
            	$member = DB::table('users')->where('quyen',0)->count();
            	$comment = DB::table('comment')->count();

            ?>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
               <div class="row">
	               	<div class="col-md-6">
	               		<p style="font-weight:bold;">Tổng Thể Loại: <span style="color:green">{{ $theloai }}</span></p>
	               	</div>
	               	<div class="col-md-6">
	               		<p style="font-weight:bold;">Tổng Loại Tin: <span style="color:green">{{ $loaitin }}</span></p>
	               	</div>
	               	<div class="col-md-6">
	               		<p style="font-weight:bold;">Tổng Bài Viết: <span style="color:green">{{ $baiviet }}</span></p>
	               	</div>
	               	<div class="col-md-6">
	               		<p style="font-weight:bold;">Admin: <span style="color:green">{{ $admin }}</span></p>
	               	</div>
	               	<div class="col-md-6">
	               		<p style="font-weight:bold;">Member: <span style="color:green">{{ $member }}</span></p>
	               	</div>
	               	<div class="col-md-6">
	               		<p style="font-weight:bold;">Bình Luận: <span style="color:green">{{ $comment }}</span></p>
	               	</div>
               </div>
            </div>
        </div>
@endsection