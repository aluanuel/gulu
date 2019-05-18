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
        Video Screening
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Video Screening</li>
      </ol>
    </section>
    <?php
      if(Input::exists() && Input::get('save_field_officer') == 'save_field_officer'){
        $enrolment_date = Input::get('screening_date');
        $fo_name = strtolower(Input::get('fo_name'));
        $id_field_officer = Input::get('id_field_officer');
        $lf_name = strtolower(Input::get('lf_name'));
        $id_lead_farmer = Input::get('id_lead_farmer');
        $other_person_name = Input::get('other_person_name');
        $person_to_pay = Input::get('person_to_pay');
        $id_area_coordinator = Input::get('id_area_coordinator');
        $id_training_venue = Input::get('id_training_venue');
        $id_district = Input::get('id_district');
        $id_subcounty = strtolower(Input::get('id_subcounty'));
        $id_parish = strtolower(Input::get('id_parish'));
        $id_module = strtolower(Input::get('id_module'));
        $module_repetition = strtolower(Input::get('module_repetition'));
        $male = Input::get('male');
        $female = Input::get('female');
        $youth = Input::get('youth');
        //$male_youth_ofs = Input::get('male_youth_ofs');
        $total_attendance = Input::get('total_attendance');
       // $total_youth_ofs = Input::get('total_youth_ofs');
        $report_number = Input::get('report_number');
        $payment_status = Input::get('payment_status');
       $training_by = Input::get('training_by');
      //  $reviewed_by = Input::get('reviewed_by');

        if(DB::getInstance()->checkRows("SELECT * FROM video_screening WHERE fo_name = '$fo_name' && lf_name = '$lf_name'  && screening_date = '$enrolment_date'  &&
        id_area_coordinator = '$id_area_coordinator' &&
        id_field_officer = '$id_field_officer'  && other_person_name='$other_person_name' &&  person_to_pay = '$person_to_pay' &&
        id_lead_farmer = '$id_lead_farmer' && id_subcounty = '$id_subcounty'  &&
        id_parish = '$id_parish' && id_module = '$id_module'  && module_repetition = '$module_repetition' && male = '$male' && female = '$female' && youth = '$youth' && total_attendance = '$total_attendance'  && report_number = '$report_number' && payment_status = '$payment_status' && training_by ='$training_by'")){
        }else{
           $array_training_lfs = array("screening_date"=>$enrolment_date,"id_area_coordinator"=>$id_area_coordinator,"id_parish"=>$id_parish,"id_subcounty"=>$id_subcounty,"id_module"=>$id_module,"id_field_officer"=>$id_field_officer,"id_lead_farmer"=>$id_lead_farmer,"id_training_venue"=>$id_training_venue,"module_repetition"=>$module_repetition,"fo_name"=>$fo_name,"lf_name"=>$lf_name,"male"=>$male,"female"=>$female,"youth"=>$youth ,"total_attendance"=>$total_attendance,"report_number"=>$report_number,"payment_status"=>$payment_status,"other_person_name"=>$other_person_name,"person_to_pay"=>$person_to_pay,"training_by"=>$training_by);
          DB::getInstance()->insert('video_screening',$array_training_lfs);
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
              <li class="active"><a href="#new_training" data-toggle="tab">Add New video screening </a></li>
              <li><a href="#view_training" data-toggle="tab">View video screening</a></li>
              
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="new_training" style="height: auto;">
                <form class="form-horizontal" action="" method="post">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Video Screening Date</label>

                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="inputName" name="screening_date" autocomplete="off">
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
                    <label for="inputName" class="col-sm-2 control-label">Training by</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="training_by" placeholder="Enter who did the training e.g FO, AC,LF,OTHER" autocomplete="off">
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
                    <label for="inputName" class="col-sm-2 control-label">Other Person Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="other_person_name" placeholder="Enter full name" autocomplete="off">
                    </div>
                  </div>
                    
                 <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Person to be Paid</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="person_to_pay" placeholder="Enter full name" autocomplete="off">
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
                    <label for="inputName" class="col-sm-2 control-label">Male</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="male" placeholder="Enter Number of male" autocomplete="off">
                    </div>
                  </div>
                    
                    <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Females</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="female" placeholder="Enter Number of females" autocomplete="off">
                    </div>
                  </div>
                    <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Youths</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="youth" placeholder="Enter Number of male youths" autocomplete="off">
                    </div>
                  </div>
                   <!-- <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">female youth ofs</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="female_youth_ofs" placeholder="Enter Number of female youth organic farmers" autocomplete="off">
                    </div>
                  </div>-->
                    <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Total</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="total_attendance" placeholder="Total attendance" autocomplete="off">
                    </div>
                  </div>
                   <!-- <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Total youth ofs</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="total_youth_ofs" placeholder="total of youth organic farmers" autocomplete="off">
                    </div>
                  </div>-->
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Report Number</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="report_number" placeholder="Enter Report Number" autocomplete="off">
                    </div>
                  </div>
                    <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">ofs</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" name="payment_status" placeholder="payment status" autocomplete="off">
                    </div>
                  </div>
                 <!-- <div class="form-group">
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
                  </div>-->
                  
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
                  <th>Video_screening_date</th>
                  <th>ac_initials</th>
                  <th>Training_by</th>
                    
                  <th>fo_code</th>
                  <th>fo_name</th>
                  <th>lf_code</th>
                  <th>lf_name</th>
                  <th>other</th>
                  <th>person_to_pay</th>
                  
                  <th>venue</th>
                  <th>subcounty</th>
                  <th>parish</th>
                  <th>module</th>
                  <th>module repetition</th>
                  <th>No.male</th>
                  <th>No.female</th>
                  <th>No.youth</th>
                  
                  <th>No.total_atteandance</th>
                 
                  <th>Report_Number</th>
                  <th>Payment_status</th>
                 
                </tr>
                </thead>
                <tbody>
                  <?php
                    $x = 1; 
                    $training = DB::getInstance()->query("SELECT * FROM video_screening");
                    foreach ($training->results() as $training):
                   ?>
                <tr>
                  <td><?php echo $x; ?></td>
                  <td><?php echo strtoupper($training->screening_date); ?></td>
                  <td><?php echo strtoupper(getSpecificDetails('area_coordinator','ac_initials','id_area_coordinator='.$training->id_area_coordinator)); ?></td>
                 <td><?php echo strtoupper($training->training_by); ?></td>
                  <td><?php echo strtoupper(getSpecificDetails('field_officers','field_officer_code','id_field_officer='.$training->id_field_officer)); ?></td>
                  <td><?php echo strtoupper($training->fo_name); ?></td>
                  <td><?php echo strtoupper(getSpecificDetails('lead_farmers','lead_farmer_code','id_lead_farmer='.$training->id_lead_farmer)); ?></td>
                  <td><?php echo strtoupper($training->lf_name); ?></td>
                  <td><?php echo strtoupper($training->other_person_name); ?></td>
                  <td><?php echo strtoupper($training->person_to_pay); ?></td>
                    

                  <td><?php echo strtoupper(getSpecificDetails('parish','parish_name','id_parish='.$training->id_parish)); ?></td>
                  
                    <td><?php echo strtoupper(getSpecificDetails('parish','parish_name','id_parish='.$training->id_parish)); ?></td>
                  <td><?php echo strtoupper(getSpecificDetails('subcounty','subcounty_name','id_subcounty='.$training->id_subcounty)); ?></td>
                  
                    <td><?php echo strtoupper(getSpecificDetails('modules','module_name','id_module='.$training->id_module)); ?></td>
                  <td><?php echo strtoupper($training->module_repetition); ?></td>
                  <td><?php echo strtoupper($training->male); ?></td>
                  <td><?php echo strtoupper($training->female); ?></td>
                  <td><?php echo strtoupper($training->youth); ?></td>
                  
                  <td><?php echo strtoupper($training->total_attendance); ?></td>
                  <td><?php echo strtoupper($training->report_number); ?></td>
                  <td><?php echo strtoupper($training->payment_status); ?></td>
                  
                 
                 
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
</html>
