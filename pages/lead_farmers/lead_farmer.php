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
                        Lead Farmers
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Lead Farmers</li>
                    </ol>
                </section>
                <?php
                if (Input::exists() && Input::get('save_lead_farmer') == 'save_lead_farmer') {
                    $enrolment_date = Input::get('join_date');
                    $name = strtolower(Input::get('full_name'));
                    $area_coordinator = Input::get('id_area_coordinator');
                    $field_officer = Input::get('id_field_officer');
                    $lead_farmer_code = Input::get('lead_farmer_code');
                    $production_area = Input::get('id_production_area');
                    $district = Input::get('id_district');
                    $subcounty = strtolower(Input::get('id_subcounty'));
                    $parish = strtolower(Input::get('id_parish'));
                    $village = strtolower(Input::get('id_village'));
                    $telephone = Input::get('telephone');
                    $gender = Input::get('gender');
                    $age = Input::get('age');
                    $project = 'SDU';

                    if (DB::getInstance()->checkRows("SELECT * FROM lead_farmers WHERE lf_name = '$name' && id_production_area = '$production_area' && id_district = '$district'")) {
                        
                    } else {
                        $array_lf = array("join_date" => $enrolment_date, "id_area_coordinator" => $area_coordinator, "id_field_officer" => $field_officer, "lead_farmer_code" => $lead_farmer_code, "lf_name" => $name, "id_production_area" => $production_area, "id_district" => $district, "id_subcounty" => $subcounty, "id_parish" => $parish, "id_village" => $village, "contact" => $telephone, "sex" => $gender, "age" => $age, "project" => $project);
                        if (DB::getInstance()->insert('lead_farmers', $array_lf)) {
                            $notification = submissionReport('success', 'Lead Farmer ' . strtoupper($name) . ' added successfully');
                        } else {
                            
                        }
                    }
                } elseif (Input::exists() && Input::get('save_edit_lead_farmer') == 'save_edit_lead_farmer') {
                    $id_lead_farmer = Input::get('id_lead_farmer');
                    $enrolment_date = Input::get('join_date');
                    $name = strtolower(Input::get('full_name'));
                    $area_coordinator = Input::get('id_area_coordinator');
                    $field_officer = Input::get('id_field_officer');
//                    $lead_farmer_code = Input::get('lead_farmer_code');
                    $production_area = Input::get('id_production_area');
                    $district = Input::get('id_district');
                    $subcounty = strtolower(Input::get('id_subcounty'));
                    $parish = strtolower(Input::get('id_parish'));
                    $village = strtolower(Input::get('id_village'));
                    $telephone = Input::get('telephone');
                    $gender = Input::get('gender');
                    $age = Input::get('age');
                    $project = 'SDU';
//                    $lf_code_1 = explode($area_coordinator,' ', 2);
//                    $lf_code_2 = explode($field_officer,' ', 2);
                    $lead_farmer_code = $lf_code_1[1].'/'.$lf_code_2[1].'/'.getLastInsertId('lead_farmers', id_lead_farmer)+1;
                    $arrayUpdateLeadFarmer = array("join_date" => $enrolment_date, "id_area_coordinator" => $area_coordinator, "id_field_officer" => $field_officer, "lead_farmer_code" => $lead_farmer_code, "lf_name" => $name, "id_production_area" => $production_area, "id_district" => $district, "id_subcounty" => $subcounty, "id_parish" => $parish, "id_village" => $village, "contact" => $telephone, "sex" => $gender, "age" => $age, "project" => $project);
                    if (DB::getInstance()->update('lead_farmers', $id_lead_farmer, $arrayUpdateLeadFarmer, 'id_lead_farmer')) {
                        $notification = submissionReport('success', 'Record for Lead farmer ' . strtoupper($name) . ' updated successfully');
                    } else {
                        $notification = submissionReport('error', 'Failed to upate record for Lead Farmer ' . strtoupper($name));
                    }
                } elseif (Input::exists() && Input::get('delete_lead_farmer') == 'delete_lead_farmer') {
                    $id_lead_farmer = Input::get('id_lead_farmer');
                    if (DB::getInstance()->query("DELETE FROM lead_farmers WHERE id_lead_farmer = $id_lead_farmer")) {
                        $notification = submissionReport('success', 'Lead Farmer record deleted sucessfully');
                    } else {
                        $notification = submissionReport('error', 'Failed to delete Lead Farmer record');
                    }
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
                                    <li class="active"><a href="#new_training" data-toggle="tab">Add New Lead Farmer</a></li>
                                    <li><a href="#view_training" data-toggle="tab">View Lead Farmers</a></li>

                                </ul>
                                <div class="tab-content">
                                    <div class="active tab-pane" id="new_training" style="height: auto;">
                                        <form class="form-horizontal" action="" method="post">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Enrolment Date</label>

                                                <div class="col-sm-10">
                                                    <input type="date" class="form-control" id="inputName" name="join_date" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Full Name</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName" name="full_name" placeholder="Enter full name" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Area Coordinator</label>

                                                <div class="col-sm-10">
                                                    <select class="form-control select2" style="width: 100%;" id="selected_id_area_coordinator" name="id_area_coordinator">
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
                                            <div class="form-group">
                                                <label  class="col-sm-2 control-label">Field Officer</label>

                                                <div class="col-sm-10">
                                                    <select class="form-control select2" style="width: 100%;" id="selected_id_field_officer" name="id_field_officer">
                                                        <option>--Select--</option>
                                                        <?php
                                                        $query_fo = DB::getInstance()->query("SELECT * FROM field_officers");
                                                        foreach ($query_fo->results() as $query_fo):
                                                            ?>
                                                            <option value="<?php echo $query_fo->id_field_officer; ?>"><?php echo strtoupper($query_fo->fo_name . ' ~ ' . $query_fo->field_officer_code); ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label  class="col-sm-2 control-label">Lead Farmer Code</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="create_lead_farmer_code" name="lead_farmer_code" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label  class="col-sm-2 control-label">Production Area</label>

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
                                                <label  class="col-sm-2 control-label">District</label>
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
                                                <label  class="col-sm-2 control-label">Subcounty</label>

                                                <div class="col-sm-10">
                                                    <select class="form-control select2" style="width: 100%;" id="select_id_subcounty" name="id_subcounty">
                                                        <option>--Select--</option>
                                                        <?php
                                                        $subcounty_query = DB::getInstance()->query("SELECT * FROM subcounty");
                                                        foreach ($subcounty_query->results() as $subcounty_query):
                                                            ?>
                                                            <option  value="<?php echo $subcounty_query->id_subcounty; ?>"><?php echo strtoupper($subcounty_query->subcounty_name); ?></option>
                                                        <?php endforeach; ?>
                                                        <option value="new_subcounty">Add Subcounty</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label  class="col-sm-2 control-label">Parish</label>

                                                <div class="col-sm-10">
                                                    <select class="form-control select2" style="width: 100%;" id="select_id_parish" name="id_parish">
                                                        <option>--Select--</option>
                                                        <?php
                                                        $parish_query = DB::getInstance()->query("SELECT * FROM parish");
                                                        foreach ($parish_query->results() as $parish_query):
                                                            ?>
                                                            <option  value="<?php echo $parish_query->id_parish; ?>"><?php echo strtoupper($parish_query->parish_name); ?></option>
                                                        <?php endforeach; ?>
                                                        <option value="new_parish">Add Parish</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label  class="col-sm-2 control-label">Village</label>

                                                <div class="col-sm-10">
                                                    <select class="form-control select2" style="width: 100%;" id="select_id_village" name="id_village">
                                                        <option>--Select--</option>
                                                        <?php
                                                        $village_query = DB::getInstance()->query("SELECT * FROM village");
                                                        foreach ($village_query->results() as $village_query):
                                                            ?>
                                                            <option  value="<?php echo $village_query->id_village; ?>"><?php echo strtoupper($village_query->village_name); ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label  class="col-sm-2 control-label">Contact</label>

                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName" name="telephone" placeholder="Enter Phone Number" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label  class="col-sm-2 control-label">Sex</label>

                                                <div class="col-sm-10">
                                                    <select class="form-control select2" name="gender" style="width: 100%;">
                                                        <option>--Select--</option>
                                                        <option value="male">MALE</option>
                                                        <option value="female">FEMALE</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label  class="col-sm-2 control-label">Age</label>

                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" id="inputName" name="age" placeholder="Enter Age eg. 27" autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-primary" name="save_lead_farmer" value="save_lead_farmer">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="view_training" style="height: auto;">
                                        <div class="box">
                                            <div class="box-header">
                                                <div class="row form-group">
                                                    <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">
                                                        <h3 class="box-title">List of Lead Farmers</h3>
                                                    </div>
                                                    <form action="" method="post">
                                                        <div class="col-lg-2 col-md-5 col-sm-5 col-xs-5">
                                                            <select class="form-control select2" style="width: 100%;" name="search_key" required="true">
                                                                <option >--search by--</option>
                                                                <option  value="id_area_coordinator">Area Coordinator</option>
                                                                <option  value="id_field_officer">Field Officer</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-1 col-md-2 col-sm-2 col-xs-2">
                                                            <button type="submit" class="btn btn-primary" name="search_lead_farmers" value="search_lead_farmers">Search</button>
                                                        </div>
                                                    </form>
                                                    <div class="col-lg-1 col-md-5 col-sm-5 col-xs-5">
                                                        <button type="submit" class="btn btn-primary" name="search_lead_farmers" value="search_lead_farmers">Export</button>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body" style="overflow-x:auto;">
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead class="text-uppercase">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>name</th>
                                                            <th>code</th>
                                                            <th>area coordinator</th>
                                                            <th>field officer</th>
                                                            <th>production area</th>
                                                            <th>district</th>
                                                            <th>subcounty</th>
                                                            <th>parish</th>
                                                            <th>village</th>
                                                            <th>contact</th>
                                                            <th>sex</th>
                                                            <th>age</th>
                                                            <th style="width:70px;">actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $x = 1;
                                                        if (Input::exists() && Input::get('search_lead_farmers') == 'search_lead_farmers') {
                                                            $search_key = Input::get('search_key');
                                                            switch ($search_key) {
                                                                case $search_key == 'id_area_coordinator':
                                                                    $query_lf = DB::getInstance()->query("SELECT * FROM lead_farmers ORDER BY id_area_coordinator DESC");
                                                                    break;
                                                                case $search_key == 'id_field_officer':
                                                                    $query_lf = DB::getInstance()->query("SELECT * FROM lead_farmers ORDER BY id_field_officer DESC");
                                                                    break;
                                                                default:
                                                                    $query_lf = DB::getInstance()->query("SELECT * FROM lead_farmers");
                                                            }
                                                        } else {
                                                            $query_lf = DB::getInstance()->query("SELECT * FROM lead_farmers");
                                                        }
                                                        foreach ($query_lf->results() as $query_lf):
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $x; ?></td>
                                                                <td><?php echo strtoupper($query_lf->lf_name); ?></td>
                                                                <td><?php echo strtoupper($query_lf->lead_farmer_code); ?></td>
                                                                <td><?php echo strtoupper(getSpecificDetails('area_coordinator', 'ac_initials', 'id_area_coordinator=' . $query_lf->id_area_coordinator)); ?></td>
                                                                <td><?php echo strtoupper(getSpecificDetails('field_officers', 'field_officer_code', 'id_field_officer=' . $query_lf->id_field_officer)); ?></td>
                                                                <td><?php echo strtoupper(getSpecificDetails('production_area', 'production_area', 'id_production_area=' . $query_lf->id_production_area)); ?></td>
                                                                <td><?php echo strtoupper(getSpecificDetails('district', 'district_name', 'id_district=' . $query_lf->id_district)); ?></td>
                                                                <td><?php echo strtoupper(getSpecificDetails('subcounty', 'subcounty_name','id_subcounty='.$query_lf->id_subcounty)); ?></td>
                                                                <td><?php echo strtoupper(getSpecificDetails('parish', 'parish_name','id_parish='. $query_lf->id_parish)); ?></td>
                                                                <td><?php echo strtoupper(getSpecificDetails('village', 'village_name','id_village='. $query_lf->id_village)); ?></td>
                                                                <td><?php echo strtoupper($query_lf->contact); ?></td>
                                                                <td><?php echo strtoupper($query_lf->sex); ?></td>
                                                                <td><?php echo $query_lf->age; ?></td>
                                                                <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_lead_farmer<?php echo $query_lf->id_lead_farmer; ?>">
                                                                        Edit
                                                                    </button><button id="restricted_to_admin" type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target="#delete_lead_farmer<?php echo $query_lf->id_lead_farmer; ?>">
                                                                        Delete
                                                                    </button></td>
                                                        <div class="modal fade modal" id="edit_lead_farmer<?php echo $query_lf->id_lead_farmer; ?>">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span></button>
                                                                        <h4 class="modal-title text-uppercase text-primary text-center">edit lead farmer details</h4>
                                                                    </div>
                                                                    <form action="" method="post">
                                                                        <div class="modal-body">
                                                                            <div class="box-body">
                                                                                <div class="row form-group">
                                                                                    <label class="col-sm-3 control-label">Enrolment Date</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="date" class="form-control" name="join_date" value="<?php echo strtoupper($query_lf->join_date); ?>" required autocomplete="off">  
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <label class="col-sm-3 control-label">Full Name</label>
                                                                                    <input type="hidden" class="form-control" name="id_lead_farmer" value="<?php echo $query_lf->id_lead_farmer; ?>">
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" class="form-control" name="full_name" value="<?php echo strtoupper($query_lf->lf_name); ?>" required autocomplete="off">  
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <label class="col-sm-3 control-label">Lead Farmer Code</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" class="form-control" name="lead_farmer_code" value="<?php echo strtoupper($query_lf->lead_farmer_code); ?>" required="true" autocomplete="off">  
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <label class="col-sm-3 control-label">Area Coordinator</label>
                                                                                    <div class="col-sm-9">
                                                                                        <select class="form-control select2" style="width: 100%;" id="select_id_area_coordinator" name="id_area_coordinator" required="true">
                                                                                            <option value="<?php echo $query_lf->id_area_coordinator; ?>"><?php echo strtoupper(getSpecificDetails('area_coordinator', 'ac_initials', 'id_area_coordinator=' . $query_lf->id_area_coordinator)); ?></option>
                                                                                            <?php
                                                                                            $query_ac = DB::getInstance()->query("SELECT * FROM area_coordinator");
                                                                                            foreach ($query_ac->results() as $query_ac):
                                                                                                ?>
                                                                                                <option  value="<?php echo $query_ac->id_area_coordinator; ?>"><?php echo strtoupper($query_ac->ac_name . ' ~ ' . $query_ac->ac_initials); ?></option>
                                                                                            <?php endforeach; ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <label class="col-sm-3 control-label">Field Officer</label>
                                                                                    <div class="col-sm-9">
                                                                                        <select class="form-control select2" style="width: 100%;" id="select_id_field_officer" name="id_field_officer" required="true">
                                                                                            <option value="<?php echo $query_lf->id_field_officer; ?>"><?php echo strtoupper(getSpecificDetails('field_officers', 'field_officer_code', 'id_field_officer=' . $query_lf->id_field_officer)); ?></option>
                                                                                            <?php
                                                                                            $query_fo = DB::getInstance()->query("SELECT * FROM field_officers");
                                                                                            foreach ($query_fo->results() as $query_fo):
                                                                                                ?>
                                                                                                <option  value="<?php echo $query_fo->id_field_officer; ?>"><?php echo strtoupper($query_fo->field_officer_code); ?></option>
                                                                                            <?php endforeach; ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <label class="col-sm-3 control-label">Production Area</label>
                                                                                    <div class="col-sm-9">
                                                                                        <select class="form-control select2" style="width: 100%;" id="select_id_field_officer" name="id_production_area" required="true">
                                                                                            <option value="<?php echo $query_lf->id_production_area; ?>"><?php echo strtoupper(getSpecificDetails('production_area', 'production_area', 'id_production_area=' . $query_lf->id_production_area)); ?></option>
                                                                                            <?php
                                                                                            $production_query = DB::getInstance()->query("SELECT * FROM production_area");
                                                                                            foreach ($production_query->results() as $production):
                                                                                                ?>
                                                                                                <option  value="<?php echo $production->id_production_area; ?>"><?php echo strtoupper($production->production_area); ?></option>
                                                                                            <?php endforeach; ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <label class="col-sm-3 control-label">District</label>
                                                                                    <div class="col-sm-9">
                                                                                        <select class="form-control select2" style="width: 100%;" id="select_id_district" name="id_district" required="true">
                                                                                            <option value="<?php echo $query_lf->id_district; ?>"><?php echo strtoupper(getSpecificDetails('district', 'district_name', 'id_district=' . $query_lf->id_district)); ?></option>
                                                                                            <?php
                                                                                            $district_query = DB::getInstance()->query("SELECT * FROM district");
                                                                                            foreach ($district_query->results() as $district_query):
                                                                                                ?>
                                                                                                <option  value="<?php echo $district_query->id_district; ?>"><?php echo strtoupper($district_query->district_name); ?></option>
                                                                                            <?php endforeach; ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <label class="col-sm-3 control-label">Subcounty</label>
                                                                                    <div class="col-sm-9">
                                                                                        <select class="form-control select2" style="width: 100%;" id="select_id_subcounty" name="id_subcounty" required="true">
                                                                                            <option value="<?php echo $query_lf->id_subcounty; ?>"><?php echo strtoupper(getSpecificDetails('subcounty', 'subcounty_name', 'id_subcounty=' . $query_lf->id_subcounty)); ?></option>
                                                                                            <?php
                                                                                            $subcounty_query = DB::getInstance()->query("SELECT * FROM subcounty");
                                                                                            foreach ($subcounty_query->results() as $subcounty_query):
                                                                                                ?>
                                                                                                <option  value="<?php echo $subcounty_query->id_subcounty; ?>"><?php echo strtoupper($subcounty_query->subcounty_name); ?></option>
                                                                                            <?php endforeach; ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <label class="col-sm-3 control-label">Parish</label>
                                                                                    <div class="col-sm-9">
                                                                                        <select class="form-control select2" style="width: 100%;" id="select_id_parish" name="id_parish" required="true">
                                                                                            <option value="<?php echo $query_lf->id_parish; ?>"><?php echo strtoupper(getSpecificDetails('parish', 'parish_name', 'id_parish=' . $query_lf->id_parish)); ?></option>
                                                                                            <?php
                                                                                            $parish_query = DB::getInstance()->query("SELECT * FROM parish");
                                                                                            foreach ($parish_query->results() as $parish_query):
                                                                                                ?>
                                                                                                <option  value="<?php echo $parish_query->id_parish; ?>"><?php echo strtoupper($parish_query->parish_name); ?></option>
                                                                                            <?php endforeach; ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <label class="col-sm-3 control-label">Village</label>
                                                                                    <div class="col-sm-9">
                                                                                        <select class="form-control select2" style="width: 100%;" id="select_id_parish" name="id_village" required="true">
                                                                                            <option value="<?php echo $query_lf->id_village; ?>"><?php echo strtoupper(getSpecificDetails('village', 'village_name', 'id_village=' . $query_lf->id_village)); ?></option>
                                                                                            <?php
                                                                                            $village_query = DB::getInstance()->query("SELECT * FROM village");
                                                                                            foreach ($village_query->results() as $village_query):
                                                                                                ?>
                                                                                                <option  value="<?php echo $village_query->id_village; ?>"><?php echo strtoupper($village_query->village_name); ?></option>
                                                                                            <?php endforeach; ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <label class="col-sm-3 control-label">Contact</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" class="form-control" name="telephone" value="<?php echo strtoupper($query_lf->contact); ?>" required="true" autocomplete="off">  
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <label class="col-sm-3 control-label">Sex</label>
                                                                                    <div class="col-sm-9">
                                                                                        <select class="form-control select2" style="width: 100%;" name="gender" required="true">
                                                                                            <option value="<?php echo $query_lf->sex; ?>"><?php echo strtoupper($query_lf->sex); ?></option>
                                                                                            <option  value="male">MALE</option>
                                                                                            <option  value="female">FEMALE</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row form-group">
                                                                                    <label class="col-sm-3 control-label">Age</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" class="form-control" name="age" value="<?php echo strtoupper($query_lf->age); ?>" required="true" autocomplete="off">  
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                                            <button type="submit" name="save_edit_lead_farmer" class="btn btn-primary" value="save_edit_lead_farmer">Save changes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                        <!-- /.modal -->
                                                        <div class="modal fade modal" id="delete_lead_farmer<?php echo $query_lf->id_lead_farmer; ?>">
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
                                                                                <input type="hidden" class="form-control" name="id_lead_farmer" value="<?php echo $query_lf->id_lead_farmer; ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">No</button>
                                                                            <button type="submit" name="delete_lead_farmer" class="btn btn-primary" value="delete_lead_farmer">Yes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
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
