<?php include(__DIR__."/../Layouts/header.php") ?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thể Loại
                            <small>Danh Sách</small>
                            <a href="index.php?ctrl=category&action=add" class="btn btn-primary pull-right">Thêm Thể Loại</a>
                        </h1>

                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($categories as $category): ?>
                            <tr class="odd gradeX" align="center">
                                <td><?php echo $category['id'] ?></td>
                                <td><?php echo $category['name'] ?></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="index.php?ctrl=category&action=edit&id=<?php echo $category['id'] ?>">Edit</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="index.php?ctrl=category&action=delete&id=<?php echo $category['id'] ?>" onclick='return xoa()'> Delete</a></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

<?php include(__DIR__."/../Layouts/footer.php") ?>
