<?php include(__DIR__."/../Layouts/header.php") ?>

 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thương Hiệu
                            <small>Danh Sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên Thể Loại</th>
                                <th>Tên Thương Hiệu</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i=0; ?>
                        <?php foreach ($trademarks as $trademark): ?>
                        	<?php $i++; ?>
                            <tr class="odd gradeX" align="center">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $trademark['category_id'] ?></td>
                                <td><?php echo $trademark['name'] ?></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                            </tr>
                         <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

<?php include(__DIR__."/../Layouts/footer.php") ?>