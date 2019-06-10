<?php
$user = new User();
// $temp_session = new Session();
if ($user->isLoggedIn()) {
    $current_user = $user->data()->username;
    $current_user_name = $user->data()->name;
    $current_user_type = $user->data()->usertype;
    $current_user_id = $user->data()->id_user;
    $user_logins = DB::getInstance()->query("SELECT MAX(id_user_login) as id_login,id_project FROM user_logins WHERE id_user = $current_user_id AND logout_time=NULL");
    foreach($user_logins->results() as $logins){
      $selected_project = $logins->id_login;
    }
    if(empty($selected_project)){
      $project_message = '--select project--';
      $notification = submissionReport('warning','SELECT A PROJECT TO CONTINUE');
      ?>
      <style type="text/css">
        #sidebar_menu{
          display: none;
        }
      </style>
      <?php
    }else{
      $notification = '';
      $project_message = $selected_project;
      ?>
      <style type="text/css">
        #sidebar_menu{
          display: all;
        }
      </style>
      <?php
    }
    if($current_user_type == 'data_clerk'){
    ?>  
<style>
#admin_menu_item,#restricted_to_admin{
    display: none;
}
</style>
<?php }?>
<header class="main-header">

    <!-- Logo -->
    <a href="index.php?page=dashboard" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>GADC</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>GADC</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
                  <!--project form -->
      
        <div class="input-group" style="padding-top:10px;">
          <form action="" method="post">
            <select class="selectpicker form-control" style="width: 100px;" id="selected_project" data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true" name="selected_project" required="required">
                <option><?php echo $project_message; ?></option>
                <?php $query_project = DB::getInstance()->query("SELECT * FROM projects");
                  foreach($query_project->results() as $query_project):
                ?>
                <option value="<?php echo $query_project->id_project;?>"><?php echo strtoupper($query_project->project_initials);?></option>
              <?php endforeach;?>
            </select>
          </form>
        </div>
      <!-- /.project form-->
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="assets/uploads/profile_photos/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo strtoupper($current_user);?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="assets/uploads/profile_photos/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo strtoupper($current_user);?>
                </p>
              </li>
<!--               Menu Body 
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                 /.row 
              </li>-->
              <!-- Menu Footer-->
              <li class="user-footer">
<!--                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>-->
                <div class="pull-right">
                  <a href="index.php?page=logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>
    <?php
} else {
    Redirect::to('index.php?page=login');
}
?>