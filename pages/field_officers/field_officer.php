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
                        Field Officers
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Field Officers</li>
                    </ol>
                </section>
                <?php
                if (Input::exists() && Input::get('save_field_officer') == 'save_field_officer') {
                    $enrolment_date = Input::get('join_date');
                    $name = strtolower(Input::get('full_name'));
                    $officer_code = Input::get('field_officer_code');
                    $area_coordinator = Input::get('id_area_coordinator');
                    $production_area = Input::get('id_production_area');
                    $district = Input::get('id_district');
                    $subcounty = strtolower(Input::get('subcounty'));
                    $parish = strtolower(Input::get('parish'));
                    $village = strtolower(Input::get('village'));
                    $telephone = Input::get('telephone');
                    $gender = Input::get('gender');
                    $age = Input::get('age');
                    $project = 'SDU';

                    if (DB::getInstance()->checkRows("SELECT * FROM field_officers WHERE fo_name = '$name' && id_production_area = '$production_area' && id_district = '$district'")) {
                        
                    } else {
                        $array_fo = array("join_date" => $enrolment_date, "fo_name" => $name, "field_officer_code" => $officer_code, "id_area_coordinator" => $area_coordinator, "id_production_area" => $production_area, "id_district" => $district, "subcounty" => $subcounty, "parish" => $parish, "village" => $village, "contact" => $telephone, "sex" => $gender, "age" => $age, "project" => $project);
                        if (DB::getInstance()->insert('field_officers', $array_fo)) {
                            $notification = submissionReport('success', 'Data updated successfully');
                        } else {
                            $notification = submissionReport('error', 'Failed to save');
                        }
                    }
                }

                if (Input::exists() && Input::get('update_fo') == 'update_fo') {

                    $id_field_officer = Input::get('id_field_officer');
                    $enrolment_date = Input::get('join_date');
                    $name = strtolower(Input::get('fo_name'));
                    $officer_code = Input::get('field_officer_code');
                    $area_coordinator = Input::get('id_area_coordinator');
                    $production_area = Input::get('id_production_area');
                    $district = Input::get('id_district');
                    $subcounty = strtolower(Input::get('subcounty'));
                    $parish = strtolower(Input::get('parish'));
                    $village = strtolower(Input::get('village'));
                    $telephone = Input::get('telephone');
                    $gender = Input::get('gender');
                    $age = Input::get('age');
                    $project = 'SDU';

                    $array_fo_update = array("join_date" => $enrolment_date, "fo_name" => $name, "field_officer_code" => $officer_code, "id_area_coordinator" => $area_coordinator, "id_production_area" => $production_area, "id_district" => $district, "subcounty" => $subcounty, "parish" => $parish, "village" => $village, "contact" => $telephone, "sex" => $gender, "age" => $age, "project" => $project);
                    if (DB::getInstance()->update('field_officers', $id_field_officer, $array_fo_update, 'id_field_officer')) {
                        $notification = submissionReport('success', 'Data updated successfully');
                    }
                } elseif (Input::exists() && Input::get('delete_fo') == 'delete_fo') {
                    $id_field_officer = Input::get('id_field_officer');
                    DB::getInstance()->query("DELETE FROM field_officers WHERE id_field_officers = $id_field_officers");
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
                                    <li class="active"><a href="#new_training" data-toggle="tab">Add New Field Officer</a></li>
                                    <li><a href="#view_training" data-toggle="tab">View Field Officers</a></li>

                                </ul>
                                <div class="tab-content">
                                    <div class="active tab-pane" id="new_training" style="height: auto;">
                                        <form class="form-horizontal" action="" method="post">
                                            <div class=" row form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Enrolment Date</label>

                                                <div class="col-sm-10">
                                                    <input type="date" class="form-control" id="inputName" name="join_date" autocomplete="off" required="true">
                                                </div>
                                            </div>
                                            <div class=" row form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Full Name</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName" name="full_name" placeholder="Enter full name" autocomplete="off" required="true">
                                                </div>
                                            </div>
                                            <div class=" row form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Field Officer Code</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName" name="field_officer_code" placeholder="Enter Field Officer code e.g 001" autocomplete="off" required="true">
                                                </div>
                                            </div>
                                            <div class=" row form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Area Coordinator</label>

                                                <div class="col-sm-10">
                                                    <select class="form-control select2" style="width: 100%;" name="id_area_coordinator">
                                                        <option>--Select--</option>
<?php
$query_ac = DB::getInstance()->query("SELECT * FROM area_coordinator");
foreach ($query_ac->results() as $query_ac):
    ?>
                                                            <option value="<?php echo $query_ac->id_area_coordinator; ?>"><?php echo strtoupper($query_ac->ac_name . ' ~ ' . $query_ac->ac_initials); ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class=" row form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Production Area</label>

                                                <div class="col-sm-10">
                                                    <select class="form-control select2" style="width: 100%;" name="id_production_area">
                                                        <option>--Select--</option>
<?php
$query_pdn_area = DB::getInstance()->query("SELECT * FROM production_area");
foreach ($query_pdn_area->results() as $pdn_area):
    ?>
                                                            <option value="<?php echo $pdn_area->id_production_area; ?>"><?php echo strtoupper($pdn_area->production_area); ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class=" row form-group">
                                                <label for="inputName" class="col-sm-2 control-label">District</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control select2" style="width: 100%;" name="id_district">
                                                        <option>--Select--</option>
<?php
$query_district = DB::getInstance()->query("SELECT * FROM district");
foreach ($query_district->results() as $query_district):
    ?>
                                                            <option value="<?php echo $query_district->id_district; ?>"><?php echo strtoupper($query_district->district_name); ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class=" row form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Subcounty</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName" name="subcounty" placeholder="Enter Subcounty Name" autocomplete="off" required="true">
                                                </div>
                                            </div>
                                            <div class=" row form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Parish</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName" name="parish" placeholder="Enter Parish Name" autocomplete="off" required="true">
                                                </div>
                                            </div>
                                            <div class=" row form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Village</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName" name="village" placeholder="Enter Village Name" autocomplete="off" required="true">
                                                </div>
                                            </div>
                                            <div class=" row form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Contact</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName" name="telephone" placeholder="Enter Phone Number" autocomplete="off" required="true">
                                                </div>
                                            </div>
                                            <div class=" row form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Sex</label>

                                                <div class="col-sm-10">
                                                    <select class="form-control select2" name="gender" style="width: 100%;">
                                                        <option>--Select--</option>
                                                        <option value="male">MALE</option>
                                                        <option value="female">FEMALE</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class=" row form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Age</label>

                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="inputName" name="age" placeholder="Enter Age eg. 27" autocomplete="off" required="true">
                                                </div>
                                            </div>
                                            <div class=" row form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-primary" name="save_field_officer" value="save_field_officer">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="view_training" style="height: auto;">
                                        <div class="box">
                                            <div class="box-header">
                                                <h3 class="box-title">List of Field Officers</h3>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body" style="overflow:auto;" >

                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead class="text-uppercase">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Field_officer_name</th>
                                                            <th>field_officer_code</th>
                                                            <th>area_coordinator</th>
                                                            <th>production_areaa</th>
                                                            <th>district</th>
                                                            <th>subcounty</th>
                                                            <th>parish</th>
                                                            <th>village</th>
                                                            <th>contact</th>
                                                            <th>sex</th>
                                                            <th>age</th>
                                                            <th>action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
<?php
$x = 1;
$query_fo = DB::getInstance()->query("SELECT * FROM field_officers");
foreach ($query_fo->results() as $query_fo):
    ?>
                                                            <tr>
                                                                <td><?php echo $x; ?></td>
                                                                <td><?php echo strtoupper($query_fo->fo_name); ?></td>
                                                                <td><?php echo strtoupper($query_fo->field_officer_code); ?></td>
                                                                <td><?php echo strtoupper(getSpecificDetails('area_coordinator', 'ac_initials', 'id_area_coordinator=' . $query_fo->id_area_coordinator)); ?></td>
                                                                <td><?php echo strtoupper(getSpecificDetails('production_area', 'production_area', 'id_production_area=' . $query_fo->id_production_area)); ?></td>
                                                                <td><?php echo strtoupper(getSpecificDetails('district', 'district_name', 'id_district=' . $query_fo->id_district)); ?></td>
                                                                <td><?php echo strtoupper($query_fo->subcounty); ?></td>
                                                                <td><?php echo strtoupper($query_fo->parish); ?></td>
                                                                <td><?php echo strtoupper($query_fo->village); ?></td>
                                                                <td><?php echo strtoupper($query_fo->contact); ?></td>
                                                                <td><?php echo strtoupper($query_fo->sex); ?></td>
                                                                <td><?php echo $query_fo->age; ?></td>
                                                                <td>                  <!-- Button trigger modal -->
                                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $query_fo->id_field_officer; ?>">
                                                                        Edit
                                                                    </button></td>




                                                                <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal<?php echo $query_fo->id_field_officer; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title text-center" id="exampleModalLabel">Edit Field officers</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <form class="form-horizontal" action="" method="post">
                                                                            <input type="hidden" class="form-control" id="inputName" name="id_field_officer" autocomplete="off" required="true" value="<?php echo $query_fo->id_field_officer; ?>">
                                                                            <div class=" row form-group">
                                                                                <label for="inputName" class="col-sm-3 control-label">Enrolment Date</label>

                                                                                <div class="col-sm-9">
                                                                                    <input type="date" class="form-control" id="inputName" name="join_date" autocomplete="off" required="true" required value="<?php echo $query_fo->join_date; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class=" row form-group">
                                                                                <label for="inputName" class="col-sm-3 control-label">Full Name</label>

                                                                                <div class="col-sm-9">
                                                                                    <input type="text" class="form-control" id="inputName" name="fo_name" placeholder="Enter full name" autocomplete="off" required="true" value="<?php echo strtoupper($query_fo->fo_name); ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class=" row form-group">
                                                                                <label for="inputName" class="col-sm-3 control-label">Field Officer Code</label>

                                                                                <div class="col-sm-9">
                                                                                    <input type="text" class="form-control" id="inputName" name="field_officer_code" placeholder="Enter Field Officer code e.g 001" autocomplete="off" required="true" value="<?php echo $query_fo->field_officer_code; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class=" row form-group">
                                                                                <label for="inputName" class="col-sm-3 control-label">Area Coordinator</label>

                                                                                <div class="col-sm-9">
                                                                                    <select class="form-control select2" style="width: 100%;" name="id_area_coordinator">
                                                                                        <option value="<?php echo $query_fo->id_area_coordinator; ?>"><?php echo strtoupper(getSpecificDetails('area_coordinator', 'ac_initials', 'id_area_coordinator=' . $query_fo->id_area_coordinator)); ?></option>
    <?php
    $query_ac = DB::getInstance()->query("SELECT * FROM area_coordinator");
    foreach ($query_ac->results() as $query_ac):
        ?>
                                                                                            <option value="<?php echo $query_ac->id_area_coordinator; ?>"><?php echo strtoupper($query_ac->ac_name . ' ~ ' . $query_ac->ac_initials); ?></option>
                                                                                        <?php endforeach; ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class=" row form-group">
                                                                                <label for="inputName" class="col-sm-3 control-label">Production Area</label>

                                                                                <div class="col-sm-9">
                                                                                    <select class="form-control select2" style="width: 100%;" name="id_production_area">
                                                                                        <option value="<?php echo $query_fo->id_field_officer; ?>"><?php echo strtoupper(getSpecificDetails('production_area', 'production_area', 'id_production_area=' . $query_fo->id_production_area)); ?></option>
    <?php
    $query_pdn_area = DB::getInstance()->query("SELECT * FROM production_area");
    foreach ($query_pdn_area->results() as $pdn_area):
        ?>
                                                                                            <option value="<?php echo $pdn_area->id_production_area; ?>"><?php echo strtoupper($pdn_area->production_area); ?></option>
                                                                                        <?php endforeach; ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class=" row form-group">
                                                                                <label for="inputName" class="col-sm-3 control-label">District</label>
                                                                                <div class="col-sm-9">
                                                                                    <select class="form-control select2" style="width: 100%;" name="id_district">
                                                                                        <option value="<?php echo $query_fo->id_field_officer; ?>"><?php echo strtoupper(getSpecificDetails('district', 'district_name', 'id_district=' . $query_fo->id_district)); ?></option>
    <?php
    $query_district = DB::getInstance()->query("SELECT * FROM district");
    foreach ($query_district->results() as $query_district):
        ?>
                                                                                            <option value="<?php echo $query_district->id_district; ?>"><?php echo strtoupper($query_district->district_name); ?></option>
                                                                                        <?php endforeach; ?>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class=" row form-group">
                                                                                <label for="inputName" class="col-sm-3 control-label">Subcounty</label>

                                                                                <div class="col-sm-9">
                                                                                    <input type="text" class="form-control" id="inputName" name="subcounty" placeholder="Enter Subcounty Name" autocomplete="off" required="true" value="<?php echo strtoupper($query_fo->subcounty); ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class=" row form-group">
                                                                                <label for="inputName" class="col-sm-3 control-label">Parish</label>

                                                                                <div class="col-sm-9">
                                                                                    <input type="text" class="form-control" id="inputName" name="parish" placeholder="Enter Parish Name" autocomplete="off" required="true" value="<?php echo strtoupper($query_fo->parish); ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class=" row form-group">
                                                                                <label for="inputName" class="col-sm-3 control-label">Village</label>

                                                                                <div class="col-sm-9">
                                                                                    <input type="text" class="form-control" id="inputName" name="village" placeholder="Enter Village Name" autocomplete="off" required="true" value="<?php echo strtoupper($query_fo->village); ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class=" row form-group">
                                                                                <label for="inputName" class="col-sm-3 control-label">Contact</label>

                                                                                <div class="col-sm-9">
                                                                                    <input type="text" class="form-control" id="inputName" name="telephone" placeholder="Enter Phone Number" autocomplete="off" required="true" value="<?php echo strtoupper($query_fo->contact); ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class=" row form-group">
                                                                                <label for="inputName" class="col-sm-3 control-label">Sex</label>

                                                                                <div class="col-sm-9">
                                                                                    <select class="form-control select2" name="gender" style="width: 100%;">
                                                                                        <option><?php echo strtoupper($query_fo->sex); ?></option>
                                                                                        <option value="male">MALE</option>
                                                                                        <option value="female">FEMALE</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class=" row form-group">
                                                                                <label for="inputName" class="col-sm-3 control-label">Age</label>

                                                                                <div class="col-sm-9">
                                                                                    <input type="number" class="form-control" id="inputName" name="age" placeholder="Enter Age eg. 27" autocomplete="off" required="true" value="<?php echo $query_fo->age; ?>">
                                                                                </div>
                                                                            </div>

                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-primary" name="update_fo" value="update_fo">Save changes</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>



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
