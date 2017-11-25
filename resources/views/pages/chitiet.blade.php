@extends('layout.master')
@section('title','Chi Tiết Tin')
@section('content')
<!-- Page Content -->
<div class="container">
    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-9">

            <!-- Blog Post -->

            <!-- Title -->
            <h1>{{$tintuc->TieuDe}}</h1>

          
            <!-- Author -->
            <p class="lead">
                from <a href="{{url('loaitin',$tintuc->loaitin->id)}}">{{$tintuc->loaitin->Ten}}</a>
            </p>
            <!-- Preview Image -->
            <img class="img-responsive img-thumbnail" src="Upload/tintuc/{{$tintuc->Hinh}}" alt="" style="width:800px;height:600px;">

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> Posted on {{$tintuc->created_at}}</p>
            <hr>
            <!--soluotxem-->
            <?php
               @session_start();
                $db = new PDO("mysql:host=localhost;dbname=laravel_doantintuc","root","");
                $session_name = 'Tintuc_'.$tintuc->id;
                if(!isset($_SESSION[$session_name])){
                    $_SESSION[$session_name] = 1;
                    $sql = "UPDATE tintuc SET SoLuotXem = SoLuotXem + 1 WHERE id = $tintuc->id";
                    $soluotxem = $db->prepare($sql);
                    $soluotxem->execute();
                }
            ?>
            <!--end soluotxem-->
            <h3><i class="glyphicon glyphicon-eye-open"></i> {!! $tintuc->SoLuotXem !!}</h3>
            <!-- Post Content -->
            <p class="lead">{!! $tintuc->TomTat !!}</p>
            <p>{!! $tintuc->NoiDung !!}</p>

            <hr>

            <!-- Blog Comments -->
            <!-- Comments Form -->
            @if(Auth::check())
                <div class="well">
                    <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form role="form" action="{{ url('binhluan') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="noidung"></textarea>
                        </div>
                        <input type="hidden" name="idTin" value="{{ $tintuc->id }}">
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>
            @endif
            <hr>

            <!-- Posted Comments -->

            <!-- Comment -->
        <h3>Bình Luận <span style="font-size:18px;color:gray;">({{ count($comment) }} Bình Luận)</span></h3> 
        <hr>
        @foreach($comment as $cm)
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{!!$cm->user->name!!}
                        <small>{{$cm->created_at}}</small>
                    </h4>
                    {!! $cm->NoiDung !!}
                </div>
            </div>
        @endforeach
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-heading"><b>Tin liên quan</b></div>
                <div class="panel-body">
                @foreach($tinlienquan as $lienquan)
                    <!-- item -->
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <a href="detail.html">
                                <img class="img-responsive" src="Upload/tintuc/{{$lienquan->Hinh}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-7">
                            <a href="{{url('chitiet',$lienquan->id)}}"><b>{!! $lienquan->TieuDe !!}</b></a>
                        </div>
                        <div class="break"></div>
                    </div>
                    <!-- end item -->
                @endforeach
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><b>Tin nổi bật</b></div>
                <div class="panel-body">
                @foreach($tinnoibat as $noibat)
                    <!-- item -->
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <a href="detail.html">
                                <img class="img-responsive" src="Upload/tintuc/{{$noibat->Hinh}}" alt="">
                            </a>
                        </div>
                        <div class="col-md-7">
                            <a href="{{url('chitiet',$noibat->id)}}"><b>{!! $noibat->TieuDe !!}</b></a>
                        </div>
                        <div class="break"></div>
                    </div>
                    <!-- end item -->
                @endforeach
                   
                </div>
            </div>
            
        </div>

    </div>
    <!-- /.row -->
</div>
<div style="margin-bottom:30px;"></div>
<!-- end Page Content -->
@endsection