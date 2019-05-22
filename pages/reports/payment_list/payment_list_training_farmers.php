<!DOCTYPE html>
<html>
    <?php include 'include/header.php'; ?>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php include 'include/top_nav.php'; ?>
            <!-- Left side column. contains the logo and sidebar -->
            <?php include 'include/side_nav.php'; ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Report <small>Training of Farmers</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li>Payment List</li>
                        <li class="active">Training of Farmers</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <?php echo $notification; ?>
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Payment List for Training of Farmers</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body" style="overflow-x: auto;">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead class="text-uppercase">
                                            <tr>
                                                <th>#</th>
                                                <th>production area</th>
                                                <th>lf code</th>
                                                <th>lf name</th>
                                                <th>trained</th>
                                                <th>not trained</th>
                                                <th>m1</th>
                                                <th>m2</th>
                                                <th>m3</th>
                                                <th>m4</th>
                                                <th>m5</th>
                                                <th>m6</th>
                                                <th>m7</th>
                                                <th>m8</th>
                                                <th>m9</th>
                                                <th>total</th>
                                                <th>actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Trident</td>
                                                <td>Internet
                                                    Explorer 4.0
                                                </td>
                                                <td>Win 95+</td>
                                                <td> 4</td>
                                                <td>X</td>
                                                <td>Trident</td>
                                                <td>Internet
                                                    Explorer 4.0
                                                </td>
                                                <td>Win 95+</td>
                                                <td> 4</td>
                                                <td>X</td>
                                                <td>Trident</td>
                                                <td>Internet
                                                    Explorer 4.0
                                                </td>
                                                <td>Win 95+</td>
                                                <td> 4</td>
                                                <td>X</td>
                                                <td>Win 95+</td>
                                                <td>Win 95+</td>
                                            </tr>

                                        </tbody>
                                        <tfoot>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <?php include 'include/footer.php'; ?>
    </body>
</html>
