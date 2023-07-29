<?php include 'header.php'; ?>

<?php
$centre_id = isset($_GET["centre_id"]) ? trim($_GET["centre_id"]) : null;
session_start();
include('conn.inc');
$_SESSION['centre_id'] = $centre_id;

$sqlQry = "SELECT * FROM CENTRE_MASTER WHERE centre_id = '".$centre_id."'";
$result = $conn->query($sqlQry);

if ($result->num_rows == 0){
    $_SESSION['record_found'] = 0;
    $centre_code    = "";
    $centre_name    = "";
    $district_code  = "";
    $centre_pin     = "";
    $centre_status  = "";
    $centre_date    = "";
    $centre_address = "";
    $centre_lat     = "";
    $centre_lon     = "";
    $user_id        = "";
}else{
    $_SESSION['record_found'] = 1;
    $row = $result->fetch_assoc();
    $centre_code    = isset($row['centre_code']) ? $row['centre_code'] : "";
    $centre_name    = isset($row['centre_name']) ? $row['centre_name'] : "";
    $district_code  = isset($row['district_code']) ? $row['district_code'] : "";
    $centre_pin     = isset($row['centre_pin']) ? $row['centre_pin'] : "";
    $centre_status  = isset($row['centre_status']) ? $row['centre_status'] : "";
    $centre_date    = isset($row['centre_date']) ? $row['centre_date'] : "";
    $centre_address = isset($row['centre_address']) ? $row['centre_address'] : "";
    $centre_lat     = isset($row['centre_lat']) ? $row['centre_lat'] : "";
    $centre_lon     = isset($row['centre_lon']) ? $row['centre_lon'] : "";
    $user_id        = isset($row['user_id']) ? $row['user_id'] : "";
}
?>


 
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div id="comments">
        
    <h1 style='text-align:center;color:#896014'>Center Master</h1>

       <form name="CenterEntryForm" action="center_entry.php" method="POST">
       <input type="hidden" name="centre_id" value="<?php echo $centre_id; ?>">

          <div>
          <div class="one_third first">
            <label for="centre Code">Centre Code<span>*</span></label>
            <input type="text" name="centre_code" id="centre_code" value="<?php echo $centre_code; ?>" size="22" required>
          </div>
          <div class="one_third">
            <label for="centre_name">Centre Name<span>*</span></label>
            <input type="text" name="centre_name" id="centre_name" value="<?php echo $centre_name; ?>" size="22" required>
          </div>
          <div class="one_third">
          <label>District Code: <span>*</span></label>
          <select id="district_code" name="district_code"  style="padding: 9px;" required>
            <option value="<?php echo $district_code; ?>">Select a district</option>
            <option value="">district code - district name</option>
            <?php
                    $districtQuery = "SELECT * FROM district_master";
                    $districtResult = $conn->query($districtQuery);
                    while ($districtRow = $districtResult->fetch_assoc()) {
                      echo '<option value="'.$districtRow['DISTRICT_CODE'].'">'.$districtRow['DISTRICT_CODE'].' - '.$districtRow['DISTRICT_NAME'].'</option>';
                    }
                    ?>
          </select>
          </div>
          <div class="one_third first">
            <label for="centre_pin">Centre Pin<span>*</span></label>
            <input type="text" name="centre_pin" id="centre_pin" value="<?php echo $centre_pin; ?>" size="22" required>
          </div>

          <div class="one_third">
            <label for="block_code">Block Code<span>*</span></label>
            <select id="block_code" name="block_code"  style="padding: 9px;" required>
            <option value="">Select a block</option>
            <option value="">district id - block name</option>
            <?php
                    $blockQuery = "SELECT * FROM block_master";
                    $blockResult = $conn->query($blockQuery);
                    while ($blockRow = $blockResult->fetch_assoc()) {
                      echo '<option value="'.$blockRow['BLOCK_CODE'].'">'.$blockRow['DISTRICT_CODE'].' - '.$blockRow['BLOCK_NAME'].'</option>';
                    }
            ?>
            </select>
          </div>

          <div class="one_third">
          <label for="centre_status">Centre Status<span>*</span></label>
            <select id="centre_status" name="centre_status"  style="padding: 9px;" required>
            <option value="ACTIVE">ACTIVE</option>
            <option value="INACTIVE">INACTIVE</option>

            </select>
          </div>
          <div class="one_third first">
          <label>Date <span>*</span></label>
          <input type="date" id="centre_date" name="centre_date" value="<?php echo $centre_date; ?>" size="22" required />
          </div>

          <div class="one_third">
            <label for="centre_lat">Centre Latitude<span>*</span></label>
            <input type="text" name="centre_lat" id="centre_lat" value="<?php echo $centre_lat; ?>" size="22" required>
          </div>

          <div class="one_third">
            <label for="centre_lon">Centre Longitude<span>*</span></label>
            <input type="text" name="centre_lon" id="centre_lon" value="<?php echo $centre_lon; ?>" size="22" required>
          </div>

          <div class="one_third first">
            <label for="centre_address">Centre Address</label>
            <input name="centre_address" id="centre_address" value="<?php echo $centre_address; ?>" ></input>
          </div>

          <div class="one_third">
            <label>User ID<span>*</span></label>
            <input type="text" id="user_id" name="user_id" value="<?php echo $user_id; ?>" size="22" required >
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
              <th>Centre Code</th>
              <th>Centre Name</th>
              <th>District Code</th>
              <th>Centre Pin</th>
              <th>Block Code</th>
              <th>Centre Status</th>
              <th>Date</th>
              <th>Centre latitude</th>
              <th>Centre longitude</th>
              <th>Centre Address</th>
              <th>User Id</th>
              <th>Update</th>
            </tr>
          </thead>
          <?php     
            $sqlQry = "SELECT * FROM CENTRE_MASTER";
            $result = $conn->query($sqlQry);
            while ($row = $result->fetch_assoc()) {
          ?> 
          <tr>
            <td><?php echo $row["CENTRE_CODE"]; ?></td>
            <td><?php echo $row["CENTRE_NAME"]; ?></td>
            <td><?php echo $row["DISTRICT_CODE"]; ?></td>
            <td><?php echo $row["CENTRE_PIN"]; ?></td>
            <td><?php echo $row["BLOCK_CODE"]; ?></td>
            <td><?php echo $row["CENTRE_STATUS"]; ?></td>
            <td><?php echo $row["CENTRE_DATE"]; ?></td>
            <td><?php echo $row["CENTRE_LAT"]; ?></td>
            <td><?php echo $row["CENTRE_LON"]; ?></td>
            <td><?php echo $row["CENTRE_ADDRESS"]; ?></td>
            <td><?php echo $row["USER_ID"]; ?></td>
            <td>
              <div class="links">
              <a class="link" href="center_master.php?centre_id=<?php echo $row["CENTRE_ID"]; ?>">Update</a>

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