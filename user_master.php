<?php include 'header.php'; ?>

<?php
$id = isset($_GET["id"]) ? trim($_GET["id"]) : null;
session_start();
include('conn.inc');
$_SESSION['id'] = $id;

$sqlQry = "SELECT * FROM USER_MASTER WHERE id = '".$id."'";
$result = $conn->query($sqlQry);

if ($result->num_rows == 0) {
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
} else {
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
  $user_role      = isset($row['USER_ROLE']) ? $row['USER_ROLE'] : ""; // Default to '2'
  $user_status    = isset($row['USER_STATUS']) ? $row['USER_STATUS'] : ""; // Default to 'ACTIVE'
  $security_qs    = isset($row['SECURITY_QS']) ? $row['SECURITY_QS'] : "";
  $security_ans   = isset($row['SECURITY_ANS']) ? $row['SECURITY_ANS'] : "";
}

?>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
 
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div id="comments">
        
      <h1 style='text-align:center;color:#896014'>user Master</h1>

        <form name="UserEntryForm" action="user_entry.php" method="POST">
          <div>
          <div class="one_third first">
            <label for="User ID">User ID<span>*</span></label>
            <input type="text" name="user_id" id="user_id" value="<?php echo $user_id; ?>" size="22" required>
          </div>

          <div class="one_third">
            <label for="user name">User Name<span>*</span></label>
            <input type="text" name="user_name" id="user_name" value="<?php echo $user_name; ?>" size="22" required>
          </div>

          <div class="one_third">
          <label>User Gender<span>*</span></label>
          <select id="user_gender" name="user_gender" style="padding: 9px;" required>
            <option value="<?php echo $user_gender; ?>">Select a Gender</option>
            <option value="MALE">MALE</option>
            <option value="FEMALE">FEMALE</option>
            <option value="OTHERS">OTHER</option>
          </select>
          </div>

          <div class="one_third first">
            <label>User Date of Birth<span>*</span></label>
            <input type="date" id="user_dob" name="user_dob" value="<?php echo $user_dob; ?>" size="22" required />
          </div>

          <div class="one_third">
            <label for="user_address">User Address</label>
            <input name="user_address" id="user_address" value="<?php echo $user_address; ?>"></input>
          </div>

          <div class="one_third">
          <label for="User_district">User District<span>*</span></label>
            <select id="user_district" name="user_district" id="user_district" style="padding: 9px;" required>
            <option value="<?php echo $user_district; ?>">SELECT A DISTRICT</option>
            <option value="PURBA BARDHAMAN">PURBA BARDHAMAN</option>

            </select>
          </div>

          <div class="one_third first">
            <label for="user_pin">User Pin<span>*</span></label>
            <input type="text" name="user_pin" id="user_pin" value="<?php echo $user_pin; ?>" size="22" required>
          </div>

          <div class="one_third">
            <label for="user_block">User Block<span>*</span></label>
            <input type="text" name="user_block" id="user_block" value="<?php echo $user_block; ?>" size="22" required>
          </div>

          <div class="one_third">
            <label for="user_email">User Email<span>*</span></label>
            <input type="email" name="user_email" id="user_email" value="<?php echo $user_email; ?>" size="22" required>
          </div>

          <div class="one_third first">
            <label for="user_mobile">User Mobile<span>*</span></label>
            <input type="tel" name="user_mobile" id="user_mobile" value="<?php echo $user_mobile; ?>" size="22" required>
          </div>

          <div class="one_third">
            <label for="centre Code">Centre Code<span>*</span></label>
            <input type="text" name="centre_code" id="centre_code" value="<?php echo $centre_code; ?>" size="22" required>
          </div>

          <div class="one_third">
            <label for="bank_acc">User Bank Account<span>*</span></label>
            <input type="text" name="bank_acc" id="bank_acc" value="<?php echo $bank_acc; ?>" size="22" required>
          </div>

          <div class="one_third first">
            <label for="bank_ifsc">User IFSC Number<span>*</span></label>
            <input type="text" name="bank_ifsc" id="bank_ifsc" value="<?php echo $bank_ifsc; ?>" size="22" required>
          </div>

          <div class="one_third">
            <label for="bank_name">User Bank Name<span>*</span></label>
            <input type="text" name="bank_name" id="bank_name" value="<?php echo $bank_name; ?>" size="22" required>
          </div>

          <div class="one_third">
          <label for="bank_branch">User Bank Branch<span>*</span></label>
            <select id="bank_branch" name="bank_branch" id="bank_branch" style="padding: 9px;" required>
            <option value="<?php echo $bank_branch; ?>">SELECT A BRANCH</option>
            <option value="SBI">SBI</option>
            <option value="PUNJAB BANK">PUNJAB BANK</option>

            </select>
          </div>

          <div class="one_third first">
            <label for="bank_holder">User Bank Holder<span>*</span></label>
            <input type="text" name="bank_holder" id="bank_holder" value="<?php echo $bank_holder; ?>" size="22" required>
          </div>

          <div class="one_third">
          <label for="user_role">User Role<span>*</span></label>
            <select id="user_role" name="user_role" id="user_role" style="padding: 9px;" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            </select>
          </div>

          <div class="one_third">
          <label for="user_status">User Status<span>*</span></label>
            <select id="user_status" name="user_status" id="user_status" style="padding: 9px;" required>
            <option value="ACTIVE">ACTIVE</option>
            <option value="INACTIVE">INACTIVE</option>
            </select>
          </div>

          <div class="one_third first">
            <label for="security_qs">User Security Questions<span>*</span></label>
            <input type="text" name="security_qs" id="security_qs" value="<?php echo $security_qs; ?>" size="22" required>
          </div>

          <div class="one_third">
            <label for="security_ans">User Security Ans<span>*</span></label>
            <input type="text" name="security_ans" id="security_ans" value="<?php echo $security_ans; ?>" size="22" required>
          </div>





        <!-- Buttons  -->
        <div class = "one_third first">              
          
          </div>
          <div class="one_third">
            <input type="submit" name="submit" value="Submit Form">  
            <input type="reset" name="reset" value="Reset Form">
          </div>
          
          <div class="one_third">          
          
          </div>
      <!-- End Buttons -->


        </form>
      </div>
      <!-- ################################################################################################ -->
    </div>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
    <div class="content"> 
      
      <div class="scrollable">
        <table>
          <thead>
            <tr>
              <th>User ID</th>
              <th>User Name</th>
              <th>User Gender</th>
              <th>User DOB</th>
              <th>User Address</th>
              <th>User District</th>
              <th>User Pin</th>
              <th>User Block</th>
              <th>User Email</th>
              <th>User Mobile</th>
              <th>Centre Code</th>
              <th>User Role</th>
              <th>User Status</th>
              <th>Security Qs</th>
              <th>Security Ans</th>
              <th>Update</th>
            </tr>
          </thead>
          <tbody>
          <?php     
            $sqlQry = "SELECT * FROM USER_MASTER";
            $result = $conn->query($sqlQry);
            while ($row = $result->fetch_assoc()) {
          ?> 
          <tr>
            <td><?php echo $row["USER_ID"]; ?></td>
            <td><?php echo $row["USER_NAME"]; ?></td>
            <td><?php echo $row["USER_GENDER"]; ?></td>
            <td><?php echo $row["USER_DOB"]; ?></td>
            <td><?php echo $row["USER_ADDRESS"]; ?></td>
            <td><?php echo $row["USER_DISTRICT"]; ?></td>
            <td><?php echo $row["USER_PIN"]; ?></td>
            <td><?php echo $row["USER_BLOCK"]; ?></td>
            <td><?php echo $row["USER_EMAIL"]; ?></td>
            <td><?php echo $row["USER_MOBILE"]; ?></td>
            <td><?php echo $row["CENTRE_CODE"]; ?></td>
            <td><?php echo $row["USER_ROLE"]; ?></td>
            <td><?php echo $row["USER_STATUS"]; ?></td>
            <td><?php echo $row["SECURITY_QS"]; ?></td>
            <td><?php echo $row["SECURITY_ANS"]; ?></td>
            <td>
              <div class="links">
              <a class="link" href="user_master.php?id=<?php echo $row["ID"]; ?>">Update</a>

              </div>
              <?php } ?>
            </td>
          </tr>
        </tbody>
        </table>
      </div>
      
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<?php include 'footer.php'; ?>