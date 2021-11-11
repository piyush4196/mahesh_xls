<?php

date_default_timezone_set('Europe/London');

function full_url(){
    return sprintf(
      "%s://%s%s",
      isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
      $_SERVER['SERVER_NAME'],
      $_SERVER['REQUEST_URI']
    );
}

function base_url() {
  $http = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http';
  return $http .'://'. $_SERVER['SERVER_NAME'] .':'.$_SERVER['SERVER_PORT'].'/';    
}

function run_query($conn, $query,$types = null, $params = null) {
  $stmt = $conn->prepare($query);
  $stmt->bind_param($types, ...$params);
  $stmt->error();
  $stmt->execute();
  
  $id = $stmt->insert_id;
  $stmt->close();
  return $id;
}

function get_result($conn, $query, $types = null,$params = null) {
  $stmt = $conn->prepare($query);
  if($types != null) {
    $stmt->bind_param($types, ...$params);
  }
  if(!$stmt->execute()) return false;
  return $stmt->get_result();
}
  
function sec_session_start() {
  $session_name = 'AMEX_MAHESH_ID';
  $secure = FALSE;
  $httponly = true;
  ini_set('session.use_only_cookies', 1);
  if (ini_get('session.use_only_cookies') === FALSE) {
      header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
      exit();
  }
  $cookieParams = session_get_cookie_params();
  session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);
  session_name($session_name);
  session_start();
  session_regenerate_id();
}


function login($acc_type, $employee_id) {
  $user_browser = $_SERVER['HTTP_USER_AGENT'];
  $_SESSION['acc_type'] = $acc_type;
  $_SESSION['employee_id'] = $employee_id;
  $_SESSION['login_string'] = hash('sha512',$acc_type . $user_browser);
  return true;
}

function login_check() {
  if (isset($_SESSION['acc_type'],$_SESSION['employee_id'],$_SESSION['login_string'])) {
      $login_string = $_SESSION['login_string'];
      $acc_type = $_SESSION['acc_type'];
      $employee_id = $_SESSION['employee_id'];
      $user_browser = $_SERVER['HTTP_USER_AGENT'];
      if(hash('sha512',$acc_type . $user_browser) == $login_string ) {
          return true;
      } else {
          return false;
      } 
  } else {
      return false;
  }
}