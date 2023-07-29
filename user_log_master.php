<?php include 'header.php'; ?>

<?php
$id = isset($_GET["id"]) ? trim($_GET["id"]) : null;
session_start();
include('conn.inc');
$_SESSION['id'] = $id;


?>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
 


           
       
      <!-- ################################################################################################ -->
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
              <th>LOG DATE & TIME</th>
              <th>LOG IP </th>
              <th>LOG DEVICE NAME</th>
              <th>LOG DEVICE TYPE</th>
              <th>LOG REMARKS</th>
            </tr>
          </thead>
          <?php     
            $sqlQry = "SELECT * FROM USER_LOG";
            $result = $conn->query($sqlQry);
            while ($row = $result->fetch_assoc()) {
          ?> 
          <tr>
            <td><?php echo $row["USER_ID"]; ?></td>
            <td><?php echo $row["LOG_DATE_TIME"]; ?></td>
            <td><?php echo $row["LOG_IP"]; ?></td>
            <td><?php echo $row["LOG_DEVICE_NAME"]; ?></td>
            <td><?php echo $row["LOG_DEVICE_TYPE"]; ?></td>
            <td><?php echo $row["LOG_REMARKS"]; ?></td>
            <?php } ?>
          </tr>
          
        </table>
      </div>
      
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<?php include 'footer.php'; ?>