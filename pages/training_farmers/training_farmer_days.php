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
        training of farmer field days
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">training of farmer field days</li>
      </ol>
    </section>
    <?php
      if(Input::exists() && Input::get('save_field_officer') == 'save_field_officer'){
        $enrolment_date = Input::get('training_date');
        $fo_name = strtolower(Input::get('fo_name'));
        $id_field_officer = Input::get('id_field_officer');
        $lf_name = strtolower(Input::get('lf_name'));
        $id_lead_farmer = Input::get('id_lead_farmer');
        $id_area_coordinator = Input::get('id_area_coordinator');
        $id_training_venue = Input::get('id_training_venue');
        $id_district = Input::get('id_district');
        $id_subcounty = strtolower(Input::get('id_subcounty'));
        $id_parish = strtolower(Input::get('id_parish'));
        $id_module = strtolower(Input::get('id_module'));
        $module_repetition = strtolower(Input::get('module_repetition'));
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
        if(DB::getInstance()->checkRows("SELECT * FROM training_farmers WHERE fo_name = '$fo_name' && lf_name = '$lf_name'  && training_date = '$enrolment_date' && id_district = '$id_district'  &&
        id_area_coordinator = '$id_area_coordinator' &&
        id_field_officer = '$id_field_officer'  &&
        id_lead_farmer = '$id_lead_farmer' && id_subcounty = '$id_subcounty'  &&
        id_parish = '$id_parish' && id_module = '$id_module'  && module_repetition = '$module_repetition' && male_ofs = '$male_ofs' && female_ofs = '$female_ofs' && male_youth_ofs = '$male_youth_ofs' && female_youth_ofs = '$female_youth_ofs' && total_ofs = '$total_ofs' && total_youth_ofs = '$total_youth_ofs' && lfs = '$lfs' && ofs = '$ofs' && others = '$others' && reviewed_by = '$reviewed_by'")){
        }else{
           $array_training_lfs = array("training_date"=>$enrolment_date,"id_area_coordinator"=>$id_area_coordinator,"id_district"=>$id_district,"id_parish"=>$id_parish,"id_subcounty"=>$id_subcounty,"id_module"=>$id_module,"id_field_officer"=>$id_field_officer,"id_lead_farmer"=>$id_lead_farmer,"id_training_venue"=>$id_training_venue,"module_repetition"=>$module_repetition,"fo_name"=>$fo_name,"lf_name"=>$lf_name,"male_ofs"=>$male_ofs,"female_ofs"=>$female_ofs,"male_youth_ofs"=>$male_youth_ofs ,"female_youth_ofs"=>$female_youth_ofs ,"total_ofs"=>$total_ofs,"total_youth_ofs"=>$total_youth_ofs,"lfs"=>$lfs,"ofs"=>$ofs,"others"=>$others,"reviewed_by"=>$reviewed_by);
          DB::getInstance()->insert('training_farmers',$array_training_lfs);
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
              <li class="active"><a href="#new_training" data-toggle="tab">Add New field Day Training  </a></li>
              <li><a href="#view_training" data-toggle="tab">View field Day Training</a></li>
              
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="new_training" style="height: auto;">
                <form class="form-horizontal" action="" method="post">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Enrolment Date</label>

                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="inputName" name="training_date" autocomplete="off">
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
                    <label for="inputName" class="col-sm-2 control-label">field officer code</label>
                    <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" name="id_field_officer">
                  <option>--Select--</option>
                  <?php
                    $fo_query = DB::getInstance()->query("SELECT * FROM field_officers");
                    foreach ($fo_query->results() as $fo_query):
                  ?>
                  <option value="<?php echo $fo_query->id_field_officer; ?>"><?php echo strtoupper($fo_query->id_field_officer);?></option>
                <?php endforeach; ?>
                </select>
              </div>
                  </div>
                    <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Field officer name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="fo_name" placeholder="Enter full name" autocomplete="off">
                    </div>
                  </div>
                     <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">lead farmer code</label>
                    <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" name="id_lead_farmer">
                  <option>--Select--</option>
                  <?php
                    $lf_query = DB::getInstance()->query("SELECT * FROM lead_farmers");
                    foreach ($lf_query->results() as $lf_query):
                  ?>
                  <option value="<?php echo $lf_query->id_lead_farmer; ?>"><?php echo strtoupper($lf_query->id_lead_farmer);?></option>
                <?php endforeach; ?>
                </select>
              </div>
                  </div>
                    <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">lead farmer name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="lf_name" placeholder="Enter full name " autocomplete="off">
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
                    <label for="inputName" class="col-sm-2 control-label">Training Venue</label>
                    <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" name="id_training_venue">
                  <option>--Select--</option>
                  <?php
                    $training_venue_query = DB::getInstance()->query("SELECT * FROM training_venue");
                    foreach ($training_venue_query->results() as $training_venue_query):
                  ?>
                  <option value="<?php echo $training_venue_query->id_training_venue; ?>"><?php echo strtoupper($training_venue_query->venue_name);?></option>
                <?php endforeach; ?>
                </select>
              </div>
                  </div>
                    <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Subcounty</label>
                    <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" name="id_subcounty">
                  <option>--Select--</option>
                  <?php
                    $query_subcounty = DB::getInstance()->query("SELECT * FROM subcounty");
                    foreach ($query_subcounty->results() as $query_subcounty):
                  ?>
                  <option value="<?php echo $query_subcounty->id_subcounty; ?>"><?php echo strtoupper($query_subcounty->subcounty_name);?></option>
                <?php endforeach; ?>
                </select>
              </div>
                  </div>
                    <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Parish</label>
                    <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" name="id_parish">
                  <option>--Select--</option>
                  <?php
                    $query_parisht = DB::getInstance()->query("SELECT * FROM parish");
                    foreach ($query_parisht->results() as $query_parisht):
                  ?>
                  <option value="<?php echo $query_parisht->id_parish; ?>"><?php echo strtoupper($query_parisht->parish_name);?></option>
                <?php endforeach; ?>
                </select>
              </div>
                  </div>
                    <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Module</label>
                    <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" name="id_module">
                  <option>--Select--</option>
                  <?php
                    $query_module = DB::getInstance()->query("SELECT * FROM modules");
                    foreach ($query_module->results() as $query_module):
                  ?>
                  <option value="<?php echo $query_module->id_module; ?>"><?php echo strtoupper($query_module->module_name);?></option>
                <?php endforeach; ?>
                </select>
              </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Module Repetition</label>

                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="inputName" name="module_repetition" placeholder="Enter how mny times module has been repeated e.g 01" autocomplete="off">
                    </div>
                  </div>
                 <!-- <div class="form-group">
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
                  </div>-->
                  
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Male ofs</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="male_ofs" placeholder="Enter Number of male organic farmers" autocomplete="off">
                    </div>
                  </div>
                    
                    <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Female ofs</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="female_ofs" placeholder="Enter Number of female organic farmers" autocomplete="off">
                    </div>
                  </div>
                    <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Male youth ofs</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="male_youth_ofs" placeholder="Enter Number of male youth organic farmers" autocomplete="off">
                    </div>
                  </div>
                    <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">female youth ofs</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="female_youth_ofs" placeholder="Enter Number of female youth organic farmers" autocomplete="off">
                    </div>
                  </div>
                    <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Total ofs</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="total_ofs" placeholder="Total of ofs" autocomplete="off">
                    </div>
                  </div>
                    <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Total youth ofs</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="total_youth_ofs" placeholder="total of youth organic farmers" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">lfs</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="lfs" placeholder="Enter attendance list lfs" autocomplete="off">
                    </div>
                  </div>
                    <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">ofs</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="ofs" placeholder="Enter attendance list ofs" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">others</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="others" placeholder="Enter attendabce list others" autocomplete="off">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">reviewed_by</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="reviewed_by" placeholder="Reviewed by" autocomplete="off">
                    </div>
                  </div>
                  
                  <div class="form-group">
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
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" overflow-x="true" style="overflow-x:scroll;">
              <table id="example1" class="table table-bordered table-striped">
                <thead class="text-uppercase">
                <tr>
                  <th>#</th>
                  <th>training date</th>
                  <th>ac_initials</th>
                  <th>fo_code</th>
                  <th>fo_name</th>
                  <th>lf_code</th>
                  <th>lf_name</th>
                  <th>district</th>
                  <th>venue</th>
                  <th>subcounty</th>
                  <th>parish</th>
                  <th>module</th>
                  <th>module repetition</th>
                  <th>male_ofs</th>
                  <th>female_ofs</th>
                  <th>male_youth_ofs</th>
                  <th>female_youth_ofs</th>
                  <th>total_ofs</th>
                  <th>total_youth_ofs</th>
                  <th>lfs</th>
                  <th>ofs</th>
                  <th>others</th>
                  <th>reviewed_by</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $x = 1; 
                    $training = DB::getInstance()->query("SELECT * FROM training_farmers");
                    foreach ($training->results() as $training):
                   ?>
                <tr>
                  <td><?php echo $x; ?></td>
                  <td><?php echo strtoupper($training->training_date); ?></td>
                  <td><?php echo strtoupper(getSpecificDetails('area_coordinator','ac_initials','id_area_coordinator='.$training->id_area_coordinator)); ?></td>
                  <td><?php echo strtoupper(getSpecificDetails('field_officers','field_officer_code','id_field_officer='.$training->id_field_officer)); ?></td>
                  <td><?php echo strtoupper($training->fo_name); ?></td>
                  <td><?php echo strtoupper(getSpecificDetails('lead_farmers','lead_farmer_code','id_lead_farmer='.$training->id_lead_farmer)); ?></td>
                  <td><?php echo strtoupper($training->lf_name); ?></td>
                  
                  <td><?php echo strtoupper(getSpecificDetails('district','district_name','id_district='.$training->id_district)); ?></td>
                  <td><?php echo strtoupper(getSpecificDetails('area_coordinator','ac_initials','id_area_coordinator='.$training->id_area_coordinator)); ?></td>
                  <td><?php echo strtoupper(getSpecificDetails('parish','parish_name','id_parish='.$training->id_parish)); ?></td>
                  <td><?php echo strtoupper(getSpecificDetails('subcounty','subcounty_name','id_subcounty='.$training->id_subcounty)); ?></td>
                  
                    <td><?php echo strtoupper(getSpecificDetails('modules','module_name','id_module='.$training->id_module)); ?></td>
                  <td><?php echo strtoupper($training->module_repetition); ?></td>
                  <td><?php echo strtoupper($training->male_ofs); ?></td>
                  <td><?php echo strtoupper($training->female_ofs); ?></td>
                  <td><?php echo strtoupper($training->male_youth_ofs); ?></td>
                  <td><?php echo strtoupper($training->female_youth_ofs); ?></td>
                  <td><?php echo strtoupper($training->total_ofs); ?></td>
                  <td><?php echo strtoupper($training->total_youth_ofs); ?></td>
                  <td><?php echo strtoupper($training->lfs); ?></td>
                  <td><?php echo strtoupper($training->ofs); ?></td>
                  <td><?php echo strtoupper($training->others); ?></td>
                  <td><?php echo strtoupper($training->reviewed_by); ?></td>
                 
                 
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