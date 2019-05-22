<?php

function renameImage($filename, $file_ext) {
    $file = array();

    $file = explode('.', $filename);
    $new_file_name = $file[0] . '-' . date('H-i-s') . '.' . $file_ext;
    return $new_file_name;
}
function getLastInsertId($table_name, $col_primary_key) {
    $query = DB::getInstance()->query("SELECT MAX(" . $col_primary_key . ") AS last_insert FROM " . $table_name . "");
    foreach ($query->results()as $query) {
        $query->last_insert;
    }
    return $query->last_insert;
}
function getSpecificDetails($table,$column_return,$where){
    $data = '';
    try{
    $query = DB::getInstance()->query("SELECT ".$column_return." AS value FROM ".$table." WHERE ".$where."");
    foreach ($query->results() as $result) {
        $data = $result->value;
    }}catch(Exception $e){
        echo $e->getMessage();
    }
    return $data;
}
function submissionReport($type, $message) {
    if ($type == 'success') {
        $alert = '<div class="alert alert-success alert-dismissible" style="height: 40px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p class="text-center" style="font-size: 16px;">' . $message . '</p></div>';
    }elseif ($type == 'warning') {
        $alert = '<div class="alert alert-warning alert-dismissible" style="height: 40px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p class="text-center" style="font-size: 16px;">' . $message . '</p>
              </div>';
    }elseif ($type == 'error') {
        $alert = '<div class="alert alert-danger alert-dismissible" style="height: 40px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p class="text-center" style="font-size: 16px;">' . $message . '</p>
              </div>';
    }
    return $alert;
}
function addition($item1,$item2){
    return $item1+$item2; 
}
