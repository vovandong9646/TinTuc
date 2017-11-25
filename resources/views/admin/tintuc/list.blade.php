@extends('admin.layout.index')
@section('title','Tin Tuc')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin Tức
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tiêu Đề</th>
                        <th>Tên Thể Loại</th>
                        <th>Tên Loại Tin</th>
                        <th>Hình</th>
                        <th>Số lượt xem</th>
                        <th>Nổi bật</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($tintuc as $tt)
                    <tr class="odd gradeX" align="center">
                        <td>{{$tt->id}}</td>
                        <td>{{$tt->TieuDe}}</td>
                        <td>{{$tt->loaitin->theloai->Ten}}</td>
                        <td>{{$tt->loaitin->Ten}}</td>
                        <td><img src="Upload/tintuc/{{$tt->Hinh}}" alt="" width='30' height='30'></td>
                        <td>{{$tt->SoLuotXem}}</td>
                        <td>
                            @if($tt->NoiBat == 0)
                              {{"Không"}}
                            @else
                              {{"Có"}}
                            @endif
                        </td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/tintuc/delete/{{$tt->id}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/tintuc/edit/{{$tt->id}}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@stop
