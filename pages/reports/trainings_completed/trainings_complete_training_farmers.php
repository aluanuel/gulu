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
                        Report <small>Training of Farmers</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li>Trainings Completed</li>
                        <li class="active">Training of Farmers</li>
                    </ol>
                </section>
                <?php
                if (Input::exists() && Input::get('add_to_payment_list')=='add_to_payment_list')
                    {
                    $id_lead_farmer = Input::get('id_lead_farmer');
                    $updateTrainingFarmersArray = array("status" => 'payment_list_generated');
                    DB::getInstance()->update('training_farmers',$id_lead_farmer,$updateTrainingFarmersArray,'id_lead_farmer');
//                    if (DB::getInstance()->update('training_farmers',$id_lead_farmer, $updateTrainingFarmersArray, 'id_lead_farmer')) {
//                        $notification = submissionReport('success', 'Added to payment list successfully '.$id_lead_farmer);
//                    } else {
//                        $notification = submissionReport('error', 'Failure in submitting request');
//                    }
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
                                    <h3 class="box-title">Trainings Completed for Training of Farmers</h3>
                                </div>
                                <!-- /.box-header -->
                                <?php
                                $x = 2;
                                $query_training_farmers = DB::getInstance()->query("SELECT DISTINCT id_field_officer FROM training_farmers WHERE status='training_completed'");
                                foreach ($query_training_farmers->results() as $query_farmers):
                                    $id_field_officer = $query_farmers->id_field_officer;
                                    ?>
                                    <div class="box-body" style="overflow-x: auto;">
                                        <h4 class="box-title"><small>Field Officer</small>  <?php echo strtoupper(getSpecificDetails('field_officers', 'field_officer_code', 'id_field_officer=' . $id_field_officer)); ?>
                                            <?php echo strtoupper(getSpecificDetails('field_officers', 'fo_name', 'id_field_officer=' . $id_field_officer)); ?>
                                        </h4>
                                        <table id="example" class="table table-bordered table-striped table-condensed">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th>production area</th>
                                                    <th>lf code</th>
                                                    <th>lf name</th>
                                                    <th>trained</th>
                                                    <th>not trained</th>
                                                    <th>m1</th>
                                                    <th>m2</th>
                                                    <th>m3</th>
                                                    <th>m4</th>
                                                    <th>m5</th>
                                                    <th>m6</th>
                                                    <th>m7</th>
                                                    <th>m8</th>
                                                    <th>m9</th>
                                                    <th>actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query_lf = DB::getInstance()->query("SELECT * FROM lead_farmers l,training_farmers f WHERE l.id_lead_farmer = f.id_lead_farmer AND f.id_field_officer = $id_field_officer");
                                                foreach ($query_lf->results() as $query_lf):
                                                    $id_lf = $query_lf->id_lead_farmer;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo strtoupper(getSpecificDetails('production_area', 'production_area', 'id_production_area=' . $query_lf->id_production_area)); ?></td>
                                                        <td><?php echo strtoupper($query_lf->lead_farmer_code); ?></td>
                                                        <td><?php echo strtoupper($query_lf->lf_name); ?></td>
                                                        <td><?php echo getModulesTaught($query_lf->id_lead_farmer); ?></td>
                                                        <td><?php echo getModulesNotTaught($query_lf->id_lead_farmer); ?></td>
                                                        <td><?php echo markModule(getSpecificDetails('training_farmers', 'id_module', 'id_module=1 AND id_lead_farmer=' . $query_lf->id_lead_farmer)); ?>
                                                        </td>
                                                        <td><?php echo markModule(getSpecificDetails('training_farmers', 'id_module', 'id_module=2 AND id_lead_farmer=' . $query_lf->id_lead_farmer)); ?></td>
                                                        <td><?php echo markModule(getSpecificDetails('training_farmers', 'id_module', 'id_module=3 AND id_lead_farmer=' . $query_lf->id_lead_farmer)); ?></td>
                                                        <td><?php echo markModule(getSpecificDetails('training_farmers', 'id_module', 'id_module=4 AND id_lead_farmer=' . $query_lf->id_lead_farmer)); ?></td>
                                                        <td><?php echo markModule(getSpecificDetails('training_farmers', 'id_module', 'id_module=5 AND id_lead_farmer=' . $query_lf->id_lead_farmer)); ?></td>
                                                        <td><?php echo markModule(getSpecificDetails('training_farmers', 'id_module', 'id_module=6 AND id_lead_farmer=' . $query_lf->id_lead_farmer)); ?>
                                                        </td>
                                                        <td><?php echo markModule(getSpecificDetails('training_farmers', 'id_module', 'id_module=7 AND id_lead_farmer=' . $query_lf->id_lead_farmer)); ?></td>
                                                        <td><?php echo markModule(getSpecificDetails('training_farmers', 'id_module', 'id_module=8 AND id_lead_farmer=' . $query_lf->id_lead_farmer)); ?></td>
                                                        <td><?php echo markModule(getSpecificDetails('training_farmers', 'id_module', 'id_module=9 AND id_lead_farmer=' . $query_lf->id_lead_farmer)); ?></td>
                                                        <td><form action="" method="post">
                                                                <input type="hidden" name="id_lead_farmer" value="<?php echo $query_lf->id_lead_farmer; ?>">
                                                                <input type="hidden" name="id_field_officer" value="<?php echo $id_field_officer; ?>">
                                                                <button type="submit" name="add_to_payment_list" class="btn btn-default" value="add_to_payment_list">Add to paylist</button>
                                                            </form></td>
                                                    </tr>
                                                <?php endforeach; ?>

                                            </tbody>
                                            <tfoot>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <?php
                                endforeach;
                                ?>
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
