@extends('layout.master')
@section('title','Đăng Nhập')
@section('content')
	<div class="container">
		
			<form action="{{ url('dangnhap') }}" method="POST" class="form-horizontal" role="form">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group text-center" style="margin-top:30px;">
						<legend style="font-weight:bold;">Đăng Nhập</legend>
					</div>
				<!--Validate error-->
					@if(count($errors)>0)
						<div class="col-md-12">
							<ul>
								@foreach($errors->all() as $error)
									<li>{{$error}}</li>
								@endforeach
							</ul>
						</div>
					@endif
				<!--end Validate-->
				@if(Session::has('thongbao'))
					<div class="alert alert-{{ Session::get('color') }}">
						{{ Session::get('thongbao') }}
					</div>
				@endif
					<div class="form-group">
						<label class="col-md-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" name="txtemail" class="form-control" placeholder="Email" required/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Mật Khẩu</label>
						<div class="col-sm-10">
							<input type="password" name="txtpass" class="form-control" placeholder="Mật Khẩu" required/>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<button type="submit" class="btn btn-primary">Đăng Nhập</button>
						</div>
					</div>

			</form>
	</div>
@stop
@section('script')
	<script type="text/javascript">
		$(document).ready(function(){
			$(".alert").delay(3000).slideUp();
		});
	</script>
@stop