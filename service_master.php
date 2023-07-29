<?php include 'header.php'; ?>

<?php
$id = isset($_GET["id"]) ? trim($_GET["id"]) : null;
session_start();
include('conn.inc');
$_SESSION['id'] = $id;

$sqlQry = "SELECT * FROM SERVICE_MASTER WHERE id = '".$id."'";
$result = $conn->query($sqlQry);

if ($result->num_rows == 0){
    $_SESSION['record_found'] = 0;
    $service_code   = "";
    $service_name   = "";
    $dept_code      = "";
    $service_desc   = "";
    $service_status = "";
    $service_charge = "";
    $vle_commission = "";
    $service_remarks = "";
    $user_id        = "";
}else{
    $_SESSION['record_found'] = 1;
    $row = $result->fetch_assoc();
    $service_code   = isset($row['service_code']) ? $row['service_code'] : "";
    $service_name   = isset($row['service_name']) ? $row['service_name'] : "";
    $dept_code      = isset($row['dept_code']) ? $row['dept_code'] : "";
    $service_desc   = isset($row['service_desc']) ? $row['service_desc'] : "";
    $service_status = isset($row['service_status']) ? $row['service_status'] : "";
    $service_charge = isset($row['service_charge']) ? $row['service_charge'] : "";
    $vle_commission = isset($row['vle_commission']) ? $row['vle_commission'] : "";
    $service_remarks= isset($row['service_remarks']) ? $row['service_remarks'] : "";
    $user_id        = isset($row['user_id']) ? $row['user_id'] : "";
}
?>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
 
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div id="comments">
        
    <h1 style='text-align:center;color:#896014'>Service Master</h1>

       <form name="ServiceEntryForm" action="service_entry.php" method="POST">
          <div>
          <div class="one_third first">
            <label for="service_Code">Service Code<span>*</span></label>
            <input type="text" name="service_code" id="service_code" value="<?php echo $service_code; ?>" size="22" required>
          </div>
          <div class="one_third">
            <label for="service_name">Service Name<span>*</span></label>
            <input type="text" name="service_name" id="service_name" value="<?php echo $service_name; ?>" size="22" required>
          </div>
          <div class="one_third">
          <label>Department Code <span>*</span></label>
          <select id="dept_code" name="dept_code" style="padding: 9px;" required>
            <option value="<?php echo $dept_code; ?>">Select a code</option>
            <?php
                    $blockQuery = "SELECT * FROM DEPARTMENT_MASTER";
                    $blockResult = $conn->query($blockQuery);
                    while ($blockRow = $blockResult->fetch_assoc()) {
                      echo '<option value="'.$blockRow['DEPT_CODE'].'">'.$blockRow['DEPT_CODE'].' - '.$blockRow['DEPT_NAME'].'</option>';
                    }
            ?>
           
          </select>
          </div>
          <div class="one_third first">
            <label for="service_desc">Service Description <span>*</span></label>
            <input type="text" name="service_desc" id="service_desc" value="<?php echo $service_desc; ?>" size="22" required>
          </div>

          <div class="one_third">
            <label for="service_charge">Service Charge <span>*</span></label>
            <input type="text" name="service_charge" id="service_charge" value="<?php echo $service_charge; ?>" size="22" required>
          </div>

          <div class="one_third">
          <label for="service_status">Service Status<span>*</span></label>
            <select id="service_status" name="service_status" id="service_status" style="padding: 9px;" required>
            <option value="ACTIVE">ACTIVE</option>
            <option value="INACTIVE">INACTIVE</option>

            </select>
          </div>
          <div class="one_third first">
            <label for="vle_commission">VLE Commission <span>*</span></label>
            <input type="text" name="vle_commission" id="vle_commission" value="<?php echo $vle_commission; ?>" size="22" required>
          </div>

          <div class="one_third">
            <label for="service_remarks">Service Remarks<span>*</span></label>
            <input type="text" name="service_remarks" id="service_remarks" value="<?php echo $service_remarks; ?>" size="22" required>
          </div>

          <div class="one_third">
            <label>User ID<span>*</span></label>
            <input type="text" id="user_id" name="user_id" size="22" required  value="<?php echo $user_id; ?>">
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
              <th>Service Code</th>
              <th>Service Name</th>
              <th>Department Code</th>
              <th>Service Description</th>
              <th>Service Status</th>
              <th>Service Charge</th>
              <th>VLE Commission</th>
              <th>Service Remarks</th>
              <th>User Id</th>
              <th>Update</th>
            </tr>
          </thead>
          <?php     
            $sqlQry = "SELECT * FROM SERVICE_MASTER";
            $result = $conn->query($sqlQry);
            while ($row = $result->fetch_assoc()) {
          ?> 
          <tr>
            <td><?php echo $row["SERVICE_CODE"]; ?></td>
            <td><?php echo $row["SERVICE_NAME"]; ?></td>
            <td><?php echo $row["DEPT_CODE"]; ?></td>
            <td><?php echo $row["SERVICE_DESC"]; ?></td>
            <td><?php echo $row["SERVICE_STATUS"]; ?></td>
            <td><?php echo $row["SERVICE_CHARGE"]; ?></td>
            <td><?php echo $row["VLE_COMMISSION"]; ?></td>
            <td><?php echo $row["SERVICE_REMARKS"]; ?></td>
            <td><?php echo $row["USER_ID"]; ?></td>
            <td>
              <div class="links">
              <a class="link" href="service_master.php?id=<?php echo $row["ID"]; ?>">Update</a>

              </div>
              <?php } ?>
            </td>
          </tr>
          
        </table>
      </div>
      
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<?php include 'footer.php'; ?>