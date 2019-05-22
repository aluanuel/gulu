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
                        Modules
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Modules</li>
                    </ol>
                </section>
                <?php
                if (Input::exists() && Input::get('save_module') == 'save_module') {
                    $id_module = strtolower(Input::get('id_module'));
                    $module_name = strtolower(Input::get('module_name'));
                    $module_desc = strtolower(Input::get('module_description'));
                    $arrayNewModule = array("module_name" => $module_name, "module_description" => $module_desc);
                    if (DB::getInstance()->checkRows("SELECT * FROM modules WHERE module_name = '$module_name'")) {
                        
                    } else {
                        if (DB::getInstance()->insert('modules', $arrayNewModule)) {

                            $notification = submissionReport('success', 'New module Saved Sucessfully');
                        } else {
                            $notification = submissionReport('error', 'failed to add new module');
                        }
                    }
                }

                if (Input::exists() && Input::get('update_module') == 'update_module') {
                    $id_module = strtolower(Input::get('id_module'));
                    $module_name = strtolower(Input::get('module_name'));
                    $module_desc = strtolower(Input::get('module_description'));
                    $arrayNewModule = array("module_name" => $module_name, "module_description" => $module_desc);
                    if (DB::getInstance()->update('modules', $id_module, $arrayNewModule, 'id_module')) {

                        $notification = submissionReport('success', 'Data updated Sucessfully');
                    }
                } elseif (Input::exists() && Input::get('delete_module') == 'delete_module') {
                    $id_module = Input::get('id_module');
                    DB::getInstance()->query("DELETE FROM modules WHERE id_module = $id_module");
                }
                ?>

                <!-- Main content -->
                <section class="content">
<?php echo $notification; ?>

                    <div class="row">

                        <!-- /.col -->
                        <div class="col-md-12">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#new_training" data-toggle="tab">Add New Module</a></li>
                                    <li><a href="#view_training" data-toggle="tab">View Modules</a></li>

                                </ul>
                                <div class="tab-content">
                                    <div class="active tab-pane" id="new_training" style="height: auto;">
                                        <form class="form-horizontal" action="" method="post">
                                            <div class=" row form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Module Name</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="module_name" id="inputName" placeholder="Module name" required>
                                                </div>
                                            </div>
                                            <div class=" row form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Description</label>

                                                <div class="col-sm-10">
                                                    <textarea name="module_description" class="form-control" placeholder="Description of the module" required></textarea>
                                                </div>
                                            </div>
                                            <div class=" row form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-primary" name="save_module" value="save_module">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="view_training" style="height: auto;">
                                        <div class="box">
                                            <div class="box-header">
                                                <h3 class="box-title">Training Modules</h3>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Module Name</th>
                                                            <th>Description</th>
                                                            <th>action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
<?php
$x = 1;
$query_modules = DB::getInstance()->query("SELECT * FROM modules");
foreach ($query_modules->results() as $query_modules):
    ?>
                                                            <tr>
                                                                <td><?php echo $x; ?></td>
                                                                <td><?php echo strtoupper($query_modules->module_name); ?></td>
                                                                <td><?php echo strtoupper($query_modules->module_description); ?></td>
                                                                <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLive<?php echo strtoupper($query_modules->id_module); ?>">
                                                                        Edit
                                                                    </button><button  type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?php echo strtoupper($query_modules->id_module); ?>">
                                                                        Delete
                                                                    </button></td>




                                                        <div id="exampleModalLive<?php echo strtoupper($query_modules->id_module); ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title text-center primary" id="exampleModalLiveLabel">Edit Module</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form class="form-horizontal" action="" method="post">
                                                                            <input type="hidden" class="form-control" name="id_module" id="inputName" placeholder="Module name" required value="<?php echo strtoupper($query_modules->id_module); ?>">
                                                                            <div class=" row form-group">
                                                                                <label for="inputName" class="col-sm-2 control-label">Module Name</label>

                                                                                <div class="col-sm-10">
                                                                                    <input type="text" class="form-control" name="module_name" id="inputName" placeholder="Module name" required value="<?php echo strtoupper($query_modules->module_name); ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class=" row form-group">
                                                                                <label for="inputName" class="col-sm-2 control-label">Description</label>

                                                                                <div class="col-sm-10">
                                                                                    <textarea name="module_description" class="form-control" placeholder="Description of the module"  required><?php echo strtoupper($query_modules->module_description); ?></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-primary" name="update_module" value="update_module">Save changes</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div id="delete<?php echo strtoupper($query_modules->id_module); ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLiveLabel">Deleting Module</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="" method="post">


                                                                            <h3 class="text-danger text-center">Delete this Module?</h3>
                                                                            <input type="hidden" class="form-control" name="id_module" value="<?php echo strtoupper($query_modules->id_module); ?>">
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">No</button>
                                                                                <button type="submit" name="delete_module" class="btn btn-danger" value="delete_module">Yes<button>
                                                                                        </div>



                                                                                        </form>
                                                                                        </div>

                                                                                        </div>
                                                                                        </div>
                                                                                        </div>


                                                                                        </tr>
<?php endforeach; ?>
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
