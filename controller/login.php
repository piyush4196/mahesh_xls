<?php
include '../models/config.php';
$employee_id = $_POST['username'];

if($employee_id != "") {
    $qry = "SELECT * from leadership where spoc_id = '" . $employee_id. "'";
    $res = get_result($conn, $qry);
    if($res->num_rows != 0) { 
        login(1, $employee_id);
        echo "1";
    } else {
        $qry = "SELECT id from leadership where tl_id = '" . $employee_id . "'";
        $res = get_result($conn, $qry);
        if($res->num_rows != 0) { 
            login(2, $employee_id);
            echo "2";
        } else {
            echo "0";
        }
    }
}