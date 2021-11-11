<?php
include '../models/config.php';

$config = $_POST['config'];

if($config == "tl_id"){
    $qry = "SELECT DISTINCT tl_id, id from leadership";
    $res = get_result($conn, $qry);
    $result = [];
    while($re = $res->fetch_assoc()) {
        array_push($result, $re);
    }
    echo json_encode($result);
} else if($config == "employee") {
    $ps_id = $_POST['tl_id'];
    $qry = "SELECT DISTINCT ps_id, id from leadership where tl_id= '" . $ps_id . "'";
    $res = get_result($conn, $qry);
    $result = [];
    while($re = $res->fetch_assoc()) {
        array_push($result, $re);
    }
    echo json_encode($result);
} else if($config == "get_score") {
    $tl_id = $_POST['tl_id'];
    $emp_id = $_POST['emp_id'];
    $qry = "";
    if($emp_id == "") {
        $qry = "SELECT * from leadership where tl_id = '" . $tl_id . "'";
        $res = get_result($conn, $qry);
        $employee_ids = [];
        while($re = $res->fetch_assoc()) {
            array_push($employee_ids, $re['id']);
        }
        $res_qry = 'SELECT score, leadership.ps_id, leadership.employee_name FROM `score_1` INNER JOIN leadership ON leadership.id = score_1.leadership_id WHERE `leadership_id` in ( '.implode(',', $employee_ids).') ';
        $res = get_result($conn, $res_qry);
        $result = [];
        while($re = $res->fetch_assoc()) {
            $res_data = json_decode($re['score'], true);
            $new = array_merge($res_data, array("Employee ID" => $re['ps_id'], "Employee Name"=> $re["employee_name"]) );
            array_push($result, $new);
        }
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    } else {
        $res_qry = 'SELECT score, leadership.ps_id, leadership.employee_name FROM `score_1` INNER JOIN leadership ON leadership.id = score_1.leadership_id WHERE `leadership_id` = ' .$emp_id;
        $res = get_result($conn, $res_qry);
        $result = [];
        while($re = $res->fetch_assoc()) {
            $res_data = json_decode($re['score'], true);
            $new = array_merge($res_data, array("Employee ID" => $re['ps_id'], "Employee Name"=> $re["employee_name"]) );
            array_push($result, $new);
        }
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }
}