@extends("layout.master")
@section('title','Đăng Ký')
@section('content')
	<div class="container">
		
		<form action="{{ url('dangky') }}" method="POST" class="form-horizontal" role="form" style="margin-top:20px;">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group">
					<legend class="text-center" style="font-weight:bold;">Đăng Ký</legend>
				</div>
				<!--validate lỗi-->
				 @if(count($errors) > 0)
					<div class="col-md-12">
						<div class="alert alert-danger" style="padding:20px;">
							
								<ul>
								@foreach($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
								</ul>
							
						</div>
					</div>
				@endif 
				<!--end validate-->
				<!--validate Thành công-->
				<div class="col-md-12">
					@if(Session::has('noidung'))
						<div class="alert alert-{{Session::get('color')}}">
							{{ Session::get('noidung') }}
						</div>
					@endif
				</div>
				<!--end validate-->
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">Họ Và Tên</label>
					<div class="col-sm-10">
						<input type="text" name="txtname" class="form-control" placeholder="Full Name" required/>
					</div>
				</div>

				<div class="form-group">
					<label for="" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						<input type="email" name="txtemail" class="form-control" placeholder="Email" required/>
					</div>
				</div>

				<div class="form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label">Mật Khẩu</label>
				    <div class="col-sm-10">
				      <input type="password" name="txtpass" class="form-control" id="inputPassword3" placeholder="Password" required>
				    </div>
				 </div>
				 <div class="form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label">Nhập Lại Mật Khẩu</label>
				    <div class="col-sm-10">
				      <input type="password" name="txtrepass" class="form-control" id="inputPassword3" placeholder="Password" required>
				    </div>
				 </div>

				 <div class="form-group">
				    <div class="col-sm-10 col-sm-offset-2">
				      <button type="submit" class="btn btn-primary">Đăng Ký</button>
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