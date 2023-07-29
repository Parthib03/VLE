<?php
include('conn.inc');
session_start();
$mode = isset($_REQUEST["mode"]) ? $_REQUEST["mode"] : null;
if($mode==="login"){
    $name = $_POST['username'];
    $pw = $_POST['password'];
    $sqlQry = "SELECT * FROM LOGIN_MASTER WHERE USER_ID ='".$name."' AND USER_PW ='".$pw."'";
    $result = $conn->query($sqlQry);
    if($result->num_rows > 0){
      $row=$result->fetch_assoc();
      $_SESSION['id']=$row['USER_ID'];
      $_SESSION['name']=$row['USER_NAME'];
      $_SESSION['role']=$row['USER_ROLE'];
      $_SESSION['status']=$row['USER_STATUS'];
      if($row['USER_STATUS']==='ACTIVE'){
        // Userlog entry-------------------------------------------------------
        $log_ip = $_SERVER['REMOTE_ADDR'];
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        if (strpos($userAgent, 'Firefox') !== false) {
            $device_name="Firefox";
        } elseif (strpos($userAgent, 'Chrome') !== false) {
          $device_name="Chrome";
        } elseif (strpos($userAgent, 'Safari') !== false) {
          $device_name="Safari";
        } elseif (strpos($userAgent, 'Edge') !== false) {
          $device_name="Edge";
        } elseif (strpos($userAgent, 'Opera') !== false) {
          $device_name="Opera";
        } else {
          $device_name="Others";
        }
        function isMobileDevice() {
          return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
        }

        $log_remarks = "Logged in successfully";
        if(isMobileDevice()) 
          $device_type="Mobile";
        else
          $device_type="Desktop";
        $sqlQrys = "INSERT INTO USER_LOG(USER_ID,LOG_IP,LOG_DEVICE_NAME,LOG_DEVICE_TYPE,LOG_REMARKS) VALUES(
                    '" .$name."',
                    '" .$log_ip."',
                    '" .$device_name."',
                    '" .$device_type."',
                    '" .$log_remarks."')";
        $results = $conn->query($sqlQrys);
        // Userlog entry----------------------------------------------------
        header('Location: dashboard');
        exit;
      }else{
        $error_msg="Your login has expired";
      }      
    }
    else{
      $error_msg="Incorrect Username/Password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>VLE Login Page</title>

    <link
      href="https://fonts.googleapis.com/css?family=Montserrat:400,700"
      rel="stylesheet"
    />
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="css/style.css" />
  </head>

  <body>
    <div id="booking" class="section">
      <div class="section-center">
        <div class="container">
          <div class="col-md-7 col-md-push-5">
            <div class="booking-cta">
              <h1>Village Level Entrepreneurship Services</h1>
              <p class="h1-text">
                The Village Level Entrepreneurship Services Portal is an
                innovative platform that aims to empower rural communities by
                providing a centralized hub for accessing entrepreneurial
                services and opportunities. This portal serves as a one-stop
                solution for aspiring entrepreneurs in rural areas, offering
                resources, training programs, and financial support to help them
                establish and grow their businesses.With the Village Level
                Entrepreneurship Services Portal, rural communities can foster
                economic development, create employment opportunities, and
                enhance the overall socio-economic fabric of their regions.
              </p>
            </div>
          </div>
          <div class="col-md-4 col-md-pull-7">
            <div class="booking-form">
              <form method="POST">
                <input type="hidden" name="mode" value="login">
                <div class="form-group">
                  <span class="form-label">Username</span>
                  <input
                    class="form-control" type="text" name="username" placeholder="Enter your username"/>
                </div>
                <div class="form-group">
                  <span class="form-label">Password</span>
                  <input
                    class="form-control" type="password" name="password" placeholder="Enter your Password"/>
                </div>

                <div class="form-btn">
                  <button class="submit-btn">Login</button>
                  <a class="forgot-link" href="#">Forgot password ?</a>
                </div>
              </form>
              <?php
                if($error_msg!=""){
                  echo($error_msg);
                }
                ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>