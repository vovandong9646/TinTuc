<?php include(__DIR__."/../Layouts/header.php") ?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thể Loại
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST">
                            <?php  
                                if(isset($error)){
                                    echo "<div class='col-md-12 alert alert-danger'>$error</div>";
                                }
                            ?>
                            <div class="form-group">
                                <label>Tên Thể Loại</label>
                                <input class="form-control" name="txtCateName" placeholder="Nhập Tên Thể Loại Ở Đây" />
                            </div>
                           
                            <button type="submit" name="ok" class="btn btn-primary">Thêm</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

<?php include(__DIR__."/../Layouts/footer.php") ?>