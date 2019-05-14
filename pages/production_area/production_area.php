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
                        Production Area
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Production Area</li>
                    </ol>
                </section>
                <?php
                if (Input::exists() && Input::get('save_production_area') == 'save_production_area') {
                    $name_pdn_area = strtolower(Input::get('name_production_area'));
                    $district = Input::get('select_id_district');
                    $subcounty = Input::get('select_id_subcounty');
                    $parish = Input::get('select_id_parish');
                    $village = Input::get('select_id_village');
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

                    if (DB::getInstance()->checkRows("SELECT * FROM production_area WHERE production_area = '$name_pdn_area' AND id_district = '$district' AND id_subcounty = '$subcounty' AND id_parish = '$parish' AND id_village = '$village'")) {
                        
                    } else {
                        $arrayNewProductionArea = array("production_area" => $name_pdn_area, "id_district" => $district, "id_subcounty" => $subcounty
                            , "id_parish" => $parish, "id_village" => $village);
                        DB::getInstance()->insert('production_area', $arrayNewProductionArea);
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
                                    <li class="active"><a href="#new_training" data-toggle="tab">Add New Production Area</a></li>
                                    <li><a href="#view_training" data-toggle="tab">View Production Areas</a></li>

                                </ul>
                                <div class="tab-content">
                                    <div class="active tab-pane" id="new_training" style="height: auto;">
                                        <div class="box">
                                            <div class="box-header">
                                                <h3 class="box-title">New Production Area</h3>
                                            </div>
                                            <div class="box-body">
                                                <form class="form-horizontal" action="" method="post">
                                                    <div class="form-group">
                                                        <label for="inputName" class="col-sm-2 control-label">Production Area</label>

                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputName" name="name_production_area" placeholder="Enter name of place" autocomplete="off">
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
                                                    <div class="form-group" id="new_parish">
                                                        <label for="inputName" class="col-sm-2 control-label">Parish</label>

                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputName" name="name_parish" placeholder="Enter name of Parish" autocomplete="off">
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
                                                    <div class="form-group" id="new_village">
                                                        <label for="inputName" class="col-sm-2 control-label">Village</label>

                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="inputName" name="name_village" placeholder="Enter name of Village" autocomplete="off">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="save_production_area" value="save_production_area" class="btn btn-primary">Save</button>
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
