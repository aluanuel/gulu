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
                        training of farmers
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">training of farmers</li>
                    </ol>
                </section>
                <?php
                if (Input::exists() && Input::get('save_training') == 'save_training') {
                    //$name_pdn_area = strtolower(Input::get('name_production_area'));
                    $district = Input::get('select_id_district');
                    $subcounty = Input::get('select_id_subcounty');
                    $parish = Input::get('select_id_parish');
                  //  $village = Input::get('select_id_village');
                    $training_date = Input::get('training_date');
                    $id_area_coordinator = Input::get('id_area_coordinator');
                    $id_field_officer = Input::get('id_field_officer');
                    $id_lead_farmer = Input::get('id_lead_farmer');
                    $fo_name = Input::get('fo_name');
                    $lf_name = Input::get('lf_name');
                    $id_module = Input::get('id_module');
                    $module_repetition = Input::get('module_repetition');
                    $male_ofs = Input::get('male_ofs');
                    $female_ofs = Input::get('female_ofs');
                    $female_youth_ofs = Input::get('female_youth_ofs');
                    $male_youth_ofs = Input::get('male_youth_ofs');
                    $total_ofs = Input::get('total_ofs');
                    $total_youth_ofs = Input::get('total_youth_ofs');
                    $lfs = Input::get('lfs');
                    $ofs = Input::get('ofs');
                    $others = Input::get('others');
                    $reviewed_by = Input::get('reviewed_by');
                   // $occurred_on = Input::get('occurred_on');
                    $id_training_venue=Input::get('id_training_venue');
//                    $new_district = Input::get('name_district');

                    // check if the input values are numbers(id) or text.
//                    if ($district == 'new_district') {
//                        $arrayNewDistrict = array("district_name" => $new_district);
//                        if (DB::getInstance()->checkRows("SELECT * FROM district WHERE district_name = '$new_district'")) {
//                            
//                        } else {
//                            DB::getInstance()->insert('district', $arrayNewDistrict);
//                            $district = getLastInsertId('district', 'id_district');
//                        }
//                    }

                    if (DB::getInstance()->checkRows("SELECT * FROM training_farmers WHERE training_date = '$training_date' AND id_district = '$district' AND id_subcounty = '$subcounty' AND id_parish = '$parish' AND id_training_venue='$id_training_venue'
                   AND id_area_coordinator = '$id_area_coordinator' AND id_field_officer = '$id_field_officer' AND id_lead_farmer = '$id_lead_farmer' AND fo_name = '$fo_name' AND lf_name = '$lf_name' AND id_module = '$id_module' AND module_repetition = '$module_repetition' AND male_ofs = '$male_ofs' AND female_ofs = '$female_ofs' AND male_youth_ofs = '$male_youth_ofs'AND female_youth_ofs = '$female_youth_ofs' AND total_ofs = '$total_ofs'AND total_youth_ofs = '$total_youth_ofs'AND lfs = '$lfs' AND ofs = '$ofs' AND others = '$others'AND reviewed_by = '$reviewed_by'
                    
                    ")) {
                        
                    } else {
                        $arrayNewTrainingFarmer = array("training_date" => $training_date, "id_district" => $district, "id_subcounty" => $subcounty
                            , "id_parish" => $parish,"id_training_venue"=>$id_training_venue, "id_area_coordinator"=>$id_area_coordinator, "id_field_officer"=>$id_field_officer,"id_lead_farmer"=>$id_lead_farmer, "fo_name"=>$fo_name, "lf_name"=>$lf_name, "id_module"=>$id_module , "module_repetition"=>$module_repetition , "male_ofs"=>$male_ofs, "female_ofs"=>$female_ofs, "male_youth_ofs"=>$male_youth_ofs, "female_youth_ofs"=>$female_youth_ofs, "total_ofs"=>$total_ofs, "total_youth_ofs"=>$total_youth_ofs, "lfs"=>$lfs, "ofs"=>$ofs, "others"=>$others, "reviewed_by"=>$reviewed_by);
                        
                        DB::getInstance()->insert('training_farmers', $arrayNewTrainingFarmer);
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
                                    <li class="active"><a href="#new_training" data-toggle="tab">Add New training of farmers</a></li>
                                    <li><a href="#view_training" data-toggle="tab">View training of farmers</a></li>

                                </ul>
                                <div class="tab-content">
                                    <div class="active tab-pane" id="new_training" style="height: auto;">
                                        <div class="box">
                                            <div class="box-header">
                                                <h3 class="box-title">New training of farmers</h3>
                                            </div>
                                            <div class="box-body">
                                                <form class="form-horizontal" action="" method="post">
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-2 control-label">Training date</label>

                                                        <div class="col-sm-10">
                                                            <input type="date" class="form-control" id="inputName" name="training_date" placeholder="Enter Date of training" autocomplete="off">
                                                        </div>
                                                    </div>
                                                   <div class="form-group">

                    <label for="inputName" class="col-sm-2 control-label">Area Coordinator</label>



                    <div class="col-sm-10">

                      <select class="form-control select2" style="width: 100%;" name="id_area_coordinator">

                  <option>--Select--</option>

                  <?php

                    $query_ac = DB::getInstance()->query("SELECT * FROM area_coordinator");

                    foreach ($query_ac->results() as $query_ac):

                  ?>

                  <option value="<?php echo $query_ac->id_area_coordinator; ?>"><?php echo strtoupper($query_ac->ac_name.' ~ '.$query_ac->ac_initials);?></option>

                <?php endforeach; ?>

                </select>

                    </div>

                  </div>
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-2 control-label">Field officer Code</label>

                                                        <div class="col-sm-10">
                                                            <select class="form-control select2" style="width: 100%;" id="select_id_district" name="select_id_district">
                                                                <option>--Select--</option>
                                                                <?php $district_query = DB::getInstance()->query("SELECT * FROM district");
                                                                    foreach($district_query->results() as $district_query):
                                                                ?>
                                                                <option  value="<?php echo $district_query->id_district; ?>"><?php echo strtoupper($district_query->district_name);?></option>
                                                                <?php endforeach;?>
                                                                <option value="new_district">Add District</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="fo_name">
                                                        <label for="inputName" class="col-sm-2 control-label">Field Officer name</label>

                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputName" name="fo_name" placeholder="Enter name offield officer" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-2 control-label">Lead Farmer Code</label>

                                                        <div class="col-sm-10">
                                                            <select class="form-control select2" style="width: 100%;" id="select_id_district" name="select_id_district">
                                                                <option>--Select--</option>
                                                                <?php $district_query = DB::getInstance()->query("SELECT * FROM district");
                                                                    foreach($district_query->results() as $district_query):
                                                                ?>
                                                                <option  value="<?php echo $district_query->id_district; ?>"><?php echo strtoupper($district_query->district_name);?></option>
                                                                <?php endforeach;?>
                                                                <option value="new_district">Add District</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="new_parish">
                                                        <label for="inputName" class="col-sm-2 control-label">Lead Farmer name</label>

                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputName" name="name" placeholder="Enter name of lead farmer" autocomplete="off">
                                                        </div>
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="inputName" class="col-sm-2 control-label">Training Venue</label>

                                                        <div class="col-sm-10">
                                                            <select class="form-control select2" style="width: 100%;" id="select_id_district" name="select_id_district">
                                                                <option>--Select--</option>
                                                                <?php $district_query = DB::getInstance()->query("SELECT * FROM district");
                                                                    foreach($district_query->results() as $district_query):
                                                                ?>
                                                                <option  value="<?php echo $district_query->id_district; ?>"><?php echo strtoupper($district_query->district_name);?></option>
                                                                <?php endforeach;?>
                                                                <option value="new_district">Add District</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="inputName" class="col-sm-2 control-label">District</label>

                                                        <div class="col-sm-10">
                                                            <select class="form-control select2" style="width: 100%;" id="select_id_district" name="select_id_district">
                                                                <option>--Select--</option>
                                                                <?php $district_query = DB::getInstance()->query("SELECT * FROM district");
                                                                    foreach($district_query->results() as $district_query):
                                                                ?>
                                                                <option  value="<?php echo $district_query->id_district; ?>"><?php echo strtoupper($district_query->district_name);?></option>
                                                                <?php endforeach;?>
                                                                <option value="new_district">Add District</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="new_district">
                                                        <label for="inputName" class="col-sm-2 control-label">Name of District</label>

                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputName" name="name_district" placeholder="Enter name of District" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-2 control-label">Subcounty</label>

                                                        <div class="col-sm-10">
                                                            <select class="form-control select2" style="width: 100%;" id="select_id_subcounty" name="select_id_subcounty">
                                                                <option>--Select--</option>
                                                                <?php $subcounty_query = DB::getInstance()->query("SELECT * FROM subcounty");
                                                                    foreach($subcounty_query->results() as $subcounty_query):
                                                                ?>
                                                                <option  value="<?php echo $subcounty_query->id_subcounty; ?>"><?php echo strtoupper($subcounty_query->subcounty_name);?></option>
                                                                <?php endforeach;?>
                                                                <option value="new_subcounty">Add Subcounty</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="new_subcounty">
                                                        <label for="inputName" class="col-sm-2 control-label">Subcounty</label>

                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputName" name="name_district" placeholder="Enter name of District" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-2 control-label">Parish</label>

                                                        <div class="col-sm-10">
                                                            <select class="form-control select2" style="width: 100%;" id="select_id_parish" name="select_id_parish">
                                                                <option>--Select--</option>
                                                                <?php $parish_query = DB::getInstance()->query("SELECT * FROM parish");
                                                                    foreach($parish_query->results() as $parish_query):
                                                                ?>
                                                                <option  value="<?php echo $parish_query->id_parish; ?>"><?php echo strtoupper($parish_query->parish_name);?></option>
                                                                <?php endforeach;?>
                                                                <option value="new_parish">Add Parish</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-2 control-label">Village</label>

                                                        <div class="col-sm-10">
                                                            <select class="form-control select2" style="width: 100%;" id="select_id_village" name="select_id_village">
                                                                <option>--Select--</option>
                                                                <option  value="1">Arua</option>
                                                                <option>California</option>
                                                                <option>Delaware</option>
                                                                <option>Tennessee</option>
                                                                <option>Texas</option>
                                                                <option value="new_village">Add Village</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="new_module">
                                                        <label for="inputName" class="col-sm-2 control-label">Module</label>

                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputName" name="id_module" placeholder="Enter module" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="new_module">
                                                        <label for="inputName" class="col-sm-2 control-label">Module Repetition</label>

                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputName" name="module_repetition" placeholder="Enter module repetition" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="new_module">
                                                        <label for="inputName" class="col-sm-2 control-label">Male Organic farmers</label>

                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputName" name="male_ofs" placeholder="Enter number of male organic farmers" autocomplete="off">
                                                        </div>
                                                    </div>
                                                     <div class="form-group" id="new_module">
                                                        <label for="inputName" class="col-sm-2 control-label">Female Organic farmers</label>

                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputName" name="female_ofs" placeholder="Enter number of female organic farmers" autocomplete="off">
                                                        </div>
                                                    </div>
                                                     <div class="form-group" id="new_module">
                                                        <label for="inputName" class="col-sm-2 control-label">Male Youth Organic farmers</label>

                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputName" name="male_youth_ofs" placeholder="Enter number of male youth organic farmers" autocomplete="off">
                                                        </div>
                                                    </div>
                                                     <div class="form-group" id="new_module">
                                                        <label for="inputName" class="col-sm-2 control-label">Female Youth Organic farmers</label>

                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputName" name="female_youth_ofs" placeholder="Enter number of female youth organic farmers" autocomplete="off">
                                                        </div>
                                                    </div>
                                                     <div class="form-group" id="new_module">
                                                        <label for="inputName" class="col-sm-2 control-label">Total Number of Organic farmers</label>

                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputName" name="total_ofs" placeholder="" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="new_module">
                                                        <label for="inputName" class="col-sm-2 control-label">Total Number of Youth Organic farmers</label>

                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputName" name="total_youth_ofs" placeholder="" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="new_module">
                                                        <label for="inputName" class="col-sm-2 control-label">Lead Farmers</label>

                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputName" name="lfs" placeholder=" Enter Attendance" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="new_module">
                                                        <label for="inputName" class="col-sm-2 control-label">Organic Farmers</label>

                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputName" name="ofs" placeholder=" Enter Attendance of organic famers" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="new_module">
                                                        <label for="inputName" class="col-sm-2 control-label">Others</label>

                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputName" name="others" placeholder=" Enter Attendance of others" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="new_module">
                                                        <label for="inputName" class="col-sm-2 control-label">Reviewed By</label>

                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputName" name="reviewed_by" placeholder=" Reviewed By.." autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="form-group" id="new_module">
                                                        <label for="inputName" class="col-sm-2 control-label">Data Entry date</label>

                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputName" name="occuured_on" placeholder=" Enter Attendance" autocomplete="off">
                                                        </div>
                                                    </div> 

                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="save_training" value="save_training" class="btn btn-primary">Save Training</button>
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
                                                <h3 class="box-title">Data Table With Full Features</h3>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead class="text-uppercase">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>name of production area</th>
                                                            <th>district</th>
                                                            <th>subcounty</th>
                                                            <th>parish</th>
                                                            <th>village</th>
                                                            <th>action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $x = 1;
                                                        $production_query = DB::getInstance()->query("SELECT * FROM production_area");
                                                        foreach ($production_query->results() as $production):
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $x; ?></td>
                                                                <td><?php echo strtoupper($production->production_area); ?> </td>
                                                                <td><?php echo strtoupper(getSpecificDetails('district','district_name','id_district='.$production->id_district)); ?> </td>
                                                                <td><?php echo strtoupper(getSpecificDetails('subcounty','subcounty_name','id_subcounty='.$production->id_subcounty)); ?> </td>
                                                                <td><?php echo strtoupper(getSpecificDetails('parish','parish_name','id_parish='.$production->id_parish)); ?> </td>
                                                                <td><?php echo $production->id_village; ?> </td>
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
