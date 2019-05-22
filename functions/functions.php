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

function getSpecificDetails($table, $column_return, $where) {
    $data = '';
    try {
        $query = DB::getInstance()->query("SELECT " . $column_return . " AS value FROM " . $table . " WHERE " . $where . "");
        foreach ($query->results() as $result) {
            $data = $result->value;
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    return $data;
}

function submissionReport($type, $message) {
    if ($type == 'success') {
        $alert = '<div class="alert alert-success alert-dismissible" style="height: 40px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p class="text-center" style="font-size: 16px;">' . $message . '</p></div>';
    } elseif ($type == 'warning') {
        $alert = '<div class="alert alert-warning alert-dismissible" style="height: 40px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p class="text-center" style="font-size: 16px;">' . $message . '</p>
              </div>';
    } elseif ($type == 'error') {
        $alert = '<div class="alert alert-danger alert-dismissible" style="height: 40px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p class="text-center" style="font-size: 16px;">' . $message . '</p>
              </div>';
    }
    return $alert;
}

function countEntries($table_name, $column, $where) {
    try {
        $query = DB::getInstance()->query("SELECT COUNT(" . $column . ")AS total FROM " . $table_name . " WHERE " . $where . " ");
        foreach ($query->results() as $value) {
            $value->total;
        }
        return $value->total;
    } catch (Exception $e) {
        return $e;
    }
}

function getModulesTaught($where) {
    $data = array();
    $formattedString = '';
    $i = 0;
    try {
        $query = DB::getInstance()->query("SELECT f.id_module AS value FROM modules m, training_farmers f WHERE m.id_module = f.id_module AND f.id_lead_farmer = " . $where . "");
        foreach ($query->results() as $result) {
            $data[$i] = $result->value;
            $i++;
        }
        for ($i = 0; $i < sizeof($data); $i++) {
            if ($i == 0) {
                $formattedString = $data[0];
            } else {
                $formattedString = $formattedString . ',' . $data[$i];
            }
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    if (!empty($formattedString)) {

        return $formattedString;
    } else {
        return 'None';
    }
}

function getModulesNotTaught($where) {
    $data = array();
    $formattedString = '';
    $i = 0;
    try {
        $query = DB::getInstance()->query("SELECT f.id_module AS value FROM modules m, training_farmers f WHERE m.id_module = f.id_module AND f.id_lead_farmer = " . $where . "");
        foreach ($query->results() as $result) {
            $data[$i] = $result->value;
            $i++;
        }
        for ($i = 0; $i < sizeof($data); $i++) {
            if ($i == 0) {
                $formattedString = $data[0];
            } else {
                $formattedString = $formattedString . ',' . $data[$i];
            }
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    return $formattedString;
}

function markModule($return) {
    if (!empty($return)) {
        return 1;
    } else {
        return 0;
    }
}
