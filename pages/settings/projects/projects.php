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
                        Projects
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Projects</li>
                    </ol>
                </section>
                <?php
                if (Input::exists() && Input::get('save_project') == 'save_project') {
                    $project_name = strtolower(Input::get('project_name'));
                    $project_description = strtolower(Input::get('project_description'));
                    $project_initials = strtolower(Input::get('project_initials'));

                    if (DB::getInstance()->checkRows("SELECT * FROM projects WHERE project_name = '$project_name' AND project_initials = '$project_initials'")) {
                        $notification = submissionReport('error','A project with name '.strtoupper($project_name).' exists in the database');
                    } else {
                        $arrayNewProject= array("project_name" => $project_name, "project_description" => $project_description, "project_initials" => $project_initials);
                        if(DB::getInstance()->insert('projects', $arrayNewProject))
                        {
                            $notification = submissionReport("success","Data saved succcessfully");
                        }else{
                           $notification = submissionReport('error',"Data not saved"); 
                        }
                    }
                }
                if (Input::exists() && Input::get('save_edit_project') == 'save_edit_project') {
                    $id_project = Input::get('id_project');
                    $project_name = strtolower(Input::get('project_name'));
                    $project_description = strtolower(Input::get('project_description'));
                    $project_initials = strtolower(Input::get('project_initials'));
                    $arrayUpdateProject = array("project_name" => $project_name, "project_description" => $project_description, "project_initials" => $project_initials);
                    if(DB::getInstance()->update("projects", $id_project, $arrayUpdateProject, "id_project")){
                        $notification = submissionReport('success','Project '.strtoupper($project_name).' updated succcessfully');
                    }else{
                        $notification = submissionReport('error','Failure in updating project '.strtoupper($project_name));
                    }
                }elseif (Input::exists() && Input::get('delete_project') == 'delete_project'){
                           $id_project = Input::get('id_project');
                           if(DB::getInstance()->query("DELETE FROM projects WHERE id_project = $id_project")){
                            $notification = submissionReport('success','Project deleted successfully');
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
                                    <li class="active"><a href="#new_training" data-toggle="tab">Add New Project</a></li>
                                    <li><a href="#view_training" data-toggle="tab">View Projects</a></li>

                                </ul>
                                <div class="tab-content">
                                    <div class="active tab-pane" id="new_training" style="height: auto;">
                                        <div class="box">
                                            <div class="box-header">
                                                <h3 class="box-title">New Project</h3>
                                            </div>
                                            <div class="box-body">
                                                <form class="form-horizontal" action="" method="post">  
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-2 control-label">Project Name</label>

                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputName" name="project_name" placeholder="Enter project name" required="required" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-2 control-label">Description</label>

                                                        <div class="col-sm-10">
                                                            <textarea class="form-control" id="inputName" name="project_description" placeholder="Describe project in less than 200 words" required="required" autocomplete="off"></textarea> 
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-2 control-label">Project Initials</label>

                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputName" name="project_initials" placeholder="Enter project initials" required="required" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="save_project" value="save_project" class="btn btn-primary">Save</button>
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
                                                <h3 class="box-title">List of Projects</h3>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body" style="overflow-x:auto;">
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead class="text-uppercase">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>project name</th>
                                                            <th>project description</th>
                                                            <th>project initials</th>
                                                            <th style="width:70px;">actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $x = 1;
                                                        $project_query = DB::getInstance()->query("SELECT * FROM projects");
                                                        foreach ($project_query->results() as $project_query):
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $x; ?></td>
                                                                <td><?php echo strtoupper($project_query->project_name); ?> </td>
                                                                <td><?php echo strtoupper($project_query->project_description); ?> </td>
                                                                <td><?php echo strtoupper($project_query->project_initials); ?> </td>
                                                                <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_project<?php echo $project_query->id_project; ?>">
                                                                        Edit
                                                                    </button><button id="restricted_to_admin" type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target="#delete_project<?php echo $project_query->id_project; ?>">
                                                                        Delete
                                                                    </button></td>
                                                        <div class="modal fade modal" id="edit_project<?php echo $project_query->id_project; ?>">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span></button>
                                                                        <h4 class="modal-title text-uppercase text-primary text-center">edit project</h4>
                                                                    </div>
                                                                    <form action="" method="post">
                                                                        <div class="modal-body">
                                                                            <div class="box-body">

                                                                                <div class="row form-group">
                                                                                    <label for="inputName" class="col-sm-3 control-label">Project Name</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="hidden" class="form-control" name="id_project" value="<?php echo $project_query->id_project; ?>">
                                                                                        <input type="text" class="form-control" id="inputName" name="project_name" placeholder="Enter project name" autocomplete="off" value="<?php echo strtoupper($project_query->project_name); ?>">
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                <div class="row form-group">
                                                                                    <label for="inputName" class="col-sm-3 control-label">Description</label>
                                                                                    <div class="col-sm-9">
                                                                                        <textarea class="form-control" id="inputName" name="project_description" placeholder="Type project description in less than 200 words" autocomplete="off"><?php echo $project_query->project_description; ?></textarea> 
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <label for="inputName" class="col-sm-3 control-label">Project Initials</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" class="form-control" id="inputName" name="project_initials" placeholder="Enter project initials" autocomplete="off" value="<?php echo strtoupper($project_query->project_initials); ?>">
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                                            <button type="submit" name="save_edit_project" class="btn btn-primary" value="save_edit_project">Save changes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                        <!-- /.modal -->
                                                        <div class="modal fade modal" id="delete_project<?php echo $project_query->id_project; ?>">
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
                                                                                <input type="hidden" class="form-control" name="id_project" value="<?php echo $project_query->id_project; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">No</button>
                                                                            <button type="submit" name="delete_project" class="btn btn-primary" value="delete_project">Yes</button>
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
