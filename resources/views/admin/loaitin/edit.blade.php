@extends('admin.layout.index')
@section('title','Sua Loai Tin')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>Edit</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
              @include('admin.errors.error')
              @include('admin.errors.success')
                <form action="{{route('lt.postedit',$loaitin->id)}}" method="POST">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Thể Loại</label>
                        <select class="form-control" name="theloai12">
                          @foreach($theloai as $tl)
                            <option @if($loaitin->idTheLoai == $tl->id)
                                      {{"selected"}}
                                    @endif
                             value="{{$tl->id}}">
                              {{$tl->Ten}}
                            </option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên Loại Tin</label>
                        <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name" value="{{$loaitin->Ten}}"/>
                    </div>

                    <button type="submit" class="btn btn-default">Category Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
  @stop
