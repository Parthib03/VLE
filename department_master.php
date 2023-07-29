<?php include 'header.php'; ?>

<?php
$id = isset($_GET["id"]) ? trim($_GET["id"]) : null;
session_start();
include('conn.inc');
$_SESSION['id'] = $id;

$sqlQry = "SELECT * FROM DEPARTMENT_MASTER WHERE id = '".$id."'";
$result = $conn->query($sqlQry);

if ($result->num_rows == 0){
    $_SESSION['record_found'] = 0;
    $dept_code    = "";
    $dept_name    = "";
    $dept_status  = "";
    $user_id      = "";
}else{
    $_SESSION['record_found'] = 1;
    $row = $result->fetch_assoc();
    $dept_code      = isset($row['dept_code']) ? $row['dept_code'] : "";
    $dept_name      = isset($row['dept_name']) ? $row['dept_name'] : "";
    $dept_status  = isset($row['dept_status']) ? $row['dept_status'] : "";
    $user_id        = isset($row['user_id']) ? $row['user_id'] : "";
}
?>
 
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div id="comments">
        
        <h1 style='text-align:center;color:#896014'>Department Master</h1>
        <div>
       
                <form name="DeptEntryForm" action="dept_entry.php" method="POST">
                  <div>
                  <div class="one_third first">
                  <label for="dept_code">Department Code<span>*</span></label>
                  <input type="text" name="dept_code" id="dept_code" value="<?php echo $dept_code; ?>" size="22" required>
                  </div>
                  <div class="one_third">
                  <label for="dept_name">Department Name<span>*</span></label>
                  <input type="text" name="dept_name" id="dept_name" value="<?php echo $dept_name; ?>" size="22" required>
                  </div>
                  <div class="one_third">
                  <label for="dept_status">Department Status<span>*</span></label>
                  <select id="dept_status" name="dept_status" id="dept_status" style="padding: 9px;" required>
                  <option value="ACTIVE">ACTIVE</option>
                  <option value="INACTIVE">INACTIVE</option>

                  </select>
                  </div>
                  <div class="one_third first">
                    <label for="User_id">User Id<span>*</span></label>
                    <input type="text" name="user_id" id="user_id" value="<?php echo $user_id; ?>" size="22" required>
                  </div>
                 <!-- </form> -->

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
                </form>
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
              <th>Department Code</th>
              <th>Department Name</th>
              <th>Department Status</th>
              <th>User Id</th>
              <th>Update</th>
            </tr>
          </thead>
          <?php         
            $sqlQry = "SELECT * FROM DEPARTMENT_MASTER";
            $result = $conn->query($sqlQry);
            while ($row = $result->fetch_assoc()) {
          ?> 
          <tr>
            <td><?php echo $row["DEPT_CODE"]; ?></td>
            <td><?php echo $row["DEPT_NAME"]; ?></td>
            <td><?php echo $row["DEPT_STATUS"]; ?></td>
            <td><?php echo $row["USER_ID"]; ?></td>
            <td>
              <div class="links">
                <a class="link" href='department_master.php?id=<?php echo $row["ID"]; ?>'>Update</a>
              </div>
            </td>
          </tr>
          <?php } ?>
             

        </table>
      </div>
      
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<?php include 'footer.php'; ?>