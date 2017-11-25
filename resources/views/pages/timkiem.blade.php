@extends('layout.master')
@section('title','Loại Tin if VanDong')
@section('content')
<!-- content -->
<div class="container">
	<div class="row">
		@include('layout.menudoc')
		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 noidung">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title" style="font-weight:bold;">Tìm Kiếm: {{$tukhoa}}</h3>
				</div>
				<div class="panel-body">
				@if(count($tintuc) > 0 )
					@foreach($tintuc as $tt)
						<div class="chitiet">
							<img src="Upload/tintuc/{{$tt->Hinh}}" class="img-responsive" style="height:200px;">
							<div class="chitiet_noidung">
								<h3>{{ $tt->TieuDe }}</h3>
								<h5><i class="glyphicon glyphicon-eye-open"></i> {!! $tt->SoLuotXem !!}</h5>
								<p class="tomtat">{{$tt->TomTat}}</p>
								<a href="{{url('chitiet',$tt->id)}}" class="btn btn-primary">xem them</a>
							</div>
						</div>
						<div class="clearfix"></div>
					@endforeach
					<div class="text-center">
						{!! $tintuc->links() !!}
					</div>
				@else
					<div><h3 class="text-center">Dữ Liệu Chưa Cập Nhật</h3></div>
				@endif
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end-content -->
@stop