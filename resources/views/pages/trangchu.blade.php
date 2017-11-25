@extends('layout.master')
@section('title','kỹ Năng Chuyên Ngành')
@section('content')
<!-- carousel -->
<div class="container">
	<div id="carousel-id" class="carousel slide" data-ride="carousel">
	@for($i=0;$i<count($slide);$i++)
		<ol class="carousel-indicators">
			<li data-target="#carousel-id" data-slide-to="{{$i}}" 
				@if($i==0)
					class="active"
				@endif
			></li>
		</ol>
	@endfor
		<div class="carousel-inner">
		<?php $i=0; ?>
		@foreach($slide as $sl)
			<div 
				@if($i==0)
					class="item active"
				@else
					class="item"
				@endif
			>
			<?php $i++; ?>
				<img alt="First slide" src="Upload/slide/{{$sl->Hinh}}" style="height:350px;width:100%;">	
			</div>
		@endforeach
		<a class="left carousel-control" href="#carousel-id" data-slide="prev" role="button"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span></a>
		
		<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
	</div>
</div>
<!-- end-carousel -->
<!-- content -->
<div class="container">
	<div class="row">
		@include('layout.menudoc')
		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 noidung">
			<div>

			  <!-- Nav tabs -->
			  <ul class="nav nav-tabs" role="tablist">
			    <li role="presentation" class="active"><a href="#tinmoinhat" aria-controls="home" role="tab" data-toggle="tab">Tin Mới Nhất</a></li>
			    <li role="presentation"><a href="#tinnoibat" aria-controls="profile" role="tab" data-toggle="tab">Tin Nổi Bật</a></li>
			  </ul>

			  <!-- Tab panes -->
			  <div class="tab-content">
			    <div role="tabpanel" class="tab-pane active" id="tinmoinhat">
			    @foreach($tinmoinhat as $tinmoi)
			    	<div class="chitiet">
						<img src="Upload/tintuc/{{$tinmoi->Hinh}}" class="img-responsive" style="height:200px;">
						<div class="chitiet_noidung">
							<h3>{{$tinmoi->TieuDe}}</h3>
							<a href="{{url('loaitin',$tinmoi->loaitin->id)}}">{{$tinmoi->loaitin->Ten}}</a>
							<h5><i class="glyphicon glyphicon-eye-open"></i> {!! $tinmoi->SoLuotXem !!}</h5>
							<div style="margin:20px 0px;"></div>
							<p class="tomtat">{{$tinmoi->TomTat}}</p>
							<a href="{{url('chitiet',$tinmoi->id)}}" class="btn btn-primary">xem them</a>
						</div>
					</div>
					<div class="clearfix"></div>
				@endforeach
			    </div>
			    <div role="tabpanel" class="tab-pane" id="tinnoibat">
			    @foreach($tinnoibat as $noibat1)
			    	<div class="chitiet">
						<img src="Upload/tintuc/{{$noibat1->Hinh}}" class="img-responsive">
						<div class="chitiet_noidung">
							<h3>{{$noibat1->TieuDe}}</h3>
							<a href="{{url('loaitin',$noibat1->loaitin->id)}}">{{$noibat1->loaitin->Ten}}</a>
							<h5><i class="glyphicon glyphicon-eye-open"></i> {!! $noibat1->SoLuotXem !!}</h5>
							<div style="margin:20px 0px;"></div>
							<p class="tomtat">{{$noibat1->TomTat}}</p>
							<a href="{{url('chitiet',$noibat1->id)}}" class="btn btn-primary">xem them</a>
						</div>
					</div>
					<div class="clearfix"></div>
				@endforeach
			    </div>
			  </div>

			</div>
			<div class="text-center">
				{{$tinmoinhat->links()}}
			</div>
		</div>

	</div>
</div>
@stop