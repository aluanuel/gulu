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
                        Training of Farmers
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Training of Farmers</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="row">

                        <!-- /.col -->
                        <div class="col-md-12">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#new_training" data-toggle="tab">Add New Training</a></li>
                                    <li><a href="#view_training" data-toggle="tab">View Trainings</a></li>

                                </ul>
                                <div class="tab-content">
                                    <div class="active tab-pane" id="new_training" style="height: auto;">
                                        <form class="form-horizontal">
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Date of Training</label>

                                                <div class="col-sm-10">
                                                    <input type="date" class="form-control" id="inputName" name="training_date" placeholder="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Area Coordinator</label>

                                                <div class="col-sm-10">
                                                    <select class="form-control select2" style="width: 100%;" name="id_area_coordinator">
                                                        <option>--Select--</option>
                                                        <option>Alaska</option>
                                                        <option>California</option>
                                                        <option>Delaware</option>
                                                        <option>Tennessee</option>
                                                        <option>Texas</option>
                                                        <option>Washington</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Field Officer Code</label>

                                                <div class="col-sm-10">
                                                    <select class="form-control select2" style="width: 100%;">
                                                        <option selected="selected">Alabama</option>
                                                        <option>Alaska</option>
                                                        <option>California</option>
                                                        <option>Delaware</option>
                                                        <option>Tennessee</option>
                                                        <option>Texas</option>
                                                        <option>Washington</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Field Officer Name</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Lead Farmer Code</label>

                                                <div class="col-sm-10">
                                                    <select class="form-control select2" style="width: 100%;">
                                                        <option selected="selected">Alabama</option>
                                                        <option>Alaska</option>
                                                        <option>California</option>
                                                        <option>Delaware</option>
                                                        <option>Tennessee</option>
                                                        <option>Texas</option>
                                                        <option>Washington</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Lead Farmer Name</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Training Venue</label>

                                                <div class="col-sm-10">
                                                    <select class="form-control select2" style="width: 100%;">
                                                        <option selected="selected">Alabama</option>
                                                        <option>Alaska</option>
                                                        <option>California</option>
                                                        <option>Delaware</option>
                                                        <option>Tennessee</option>
                                                        <option>Texas</option>
                                                        <option>Washington</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">District</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Subcounty</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Parish</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Module</label>

                                                <div class="col-sm-10">
                                                    <select class="form-control select2" style="width: 100%;">
                                                        <option selected="selected">Alabama</option>
                                                        <option>Alaska</option>
                                                        <option>California</option>
                                                        <option>Delaware</option>
                                                        <option>Tennessee</option>
                                                        <option>Texas</option>
                                                        <option>Washington</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Module Repetition</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Number of Male Organic Farmers</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Number of Female Organic Farmers</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Number of Male Youth Organic Farmers</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Number of Female Youth Organic Farmers</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Total Number of Organic Farmers</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Total Number of Youth Organic Farmers</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Lead Farmers</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Organic Farmers</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Others</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Reviewed By</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="view_training" style="height: auto;">
                                        <div class="box">
                                            <div class="box-header">
                                                <h3 class="box-title">Data Table With Full Features</h3>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body no-padding">
                                                <table id="example1" class="table table-condensed">
                                                    <thead>
                                                        <tr>
                                                            <th>Rendering engine</th>
                                                            <th>Browser</th>
                                                            <th>Platform(s)</th>
                                                            <th>Engine version</th>
                                                            <th>CSS grade</th>
                                                            <th>Rendering engine</th>
                                                            <th>Browser</th>
                                                            <th>Platform(s)</th>
                                                            <th>Engine version</th>
                                                            <th>CSS grade</th>
                                                            <th>Rendering engine</th>
                                                            <th>Browser</th>
                                                            <th>Platform(s)</th>
                                                            <th>Engine version</th>
                                                            <th>CSS grade</th>
                                                            <th>Rendering engine</th>
                                                            <th>Browser</th>
                                                            <th>Platform(s)</th>
                                                            <th>Engine version</th>
                                                            <th>CSS grade</th>
                                                            <th>Rendering engine</th>
                                                            <th>Browser</th>
                                                            <th>Platform(s)</th>
                                                            <th>Engine version</th>
                                                            <th>CSS grade</th>
                                                            <th>Rendering engine</th>
                                                            <th>Browser</th>
                                                            <th>Platform(s)</th>
                                                            <th>Engine version</th>
                                                            <th>CSS grade</th>

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
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div>
                            <!-- /.nav-tabs-custom -->
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
