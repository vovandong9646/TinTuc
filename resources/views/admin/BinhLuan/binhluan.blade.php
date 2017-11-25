@extends('admin.layout.index')
@section('title','Quản Lý Bình Luận')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Quản Lý Bình Luận
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên Người Bình Luận</th>
                        <th>Bài Viết</th>
                        <th>Nội Dung</th>
                        <th>Ngày Bình Luận</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                 @foreach($comment as $cm)
                    <tr align="center">
                        <td>{{ $cm->id }}</td>
                        <td>{{ $cm->user->name }}</td>
                        <td><a href="{{ url('chitiet/'.$cm->idTinTuc) }}">Link bài Viết</a></td>
                        <td>{{ $cm->NoiDung }}</td>
                        <?php  
                        	$timestamps = strtotime($cm->created_at);
                        	$ngaycm = date('d/m/Y',$timestamps);
                        ?>
                        <td>{{ $ngaycm }}</td>
                        <td><a href="admin/binhluan/delete/{{$cm->id}}">Delete</a></td>
                    </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
@endsection