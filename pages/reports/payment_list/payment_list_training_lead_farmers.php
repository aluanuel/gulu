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
                        Report <small>Training Lead Farmers</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li>Payment List</li>
                        <li class="active">Training Lead Farmers</li>
                    </ol>
                </section>
                <?php
                if (Input::exists() && Input::get('make_payment') == 'make_payment') {
                    $id_training_lfs = Input::get('id_field_officer');
                    $updateTrainingLfsArray = array("status" => 'training_paid');
                    if (DB::getInstance()->update('training_lfs', $id_training_lfs, $updateTrainingLfsArray, 'id_field_officer')) {
                        $notification = submissionReport('success', 'Payment for ' . strtoupper(getSpecificDetails('field_officers', 'fo_name', 'id_field_officer=' . $id_training_lfs)) . ' made successfully');
                    }else{
                        $notification = submissionReport('error', 'Oops, failure in submitting payment for ' . strtoupper(getSpecificDetails('field_officers', 'fo_name', 'id_field_officer=' . $id_training_lfs)));
                    }
                }
                if(Input::exists() && Input::get('remove_from_pay_list') =='remove_from_pay_list'){
                   $id_training_lfs = Input::get('id_field_officer');
                    $updateTrainingLfsArray = array("status" => 'payment_list_generated');
                    if (DB::getInstance()->update('training_lfs', $id_training_lfs, $updateTrainingLfsArray, 'id_field_officer')) {
                        $notification = submissionReport('success', 'Payment for ' . strtoupper(getSpecificDetails('field_officers', 'fo_name', 'id_field_officer=' . $id_training_lfs)) . ' made successfully');
                    }else{
                        $notification = submissionReport('error', 'Oops, failure in submitting payment for ' . strtoupper(getSpecificDetails('field_officers', 'fo_name', 'id_field_officer=' . $id_training_lfs)));
                    } 
                }
                ?>

                <!-- Main content -->
                <section class="content">
                    <?php echo $notification; ?>
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Field Officers Payment List</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body" style="overflow-x: auto;">
                                    <table id="example1" class="table table-bordered table-striped table-condensed">
                                        <thead class="text-uppercase">
                                            <tr>
                                                <th>#</th>
                                                <th>fo code</th>
                                                <th>ac</th>
                                                <th>fo name</th>
                                                <th>production area</th>
                                                <th>contact </th>
                                                <th>project </th>
                                                <th>lfs </th>
                                                <th>groups</th>
                                                <th>ofs</th>
                                                <th>m1</th>
                                                <th>m2</th>
                                                <th>m3</th>
                                                <th>m4</th>
                                                <th>m5</th>
                                                <th>m6</th>
                                                <th>m7</th>
                                                <th>m8</th>
                                                <th>m9</th>
                                                <th>amount</th>
                                                <th style="width:200px;">actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $x = 1;
                                            $lfs_training_query = DB::getInstance()->query("SELECT DISTINCT id_field_officer,id_area_coordinator FROM training_lfs WHERE status = 'payment_list_generated' AND module_repetition = 0");
                                            foreach ($lfs_training_query->results() as $lfs_training_query):
                                                ?>
                                                <tr>
                                                    <td><?php echo $x; ?></td>
                                                    <td><?php echo strtoupper(getSpecificDetails('field_officers', 'field_officer_code', 'id_field_officer =' . $lfs_training_query->id_field_officer)); ?></td>
                                                    <td><?php echo strtoupper(getSpecificDetails('area_coordinator', 'ac_initials', 'id_area_coordinator =' . $lfs_training_query->id_area_coordinator)); ?></td>
                                                    <td><?php echo strtoupper(getSpecificDetails('field_officers', 'fo_name', 'id_field_officer =' . $lfs_training_query->id_field_officer)); ?></td>
                                                    <td><?php echo strtoupper(getSpecificDetails('production_area', 'production_area', 'id_production_area =' . getSpecificDetails('field_officers', 'id_production_area', 'id_field_officer =' . $lfs_training_query->id_field_officer))); ?></td>
                                                    <td><?php echo strtoupper(getSpecificDetails('field_officers', 'contact', 'id_field_officer =' . $lfs_training_query->id_field_officer)); ?></td>
                                                    <td><?php echo strtoupper(getSpecificDetails('field_officers', 'project', 'id_field_officer =' . $lfs_training_query->id_field_officer)); ?></td>
                                                    <td><?php echo countEntries('lead_farmers', 'id_lead_farmer', 'id_field_officer =' . $lfs_training_query->id_field_officer); ?></td>
                                                    <td><?php echo countEntries('lead_farmers', 'id_lead_farmer', 'id_field_officer =' . $lfs_training_query->id_field_officer); ?></td>
                                                    <td></td>
                                                    <td><?php echo countEntries('training_lfs', 'id_training_lfs', 'id_module = 1 AND id_field_officer=' . $lfs_training_query->id_field_officer); ?></td>
                                                    <td><?php echo countEntries('training_lfs', 'id_training_lfs', 'id_module = 2 AND id_field_officer=' . $lfs_training_query->id_field_officer); ?></td>
                                                    <td><?php echo countEntries('training_lfs', 'id_training_lfs', 'id_module = 3 AND id_field_officer=' . $lfs_training_query->id_field_officer); ?></td>
                                                    <td><?php echo countEntries('training_lfs', 'id_training_lfs', 'id_module = 4 AND id_field_officer=' . $lfs_training_query->id_field_officer); ?></td>
                                                    <td><?php echo countEntries('training_lfs', 'id_training_lfs', 'id_module = 5 AND id_field_officer=' . $lfs_training_query->id_field_officer); ?></td>
                                                    <td><?php echo countEntries('training_lfs', 'id_training_lfs', 'id_module = 6 AND id_field_officer=' . $lfs_training_query->id_field_officer); ?></td>
                                                    <td><?php echo countEntries('training_lfs', 'id_training_lfs', 'id_module = 7 AND id_field_officer=' . $lfs_training_query->id_field_officer); ?></td>
                                                    <td><?php echo countEntries('training_lfs', 'id_training_lfs', 'id_module = 8 AND id_field_officer=' . $lfs_training_query->id_field_officer); ?></td>
                                                    <td><?php echo countEntries('training_lfs', 'id_training_lfs', 'id_module = 9 AND id_field_officer=' . $lfs_training_query->id_field_officer); ?></td>
                                                    <td></td>
                                                    <td><form action="" method="post">
                                                            <input type="hidden" name="id_field_officer" value="<?php echo $lfs_training_query->id_field_officer; ?>">
                                                            <div class="row input-group">
<!--                                                                <div class="col-xs-6  pull-left">
                                                                    <button type="submit" class="btn btn-warning" name="remove_from_pay_list" value="remove_from_pay_list">Remove</button>
                                                                </div>-->
                                                                <div class="col-xs-5">
                                                                    <button type="submit" class="btn btn-default" name="make_payment" value="make_payment">Commit Pay</button>
                                                                </div>
                                                            </div>
                                                        </form></td>
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
