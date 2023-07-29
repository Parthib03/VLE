<?php
session_start();
include('conn.inc');

$id             = $_SESSION['id'];
$dept_code      = $_POST['dept_code'];
$dept_name      = $_POST['dept_name'];
$dept_status    = $_POST['dept_status'];
$user_id        = $_POST['user_id'];

if ($_SESSION['record_found'] == 0) {
    $sqlQry = "INSERT INTO DEPARTMENT_MASTER (DEPT_CODE, DEPT_NAME,  DEPT_STATUS, USER_ID)
               VALUES (
                  '" . $dept_code . "',
                  '" . $dept_name . "',
                  '" . $dept_status . "',
                  '" . $user_id . "'
               )";
    $_SESSION['message_text'] = "dept Successfully Added";
} else {
    $sqlQry = "UPDATE DEPARTMENT_MASTER SET
      DEPT_CODE    = '" . $dept_code . "',
      DEPT_NAME    = '" . $dept_name . "',
      DEPT_STATUS  = '" . $dept_status . "',
      USER_ID        = '" . $user_id . "'
      WHERE ID = '" . $id . "'";
    $_SESSION['message_text'] = "dept Successfully Updated";
}

if ($conn->query($sqlQry) === TRUE) {
    $_SESSION['message_type'] = 0; // success
    $_SESSION['redirect_page'] = "";
} else {
    $_SESSION['message_text'] = $conn->error;
    $_SESSION['message_type'] = 1; // error
    $_SESSION['redirect_page'] = "#";
}

header('Location: department_master.php');
?>
