<?php include 'header.php'; ?>

<?php
session_start();
include('conn.inc');
$user_id = $_SESSION['id'];

$sqlQry = "SELECT * FROM USER_MASTER WHERE USER_ID = '".$user_id."'";
$result = $conn->query($sqlQry);

if ($result->num_rows == 0){
    $_SESSION['record_found'] = 0;
    $user_id        = "";
    $user_name      = "";
    $user_gender    = "";
    $user_dob       = "";
    $user_address   = "";
    $user_district  = "";
    $user_pin       = "";
    $user_block     = "";
    $user_email     = "";
    $user_mobile    = "";
    $centre_code    = "";
    $bank_acc       = "";
    $bank_ifsc      = "";
    $bank_name      = "";
    $bank_branch    = "";
    $bank_holder    = "";
    $user_role      = "";
    $user_status    = "";
    $security_qs    = "";
    $security_ans   = "";
}else{
    $_SESSION['record_found'] = 1;
    $row = $result->fetch_assoc();
    $user_id        = isset($row['USER_ID']) ? $row['USER_ID'] : "";
    $user_name      = isset($row['USER_NAME']) ? $row['USER_NAME'] : "";
    $user_gender    = isset($row['USER_GENDER']) ? $row['USER_GENDER'] : "";
    $user_dob       = isset($row['USER_DOB']) ? $row['USER_DOB'] : "";
    $user_address   = isset($row['USER_ADDRESS']) ? $row['USER_ADDRESS'] : "";
    $user_district  = isset($row['USER_DISTRICT']) ? $row['USER_DISTRICT'] : "";
    $user_pin       = isset($row['USER_PIN']) ? $row['USER_PIN'] : "";
    $user_block     = isset($row['USER_BLOCK']) ? $row['USER_BLOCK'] : "";
    $user_email     = isset($row['USER_EMAIL']) ? $row['USER_EMAIL'] : "";
    $user_mobile    = isset($row['USER_MOBILE']) ? $row['USER_MOBILE'] : "";
    $centre_code    = isset($row['CENTRE_CODE']) ? $row['CENTRE_CODE'] : "";
    $bank_acc       = isset($row['BANK_ACC']) ? $row['BANK_ACC'] : "";
    $bank_ifsc      = isset($row['BANK_IFSC']) ? $row['BANK_IFSC'] : "";
    $bank_name      = isset($row['BANK_NAME']) ? $row['BANK_NAME'] : "";
    $bank_branch    = isset($row['BANK_BRANCH']) ? $row['BANK_BRANCH'] : "";
    $bank_holder    = isset($row['BANK_HOLDER']) ? $row['BANK_HOLDER'] : "";
    $user_role      = isset($row['USER_ROLE']) ? $row['USER_ROLE'] : "";
    $user_status    = isset($row['USER_STATUS']) ? $row['USER_STATUS'] : "";
    $security_qs    = isset($row['SECURITY_QS']) ? $row['SECURITY_QS'] : "";
    $security_ans   = isset($row['SECURITY_ANS']) ? $row['SECURITY_ANS'] : "";
}
?>
 
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div id="comments">
        
        <h1 style='text-align:center;color:#896014'>User Details</h1>
        <div>
       
                <form name="AdminDetailsForm" action="admin_details.php" method="POST">
                  <div>
                  <div class="one_third first">
                  <label for="user_id">User ID<span>*</span></label>
                  <input type="text" name="user_id" id="user_id" value="<?php echo $user_id; ?>" size="22" required readonly>
                  </div>
                  <div class="one_third">
                  <label for="user_name">User Name<span>*</span></label>
                  <input type="text" name="user_name" id="user_name" value="<?php echo $user_name; ?>" size="22" required readonly>
                  </div>
                  <div class="one_third">
                  <label for="user_gender">Gender<span>*</span></label>
                  <input type="text" name="user_gender" id="user_gender" value="<?php echo $user_gender; ?>" size="22" required readonly>
                  </div>
                  <div class="one_third first">
                    <label for="user_dob">Date of Birth<span>*</span></label>
                    <input type="text" name="user_dob" id="user_dob" value="<?php echo $user_dob; ?>" size="22" required readonly>
                  </div>
                  <div class="one_third">
                    <label for="user_address">Address<span>*</span></label>
                    <input type="text" name="user_address" id="user_address" value="<?php echo $user_address; ?>" size="22" required readonly>
                  </div>
                  <div class="one_third">
                    <label for="user_district">District<span>*</span></label>
                    <input type="text" name="user_district" id="user_district" value="<?php echo $user_district; ?>" size="22" required readonly>
                  </div>
                  <div class="one_third first">
                    <label for="user_pin">PIN<span>*</span></label>
                    <input type="text" name="user_pin" id="user_pin" value="<?php echo $user_pin; ?>" size="22" required readonly>
                  </div>
                  <div class="one_third">
                    <label for="user_block">Block</label>
                    <input type="text" name="user_block" id="user_block" value="<?php echo $user_block; ?>" size="22" readonly>
                  </div>
                  <div class="one_third">
                    <label for="user_email">Email<span>*</span></label>
                    <input type="text" name="user_email" id="user_email" value="<?php echo $user_email; ?>" size="22" required readonly>
                  </div>
                  <div class="one_third first">
                    <label for="user_mobile">Mobile<span>*</span></label>
                    <input type="text" name="user_mobile" id="user_mobile" value="<?php echo $user_mobile; ?>" size="22" required readonly>
                  </div>
                  <div class="one_third">
                    <label for="centre_code">Centre Code</label>
                    <input type="text" name="centre_code" id="centre_code" value="<?php echo $centre_code; ?>" size="22" readonly>
                  </div>
                  <div class="one_third">
                    <label for="bank_acc">Bank Account<span>*</span></label>
                    <input type="text" name="bank_acc" id="bank_acc" value="<?php echo $bank_acc; ?>" size="22" required readonly>
                  </div>
                  <div class="one_third first">
                    <label for="bank_ifsc">Bank IFSC<span>*</span></label>
                    <input type="text" name="bank_ifsc" id="bank_ifsc" value="<?php echo $bank_ifsc; ?>" size="22" required readonly>
                  </div>
                  <div class="one_third">
                    <label for="bank_name">Bank Name<span>*</span></label>
                    <input type="text" name="bank_name" id="bank_name" value="<?php echo $bank_name; ?>" size="22" required readonly>
                  </div>
                  <div class="one_third">
                    <label for="bank_branch">Bank Branch<span>*</span></label>
                    <input type="text" name="bank_branch" id="bank_branch" value="<?php echo $bank_branch; ?>" size="22" required readonly>
                  </div>
                  <div class="one_third first">
                    <label for="bank_holder">Bank Account Holder<span>*</span></label>
                    <input type="text" name="bank_holder" id="bank_holder" value="<?php echo $bank_holder; ?>" size="22" required readonly>
                  </div>
                  <div class="one_third">
                    <label for="user_role">User Role<span>*</span></label>
                    <input type="text" name="user_role" id="user_role" value="<?php echo $user_role; ?>" size="22" required readonly>
                  </div>
                  <div class="one_third">
                    <label for="user_status">User Status<span>*</span></label>
                    <input type="text" name="user_status" id="user_status" value="<?php echo $user_status; ?>" size="22" required readonly>
                  </div>
                  <div class="one_third first">
                    <label for="security_qs">Security Question<span>*</span></label>
                    <input type="text" name="security_qs" id="security_qs" value="<?php echo $security_qs; ?>" size="22" required readonly>
                  </div>
                  <div class="one_third">
                    <label for="security_ans">Security Answer<span>*</span></label>
                    <input type="text" name="security_ans" id="security_ans" value="<?php echo $security_ans; ?>" size="22" required readonly>
                  </div>
                  </div> 
                </form>
        <!-- End Form -->

      </div>
      <!-- ################################################################################################ -->
    </div>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>

<!-- Additional CSS styles for alignment -->
<style>
    /* Add your CSS styles here */
    /* ... */
</style>

<?php include 'footer.php'; ?>
