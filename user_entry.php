<?php
session_start();
include('conn.inc');

$id             = $_SESSION['id'];
$user_id        = $_POST['user_id'];
$user_name      = $_POST['user_name'];
$user_gender    = $_POST['user_gender'];
$user_dob       = $_POST['user_dob'];
$user_address   = $_POST['user_address'];
$user_district  = $_POST['user_district'];
$user_pin       = $_POST['user_pin'];
$user_block     = $_POST['user_block'];
$user_email     = $_POST['user_email'];
$user_mobile    = $_POST['user_mobile'];
$centre_code    = $_POST['centre_code'];
$bank_acc       = $_POST['bank_acc'];
$bank_ifsc      = $_POST['bank_ifsc'];
$bank_name      = $_POST['bank_name'];
$bank_branch    = $_POST['bank_branch'];
$bank_holder    = $_POST['bank_holder'];
$user_role      = $_POST['user_role'];
$user_status    = $_POST['user_status'];
$security_qs    = $_POST['security_qs'];
$security_ans   = $_POST['security_ans'];

if ($_SESSION['record_found'] == 0) {
    $sqlQry = "INSERT INTO USER_MASTER (USER_ID, USER_NAME, USER_GENDER, USER_DOB, USER_ADDRESS, USER_DISTRICT, USER_PIN, USER_BLOCK, USER_EMAIL, USER_MOBILE, CENTRE_CODE, BANK_ACC, BANK_IFSC, BANK_NAME, BANK_BRANCH, BANK_HOLDER, USER_ROLE, USER_STATUS, SECURITY_QS, SECURITY_ANS)
               VALUES (
                  '" . $user_id . "',
                  '" . $user_name . "',
                  '" . $user_gender . "',
                  '" . $user_dob . "',
                  '" . $user_address . "',
                  '" . $user_district . "',
                  '" . $user_pin . "',
                  '" . $user_block . "',
                  '" . $user_email . "',
                  '" . $user_mobile . "',
                  '" . $centre_code . "',
                  '" . $bank_acc . "',
                  '" . $bank_ifsc . "',
                  '" . $bank_name . "',
                  '" . $bank_branch . "',
                  '" . $bank_holder . "',
                  '" . $user_role . "',
                  '" . $user_status . "',
                  '" . $security_qs . "',
                  '" . $security_ans . "'
               )";
    $_SESSION['message_text'] = "User Successfully Added";
} else {
    $sqlQry = "UPDATE USER_MASTER SET
      USER_ID        = '" . $user_id . "',
      USER_NAME      = '" . $user_name . "',
      USER_GENDER    = '" . $user_gender . "',
      USER_DOB       = '" . $user_dob . "',
      USER_ADDRESS   = '" . $user_address . "',
      USER_DISTRICT  = '" . $user_district . "',
      USER_PIN       = '" . $user_pin . "',
      USER_BLOCK     = '" . $user_block . "',
      USER_EMAIL     = '" . $user_email . "',
      USER_MOBILE    = '" . $user_mobile . "',
      CENTRE_CODE    = '" . $centre_code . "',
      BANK_ACC       = '" . $bank_acc . "',
      BANK_IFSC      = '" . $bank_ifsc . "',
      BANK_NAME      = '" . $bank_name . "',
      BANK_BRANCH    = '" . $bank_branch . "',
      BANK_HOLDER    = '" . $bank_holder . "',
      USER_ROLE      = '" . $user_role . "',
      USER_STATUS    = '" . $user_status . "',
      SECURITY_QS    = '" . $security_qs . "',
      SECURITY_ANS   = '" . $security_ans . "'
      WHERE ID = '" . $id . "'";
    $_SESSION['message_text'] = "User Successfully Updated";
}

if ($conn->query($sqlQry) === TRUE) {
    $_SESSION['message_type'] = 0; // success
    $_SESSION['redirect_page'] = "";
} else {
    $_SESSION['message_text'] = $conn->error;
    $_SESSION['message_type'] = 1; // error
    $_SESSION['redirect_page'] = "#";
}

header('Location: user_master.php');
?>
