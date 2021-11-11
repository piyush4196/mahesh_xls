<?php
include '../models/config.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$leadership = $_POST['param'];
$score = $_POST['score'];

$ps_id = $leadership['ps_id'];

//print_r($leadership); 
//exit;

$qry = "SELECT * from leadership WHERE ps_id = ?";
$res = get_result($conn, $qry, 's', array($ps_id));

//print_r($res->fetch_assoc());

if($res->num_rows == 0) {
    $qry = 'INSERT INTO `leadership`(`spoc_id`, `ps_id`, `employee_name`, `before_iiy`, `after_iiy`, `team`, `sub_team`, `level`, `doj`, `last_promo`, `tl_id`, `tl_email_id`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)';
    $leadership_id =  run_query($conn, $qry, 'ssssssssssss', array_values($leadership));
    $score_data = array($leadership_id, json_encode($score, JSON_UNESCAPED_UNICODE));
    $qry1 = 'INSERT INTO `score_1`(`leadership_id`, `score`) VALUES (?,?)';
    $score_id =  run_query($conn, $qry1, 'ss', $score_data);
} else {
    $data = $res->fetch_assoc();
    $qry = 'UPDATE `leadership` SET `spoc_id`=?,`ps_id`=?,`employee_name`=?,`before_iiy`=?,`after_iiy`=?,`team`=?,`sub_team`=?,`level`=?,`doj`=?,`last_promo`=?,`tl_id`=?,`tl_email_id`=?, WHERE `id` = 15';
    $leadership_id =  run_query($conn, $qry, 'ssssssssssss', array_values($leadership));
    echo "updated";
}


exit;

