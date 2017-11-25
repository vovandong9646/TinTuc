<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 menu">
	<div class="panel panel-default">
		<div class="panel-heading">Menu</div>
		<div class="panel-body">
		@foreach($theloai as $tl)

			@if(count($tl->loaitin) > 0)
			<div class="menu-doc">
				<div class="cha">{{$tl->Ten}}</div>
					<div class="con">
						<ul>
							@foreach($tl->loaitin as $lt)
								<li><a href="{{url('loaitin',$lt->id)}}">{{$lt->Ten}}</a></li>
							@endforeach
						</ul>
					</div>
			</div>
			@endif

		@endforeach
		</div>
	</div>
</div>