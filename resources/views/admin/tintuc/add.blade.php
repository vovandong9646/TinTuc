@extends('admin.layout.index')
@section('title','Them Tin Tuc')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin Tức
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @include('admin.errors.error')
                @include('admin.errors.success')
                <form action="{{route('tt.postadd')}}" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                      <label for="theloai">Thể Loại</label>
                      <select class="form-control" name="theloai" id="theloai">
                        @foreach($theloai as $tl)
                          <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="loaitin">Loại Tin</label>
                      <select class="form-control" name="loaitin" id="loaitin">
                        @foreach($loaitin as $lt)
                          <option value="{{$lt->id}}">{{$lt->Ten}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                        <label>Tiêu Đề</label>
                        <input class="form-control" name="tieude" placeholder="Nhập Tiêu Đề" />
                    </div>
                    <div class="form-group">
                      <label for="">Tóm Tắt</label>
                      <textarea class="form-control" rows='5' name="tomtat"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="">Nội Dung</label>
                      <textarea class="form-control ckeditor" rows='10' name="noidung" id="demo"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="">Hình</label>
                      <input type="file" name="image">
                    </div>
                    <div class="form-group">
                      <label for="">Nổi Bật</label>
                      <label class="radio-inline">
                        <input type="radio" name="noibat" value="0">Không
                      </label>
                      <label class="radio-inline">
                        <input type="radio" name="noibat" value="1">Có
                      </label>
                    </div>

                    <button type="submit" class="btn btn-default">Thêm</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@stop
@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
      $("#theloai").change(function(){
        var idTheLoai = $(this).val();

        $.get('admin/ajax/loaitin/'+idTheLoai,function(data){
          $("#loaitin").html(data);
        });
      });
    });
  </script>
@stop
