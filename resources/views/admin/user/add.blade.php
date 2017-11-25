@extends('admin.layout.index')
@section('title','Them Thanh Vien')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
              @if(count($errors)>0)
              <div class="alert alert-danger">
                <ul>
                  @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                  @endforeach
                </ul>
              </div>
              @endif

              @if(Session('thongbao'))
                <div class="alert alert-success">
                  {{Session('thongbao')}}
                </div>
              @endif
                <form action="{{route('user.postadd')}}" method="POST">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" name="txtUser" placeholder="Please Enter Username" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" name="txtEmail" placeholder="Please Enter Email" type="email"/>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="txtPass" placeholder="Please Enter Password" />
                    </div>
                    <div class="form-group">
                        <label>RePassword</label>
                        <input type="password" class="form-control" name="txtRePass" placeholder="Please Enter RePassword" />
                    </div>

                    <div class="form-group">
                        <label>User Level</label>
                        <label class="radio-inline">
                            <input name="rdoLevel" value="2" type="radio" checked="">Member
                        </label>
                        <label class="radio-inline">
                            <input name="rdoLevel" value="1"  type="radio">Admin
                        </label>

                    </div>
                    <button type="submit" class="btn btn-default">User Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@stop
