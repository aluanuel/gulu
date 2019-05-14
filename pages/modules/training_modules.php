<!DOCTYPE html>
<html>
<?php include 'include/header.php';?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php include 'include/top_nav.php';?>
  <!-- Left side column. contains the logo and sidebar -->
<?php include 'include/side_nav.php';?>

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
      if(Input::exists() && Input::get('save_module') == 'save_module'){
      $module_name = strtolower(Input::get('module_name'));
      $module_desc = strtolower(Input::get('module_description'));
      $arrayNewModule = array("module_name" => $module_name,"module_description"=>$module_desc);
      if(DB::getInstance()->checkRows("SELECT * FROM modules WHERE module_name = '$module_name'")){

      }else{
        DB::getInstance()->insert('modules',$arrayNewModule);
      }
    }
    ?>

    <!-- Main content -->
    <section class="content">

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
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Module Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="module_name" id="inputName" placeholder="Module name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Description</label>

                    <div class="col-sm-10">
                      <textarea name="module_description" class="form-control" placeholder="Description of the module"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
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
                </tr>
                </thead>
                <tbody>
                  <?php 
                  $x = 1;
                    $query_modules = DB::getInstance()->query("SELECT * FROM modules");
                    foreach ($query_modules->results() as $query_modules):
                  ?>
                <tr>
                  <td><?php echo $x;?></td>
                  <td><?php echo strtoupper($query_modules->module_name);?></td>
                  <td><?php echo strtoupper($query_modules->module_description);?></td>
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
<?php include 'include/footer.php';?>
</body>
</html>
