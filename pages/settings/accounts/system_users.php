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
                        System Users
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">System Users</li>
                    </ol>
                </section>
                <?php
                if (Input::exists() && Input::get('save_system_user') == 'save_system_user') {
                    $full_name = strtolower(Input::get('full_name'));
                    $telephone = strtolower(Input::get('contact'));
                    $email = strtolower(Input::get('email'));
                    $username = strtolower(Input::get('username'));
                    $usertype = Input::get('usertype');
                    $arrayNewUser = array("name" => $full_name, "contact" => $telephone, "email" => $email, "usertype" => $usertype, "username" => $username, "password" => sha1('@'.$username.'##'));
                    if (DB::getInstance()->insert('users', $arrayNewUser)) {
                        $notification = submissionReport('success', 'User ' . strtoupper($full_name) . ' registered successfully');
                    } else {
                        $notification = submissionReport('error', 'Failure in registering user ' . strtoupper($full_name));
                    }
                } elseif (Input::exists() && Input::get('save_edit_user') == 'save_edit_user') {
                    $id_user = Input::get('id_user');
                    $full_name = strtolower(Input::get('full_name'));
                    $telephone = strtolower(Input::get('contact'));
                    $email = strtolower(Input::get('email'));
                    $username = strtolower(Input::get('username'));
                    $usertype = Input::get('usertype');
                    $arrayUpdateUser = array("name" => $full_name, "contact" => $telephone, "email" => $email, "usertype" => $usertype, "username" => $username);
                    if (DB::getInstance()->update('users', $id_user, $arrayUpdateUser, 'id_user')) {
                        $notification = submissionReport('success', 'Record for user ' . strtoupper($full_name) . ' updated successfully');
                    } else {
                        $notification = submissionReport('error', 'Failure in updating record for user ' . strtoupper($full_name));
                    }
                } elseif (Input::exists() && Input::get('delete_user') == 'delete_user') {
                    $id_user = Input::get('id_user');
                    if(DB::getInstance()->query("DELETE FROM users WHERE id_user = $id_user")){
                        $notification = submissionReport('success', 'Record deleted successfully');
                    }else{
                        $notification = submissionReport('error', 'Failure in  deleting record');
                    }
                }
                ?>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <?php echo $notification; ?>
                        <!-- /.col -->
                        <div class="col-md-12">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#new_training" data-toggle="tab">Add New System User</a></li>
                                    <li><a href="#view_training" data-toggle="tab">View System Users</a></li>

                                </ul>
                                <div class="tab-content">
                                    <div class="active tab-pane" id="new_training" style="height: auto;">
                                        <div class="box">
                                            <div class="box-header">
                                                <h3 class="box-title">New System User</h3>
                                            </div>
                                            <div class="box-body">
                                                <form class="form-horizontal" action="" method="post">  
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Full Name</label>

                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputName" name="full_name" placeholder="Enter full name" autocomplete="off" required="true">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Telephone</label>

                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputName" name="contact" placeholder="Enter phone number" autocomplete="off" required="true">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Email</label>

                                                        <div class="col-sm-10">
                                                            <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Enter email address" autocomplete="off" required="true">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Usertype</label>

                                                        <div class="col-sm-10">
                                                            <select class="form-control select2" style="width: 100%;" name="usertype">
                                                                <option>--select--</option>
                                                                <option value="data_clerk">DATA CLERK</option>
                                                                <option value="admin">ADMINISTRATOR</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">Username</label>

                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputName" name="username" placeholder="Enter full name" autocomplete="off" required="true">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="save_system_user" value="save_system_user" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="view_training" style="height: auto;">
                                        <div class="box">
                                            <div class="box-header">
                                                <h3 class="box-title">Showing System Users</h3>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body" style="overflow-x:auto;">
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead class="text-uppercase">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>full name</th>
                                                            <th>telephone</th>
                                                            <th>email</th>
                                                            <th>username</th>
                                                            <th style="width:70px;">actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $x = 1;
                                                        $query_users = DB::getInstance()->query("SELECT * FROM users");
                                                        foreach ($query_users->results() as $query_users):
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $x; ?></td>
                                                                <td><?php echo strtoupper($query_users->name); ?> </td>
                                                                <td><?php echo $query_users->contact; ?> </td>
                                                                <td><?php echo $query_users->email; ?> </td>
                                                                <td><?php echo strtoupper($query_users->username); ?> </td>
                                                                <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_user<?php echo $query_users->id_user; ?>">
                                                                        Edit
                                                                    </button><button id="restricted_to_admin" type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target="#delete_user<?php echo $query_users->id_user; ?>">
                                                                        Delete
                                                                    </button></td>
                                                        <div class="modal fade modal" id="edit_user<?php echo $query_users->id_user; ?>">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span></button>
                                                                        <h4 class="modal-title text-uppercase text-primary text-center">edit system user details</h4>
                                                                    </div>
                                                                    <form action="" method="post">
                                                                        <div class="modal-body">
                                                                            <div class="box-body">
                                                                                <input type="hidden" class="form-control" name="id_user" value="<?php echo $query_users->id_user; ?>">
                                                                                <div class="row form-group">
                                                                                    <label class="col-sm-3 control-label">Full Name</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" class="form-control" id="inputName" name="full_name" placeholder="Enter full name" autocomplete="off" value="<?php echo strtoupper($query_users->name); ?>" required="true">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <label class="col-sm-3 control-label">Telephone</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" class="form-control" id="inputName" name="contact" placeholder="Enter telephone number" autocomplete="off" value="<?php echo strtoupper($query_users->contact); ?>" required="true">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <label class="col-sm-3 control-label">Email</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="email" class="form-control" id="inputName" name="email" placeholder="Enter email address" autocomplete="off" value="<?php echo strtolower($query_users->email); ?>" required="true">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <label class="col-sm-3 control-label">Usertype</label>

                                                                                    <div class="col-sm-9">
                                                                                        <select class="form-control select2" style="width: 100%;" name="usertype">
                                                                                            <option value="<?php echo strtolower($query_users->usertype); ?>"><?php echo strtoupper($query_users->usertype); ?></option>
                                                                                            <option value="data_clerk">DATA_CLERK</option>
                                                                                            <option value="admin">ADMIN</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <label class="col-sm-3 control-label">Username</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" class="form-control" id="inputName" name="username" placeholder="Enter username" autocomplete="off" value="<?php echo strtoupper($query_users->username); ?>" required="true">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                                            <button type="submit" name="save_edit_user" class="btn btn-primary" value="save_edit_user">Save changes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                        <!-- /.modal -->
                                                        <div class="modal fade modal" id="delete_user<?php echo $query_users->id_user; ?>">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span></button>
                                                                        <h4 class="modal-title text-uppercase text-primary text-center">delete alert</h4>
                                                                    </div>
                                                                    <form action="" method="post">
                                                                        <div class="modal-body">
                                                                            <div class="box-body">
                                                                                <h3 class="text-danger text-center">Delete this record?</h3>
                                                                                <input type="hidden" class="form-control" name="id_user" value="<?php echo $query_users->id_user; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">No</button>
                                                                            <button type="submit" name="delete_user" class="btn btn-primary" value="delete_user">Yes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                        <!-- /.modal -->
                                                        </tr>
                                                        <?php
                                                        $x++;
                                                    endforeach;
                                                    ?>

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
