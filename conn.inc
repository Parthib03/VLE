<?php
date_default_timezone_set('Asia/Calcutta');

// --------- for localhost 
$db_name       = "VLE_DB";
$servername    = "localhost";
$username      = "root";
$password      = "PaRthiB@2003_";

 
// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);


// Check connection
if ($conn->connect_error) { die("Connection failed : " . $conn->connect_error);
echo "Unable to connect"; exit(); } // end ?>
