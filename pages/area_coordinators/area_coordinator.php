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
                        Area Coordinators
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Area Coordinators</li>
                    </ol>
                </section>
                <?php
                if (Input::exists() && Input::get('save_area_coordinator') == 'save_area_coordinator') {
                    $enrolment_date = Input::get('enrolment_date');
                    $name = strtolower(Input::get('full_name'));
                    $initials = strtolower(Input::get('coordinator_initials'));
                    $production_area = Input::get('id_production_area');
                    $district = Input::get('id_district');
                    $subcounty = strtolower(Input::get('subcounty'));
                    $parish = strtolower(Input::get('parish'));
                    $village = strtolower(Input::get('village'));
                    $telephone = Input::get('telephone');
                    $gender = Input::get('gender');
                    $age = Input::get('age');

                    if (DB::getInstance()->checkRows("SELECT * FROM area_coordinator WHERE ac_name = '$name' && id_production_area = '$production_area' && id_district = '$district'")) {
                        
                    } else {
                        $array_ac = array("join_date" => $enrolment_date, "ac_name" => $name, "ac_initials" => $initials, "id_production_area" => $production_area, "id_district" => $district, "subcounty" => $subcounty, "parish" => $parish, "village" => $village, "contact" => $telephone, "sex" => $gender, "age" => $age);
                        DB::getInstance()->insert('area_coordinator', $array_ac);
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
                                    <li class="active"><a href="#new_training" data-toggle="tab">Add New Area Coordinator</a></li>
                                    <li><a href="#view_training" data-toggle="tab">View Area Coordinators</a></li>

                                </ul>
                                <div class="tab-content">
                                    <div class="active tab-pane" id="new_training" style="height: auto;">
                                        <form class="form-horizontal" action="" method="post">
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Enrolment Date</label>

                                                <div class="col-sm-10">
                                                    <input type="date" class="form-control" id="inputName" name="enrolment_date" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Full Name</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName" name="full_name" placeholder="Enter full name" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Coorinator Initials</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName" name="coordinator_initials" placeholder="Enter Initials eg. ED" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group">
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
                                            <div class="form-group">
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
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Subcounty</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName" name="subcounty" placeholder="Enter Subcounty Name" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Parish</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName" name="parish" placeholder="Enter Parish Name" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Village</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName" name="village" placeholder="Enter Village Name" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Contact</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName" name="telephone" placeholder="Enter Phone Number" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Sex</label>

                                                <div class="col-sm-10">
                                                    <select class="form-control select2" name="gender" style="width: 100%;">
                                                        <option>--Select--</option>
                                                        <option value="male">MALE</option>
                                                        <option value="female">FEMALE</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Age</label>

                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="inputName" name="age" placeholder="Enter Age eg. 27" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-primary" name="save_area_coordinator" value="save_area_coordinator">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="view_training" style="height: auto;">
                                        <div class="box">
                                            <div class="box-header">
                                                <h3 class="box-title">List of Area Coordinators</h3>
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead class="text-uppercase">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>name</th>
                                                            <th>ac</th>
                                                            <th>pa</th>
                                                            <th>district</th>
                                                            <th>subcounty</th>
                                                            <th>parish</th>
                                                            <th>village</th>
                                                            <th>contact</th>
                                                            <th>sex</th>
                                                            <th>age</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $x = 1;
                                                        $query_ac = DB::getInstance()->query("SELECT * FROM area_coordinator");
                                                        foreach ($query_ac->results() as $query_ac):
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $x; ?></td>
                                                                <td><?php echo strtoupper($query_ac->ac_name); ?></td>
                                                                <td><?php echo strtoupper($query_ac->ac_initials); ?></td>
                                                                <td><?php echo strtoupper(getSpecificDetails('production_area', 'production_area', 'id_production_area=' . $query_ac->id_production_area)); ?></td>
                                                                <td><?php echo strtoupper(getSpecificDetails('district', 'district_name', 'id_district=' . $query_ac->id_district)); ?></td>
                                                                <td><?php echo strtoupper($query_ac->subcounty); ?></td>
                                                                <td><?php echo strtoupper($query_ac->parish); ?></td>
                                                                <td><?php echo strtoupper($query_ac->village); ?></td>
                                                                <td><?php echo strtoupper($query_ac->contact); ?></td>
                                                                <td><?php echo strtoupper($query_ac->sex); ?></td>
                                                                <td><?php echo $query_ac->age; ?></td>
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
