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
                        Training Venue
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Training Venue</li>
                    </ol>
                </section>
                <?php
                if (Input::exists() && Input::get('save_training_venue') == 'save_training_venue') {
                    $name_training_venue = strtolower(Input::get('name_training_venue'));
                    $pdn_area = strtolower(Input::get('id_production_area'));
                    $district = Input::get('id_district');
                    $subcounty = Input::get('id_subcounty');
                    $parish = Input::get('id_parish');
                    $location = Input::get('location_training_venue');

                    if (DB::getInstance()->checkRows("SELECT * FROM training_venue WHERE venue_name = '$name_training_venue' AND id_production_area = '$pdn_area' AND id_district = '$district' AND id_subcounty = '$subcounty' AND id_parish = '$parish'")) {
                        
                    } else {
                        $arrayNewTrainingVenue = array("venue_name"=>$name_training_venue,"id_production_area"=>$pdn_area,"id_district"=>$district,"id_subcounty"=>$subcounty,"id_parish"=>$parish,"location"=>$location);
                        DB::getInstance()->insert('training_venue', $arrayNewTrainingVenue);
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
                                    <li class="active"><a href="#new_training" data-toggle="tab">Add New Training Venue</a></li>
                                    <li><a href="#view_training" data-toggle="tab">View Training Venues</a></li>

                                </ul>
                                <div class="tab-content">
                                    <div class="active tab-pane" id="new_training" style="height: auto;">
                                        <div class="box">
                                            <div class="box-header">
                                                <h3 class="box-title">New Training Venue</h3>
                                            </div>
                                            <div class="box-body">
                                                <form class="form-horizontal" action="" method="post">  
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-2 control-label">Venue Name</label>

                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputName" name="name_training_venue" placeholder="Enter name of venue" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-2 control-label">Production Area</label>

                                                        <div class="col-sm-10">
                                                            <select class="form-control select2" style="width: 100%;" id="select_id_production_area" name="id_production_area">
                                                                <option>--Select--</option>
                                                                <?php $query_pdn_area = DB::getInstance()->query("SELECT * FROM production_area");
                                                                    foreach($query_pdn_area->results() as $query_pdn_area):
                                                                ?>
                                                                <option  value="<?php echo $query_pdn_area->id_production_area; ?>"><?php echo strtoupper($query_pdn_area->production_area);?></option>
                                                                <?php endforeach;?>
                                                                <option value="new_production_area">Add Production Area</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-2 control-label">District</label>

                                                        <div class="col-sm-10">
                                                            <select class="form-control select2" style="width: 100%;" id="select_id_district" name="id_district">
                                                                <option>--Select--</option>
                                                                <?php $district_query = DB::getInstance()->query("SELECT * FROM district");
                                                                    foreach($district_query->results() as $district_query):
                                                                ?>
                                                                <option  value="<?php echo $district_query->id_district; ?>"><?php echo strtoupper($district_query->district_name);?></option>
                                                                <?php endforeach;?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-2 control-label">Subcounty</label>

                                                        <div class="col-sm-10">
                                                            <select class="form-control select2" style="width: 100%;" id="select_id_subcounty" name="id_subcounty">
                                                                <option>--Select--</option>
                                                                <?php $subcounty_query = DB::getInstance()->query("SELECT * FROM subcounty");
                                                                    foreach($subcounty_query->results() as $subcounty_query):
                                                                ?>
                                                                <option  value="<?php echo $subcounty_query->id_subcounty; ?>"><?php echo strtoupper($subcounty_query->subcounty_name);?></option>
                                                                <?php endforeach;?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-2 control-label">Parish</label>

                                                        <div class="col-sm-10">
                                                            <select class="form-control select2" style="width: 100%;" id="select_id_parish" name="id_parish">
                                                                <option>--Select--</option>
                                                                <?php $parish_query = DB::getInstance()->query("SELECT * FROM parish");
                                                                    foreach($parish_query->results() as $parish_query):
                                                                ?>
                                                                <option  value="<?php echo $parish_query->id_parish; ?>"><?php echo strtoupper($parish_query->parish_name);?></option>
                                                                <?php endforeach;?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-2 control-label">Location</label>

                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputName" name="location_training_venue" placeholder="Enter name of place" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="save_training_venue" value="save_training_venue" class="btn btn-primary">Save</button>
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
                                                <h3 class="box-title">List of Training Venues</h3>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead class="text-uppercase">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>venue name</th>
                                                            <th>production area</th>
                                                            <th>district</th>
                                                            <th>subcounty</th>
                                                            <th>parish</th>
                                                            <th>action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $x = 1;
                                                        $training_query = DB::getInstance()->query("SELECT * FROM training_venue");
                                                        foreach ($training_query->results() as $training_query):
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $x; ?></td>
                                                                <td><?php echo strtoupper($training_query->venue_name); ?> </td>
                                                                <td><?php echo strtoupper(getSpecificDetails('production_area','production_area','id_production_area='.$training_query->id_production_area)); ?> </td>
                                                                <td><?php echo strtoupper(getSpecificDetails('district','district_name','id_district='.$training_query->id_district)); ?> </td>
                                                                <td><?php echo strtoupper(getSpecificDetails('subcounty','subcounty_name','id_subcounty='.$training_query->id_subcounty)); ?> </td>
                                                                <td><?php echo strtoupper(getSpecificDetails('parish','parish_name','id_parish='.$training_query->id_parish)); ?> </td>
                                                                <td></td>
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
