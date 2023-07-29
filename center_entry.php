<?php
session_start();
include('conn.inc');

$centre_id = $_SESSION['centre_id'];
$centre_code    = $_POST['centre_code'];
$centre_name    = $_POST['centre_name'];
$district_code  = $_POST['district_code'];
$centre_pin     = $_POST['centre_pin'];
$block_code     = $_POST['block_code'];
$centre_status  = $_POST['centre_status'];
$centre_date    = $_POST['centre_date'];
$centre_address = $_POST['centre_address'];
$centre_lat     = $_POST['centre_lat'];
$centre_lon     = $_POST['centre_lon'];
$user_id        = $_POST['user_id'];

if ($_SESSION['record_found'] == 0) {
    $sqlQry = "INSERT INTO CENTRE_MASTER (CENTRE_CODE, CENTRE_NAME, DISTRICT_CODE, CENTRE_PIN, BLOCK_CODE, CENTRE_STATUS, CENTRE_DATE, CENTRE_ADDRESS, CENTRE_LAT, CENTRE_LON, USER_ID)
               VALUES (
                  '" . $centre_code . "',
                  '" . $centre_name . "',
                  '" . $district_code . "',
                  '" . $centre_pin . "',
                  '" . $block_code . "',
                  '" . $centre_status . "',
                  '" . $centre_date . "',
                  '" . $centre_address . "',
                  '" . $centre_lat . "',
                  '" . $centre_lon . "',
                  '" . $user_id . "'
               )";
    $_SESSION['message_text'] = "centre Successfully Added";
} else {
    $sqlQry = "UPDATE CENTRE_MASTER SET
      CENTRE_CODE    = '" . $centre_code . "',
      CENTRE_NAME    = '" . $centre_name . "',
      DISTRICT_CODE  = '" . $district_code . "',
      CENTRE_PIN     = '" . $centre_pin . "',
      BLOCK_CODE     = '" . $block_code . "',
      CENTRE_STATUS  = '" . $centre_status . "',
      CENTRE_DATE    = '" . $centre_date . "',
      CENTRE_ADDRESS = '" . $centre_address . "',
      CENTRE_LAT     = '" . $centre_lat . "',
      CENTRE_LON     = '" . $centre_lon . "',
      USER_ID        = '" . $user_id . "'
      WHERE CENTRE_ID = '" . $centre_id . "'";
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

header('Location: center_master.php');
?>
