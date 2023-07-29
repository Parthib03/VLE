<?php
session_start();
include('conn.inc');

$id = $_SESSION['id'];
$service_code   = $_POST['service_code'];
$service_name   = $_POST['service_name'];
$dept_code      = $_POST['dept_code'];
$service_desc   = $_POST['service_desc'];
$service_status = $_POST['service_status'];
$service_charge = $_POST['service_charge'];
$vle_commission = $_POST['vle_commission'];
$service_remarks= $_POST['service_remarks'];
$user_id        = $_POST['user_id'];

if ($_SESSION['record_found'] == 0) {
    $sqlQry = "INSERT INTO SERVICE_MASTER (SERVICE_CODE, SERVICE_NAME, DEPT_CODE, SERVICE_DESC, SERVICE_STATUS, SERVICE_CHARGE, VLE_COMMISSION, SERVICE_REMARKS, USER_ID)
               VALUES (
                  '" . $service_code . "',
                  '" . $service_name . "',
                  '" . $dept_code . "',
                  '" . $service_desc . "',
                  '" . $service_status . "',
                  '" . $service_charge . "',
                  '" . $vle_commission . "',
                  '" . $service_remarks . "',
                  '" . $user_id . "'
               )";
    $_SESSION['message_text'] = "service Successfully Added";
} else {
    $sqlQry = "UPDATE SERVICE_MASTER SET
      SERVICE_CODE    = '" . $service_code . "',
      SERVICE_NAME    = '" . $service_name . "',
      DEPT_CODE       = '" . $dept_code . "',
      SERVICE_DESC    = '" . $service_desc . "',
      SERVICE_STATUS  = '" . $service_status . "',
      SERVICE_CHARGE  = '" . $service_charge . "',
      VLE_COMMISSION  = '" . $vle_commission . "',
      SERVICE_REMARKS = '" . $service_remarks . "',
      USER_ID         = '" . $user_id . "'
      WHERE ID = '" . $id . "'";
    $_SESSION['message_text'] = "centre Successfully Updated";
}

if ($conn->query($sqlQry) === TRUE) {
    $_SESSION['message_type'] = 0; // success
    $_SESSION['redirect_page'] = "";
} else {
    $_SESSION['message_text'] = $conn->error;
    $_SESSION['message_type'] = 1; // error
    $_SESSION['redirect_page'] = "#";
}

header('Location: service_master.php');
?>
