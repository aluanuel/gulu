
<?php

//echo 'Display';
 session_start();
// $_SESSION['getin_role'] = 'Administrator';
require_once 'functions/functions.php';
include 'core/init.php';
$date_today = date('Y-m-d');
error_reporting(E_ALL);
// $uuid = exec('python makeuuid.py');
//$passwordHasher=new PBKDF2PasswordHasher();
$crypt = new Encryption();
//echo date("Y-m-d h:i:s");
// Current / default page
//$encoded_page = isset($_GET['page']) ? $_GET['page'] : $crypt->encode('login');
$encoded_page = isset($_GET['page']) ? $_GET['page'] : ('login');
//$page = $crypt->decode($encoded_page);
$page = $encoded_page;

switch ($page) {
    default:
        $page = "error";
        //check_login_status();
        include 'pages/error.php';
        break;

    case 'index':
        //check_login_status();
        if (file_exists('pages/' . $page . '.php'))
            include 'pages/' . $page . '.php';
        break;

    case 'login':
        if (file_exists('pages/' . $page . '.php'))
            include 'pages/' . $page . '.php';
        break;
    case 'logout':
        if (file_exists('pages/' . $page . '.php'))
            include 'pages/' . $page . '.php';
        break;

    case 'dashboard':
        if (file_exists('pages/' . $page . '.php'))
            include 'pages/' . $page . '.php';
        break;

    case 'training_farmers':
        if (file_exists('pages/tof/' . $page . '.php'))
            include 'pages/tof/' . $page . '.php';
        break;

    case 'area_coordinator':
        if (file_exists('pages/area_coordinators/' . $page . '.php'))
            include 'pages/area_coordinators/' . $page . '.php';
        break;

    case 'field_officer':
        if (file_exists('pages/field_officers/' . $page . '.php'))
            include 'pages/field_officers/' . $page . '.php';
        break;
        
    case 'production_area':
        if (file_exists('pages/production_area/' . $page . '.php'))
            include 'pages/production_area/' . $page . '.php';
        break;

    case 'training_modules':
        if (file_exists('pages/modules/' . $page . '.php'))
            include 'pages/modules/' . $page . '.php';
        break;
    case 'training_lead_farmer':
        if (file_exists('pages/training_lead_farmer/' . $page . '.php'))
            include 'pages/training_lead_farmer/' . $page . '.php';
        break;
    case 'training_lead_farmer_days':
        if (file_exists('pages/training_lead_farmer/' . $page . '.php'))
            include 'pages/training_lead_farmer/' . $page . '.php';
        break;
    case 'training_trainers':
        if (file_exists('pages/training_trainers/' . $page . '.php'))
            include 'pages/training_trainers/' . $page . '.php';
        break;
   case 'training_trainers_days':
        if (file_exists('pages/training_trainers/' . $page . '.php'))
            include 'pages/training_trainers/' . $page . '.php';
        break;
    case 'training_farmer':
        if (file_exists('pages/training_farmers/' . $page . '.php'))
            include 'pages/training_farmers/' . $page . '.php';
        break;
    case 'training_farmer_days':
        if (file_exists('pages/training_farmers/' . $page . '.php'))
            include 'pages/training_farmers/' . $page . '.php';
        break;
    case 'video_screening':
        if (file_exists('pages/video_screening/' . $page . '.php'))
            include 'pages/video_screening/' . $page . '.php';
        break;
}
?>
