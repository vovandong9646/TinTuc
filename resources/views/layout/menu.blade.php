<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><img src="http://placehold.it/100x100"></a>
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li><a href="{{url('/')}}">Trang chủ</a></li>
					@foreach($theloai as $tl)
					@if(count($tl->loaitin)>0)
						<li class="dropdown">
							<a href="{{url('loaitin',$tl->id)}}" class="dropdown-toggle" data-toggle="dropdown">{{$tl->Ten}} <b class="caret"></b></a>
							<ul class="dropdown-menu">
								@foreach($tl->loaitin as $lt)
									<li><a href="{{url('loaitin',$lt->id)}}">{{$lt->Ten}}</a></li>
								@endforeach
							</ul>
						</li>
					@endif
					@endforeach
				</ul>
				
				<ul class="nav navbar-nav navbar-right">
					<form class="navbar-form navbar-left" role="search" action="{{ url('timkiem') }}" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search" name="tukhoa">
						</div>
						<button type="submit" class="btn btn-default">Tìm Kiếm</button>
					</form>
					@if(!Auth::check())
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Login <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="{{ url('dangnhap') }}">Đăng nhập</a></li>
								<li><a href="{{ url('dangky') }}">Đăng Ký</a></li>
							</ul>
						</li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user
glyphicon "></span>{{ Auth::user()->name }} <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="">Thông tin</a></li>
								<li><a href="{{ url('dangxuat') }}">Đăng xuất</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>