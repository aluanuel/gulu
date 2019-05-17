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
        Lead Farmers
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Lead Farmers</li>
      </ol>
    </section>
    <?php
      if(Input::exists() && Input::get('save_lead_farmer') == 'save_lead_farmer'){
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

        if(DB::getInstance()->checkRows("SELECT * FROM lead_farmers WHERE lf_name = '$name' && id_production_area = '$production_area' && id_district = '$district'")){

        }else{
          $array_lf = array("join_date"=>$enrolment_date,"id_area_coordinator"=>$area_coordinator,"id_field_officer"=>$field_officer,"lead_farmer_code"=>$lead_farmer_code,"lf_name"=>$name,"id_production_area"=>$production_area,"id_district"=>$district,"id_subcounty"=>$subcounty,"id_parish"=>$parish,"id_village"=>$village,"contact"=>$telephone,"sex"=>$gender,"age"=>$age,"project"=>$project);
          DB::getInstance()->insert('lead_farmers',$array_lf);
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
              <li class="active"><a href="#new_training" data-toggle="tab">Add New Lead Farmer</a></li>
              <li><a href="#view_training" data-toggle="tab">View Lead Farmers</a></li>
              
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="new_training" style="height: auto;">
                <form class="form-horizontal" action="" method="post">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Enrolment Date</label>

                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="inputName" name="join_date" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Full Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="full_name" placeholder="Enter full name" autocomplete="off">
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
                    <label for="inputName" class="col-sm-2 control-label">Field Officer</label>

                    <div class="col-sm-10">
                      <select class="form-control select2" style="width: 100%;" name="id_field_officer">
                  <option>--Select--</option>
                  <?php
                    $query_fo = DB::getInstance()->query("SELECT * FROM field_officers");
                    foreach ($query_fo->results() as $query_fo):
                  ?>
                  <option value="<?php echo $query_fo->id_field_officer; ?>"><?php echo strtoupper($query_fo->fo_name.' ~ '.$query_fo->field_officer_code);?></option>
                <?php endforeach; ?>
                </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Lead Farmer Code</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="lead_farmer_code" placeholder="Enter Lead Farmer code e.g GE/001/01" autocomplete="off">
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
                  <option value="<?php echo $pdn_area->id_production_area; ?>"><?php echo strtoupper($pdn_area->production_area);?></option>
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
                  <option value="<?php echo $query_district->id_district; ?>"><?php echo strtoupper($query_district->district_name);?></option>
                <?php endforeach; ?>
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
                                                                <option value="new_subcounty">Add Subcounty</option>
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
                                                                <option value="new_parish">Add Parish</option>
                                                            </select>
                                                        </div>
                                                    </div>
                  <div class="form-group">
                                                        <label for="inputName" class="col-sm-2 control-label">Village</label>

                                                        <div class="col-sm-10">
                                                            <select class="form-control select2" style="width: 100%;" id="select_id_village" name="id_village">
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
                      <button type="submit" class="btn btn-primary" name="save_lead_farmer" value="save_lead_farmer">Save</button>
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
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="text-uppercase">
                <tr>
                  <th>#</th>
                  <th>name</th>
                  <th>code</th>
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
                    $query_lf = DB::getInstance()->query("SELECT * FROM lead_farmers");
                    foreach ($query_lf->results() as $query_lf):
                   ?>
                <tr>
                  <td><?php echo $x; ?></td>
                  <td><?php echo strtoupper($query_lf->lf_name); ?></td>
                  <td><?php echo strtoupper($query_lf->lead_farmer_code); ?></td>
                  <td><?php echo strtoupper(getSpecificDetails('area_coordinator','ac_initials','id_area_coordinator='.$query_lf->id_area_coordinator)); ?></td>
                  <td><?php echo strtoupper(getSpecificDetails('production_area','production_area','id_production_area='.$query_lf->id_production_area)); ?></td>
                  <td><?php echo strtoupper(getSpecificDetails('district','district_name','id_district='.$query_lf->id_district)); ?></td>
                  <td><?php echo strtoupper(getSpecificDetails('subcounty','subcounty_name',$query_lf->id_subcounty)); ?></td>
                  <td><?php echo strtoupper(getSpecificDetails('parish','parish_name',$query_lf->id_parish)); ?></td>
                  <td><?php echo strtoupper($query_lf->id_village); ?></td>
                  <td><?php echo strtoupper($query_lf->contact); ?></td>
                  <td><?php echo strtoupper($query_lf->sex); ?></td>
                  <td><?php echo $query_lf->age; ?></td>
                </tr>
              <?php 
              $x++;
            endforeach; ?>
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
