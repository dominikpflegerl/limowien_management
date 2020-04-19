<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if ( !isset( $_SESSION[ "loggedin" ] ) || $_SESSION[ "loggedin" ] !== true ) {
  header( "location: index.php" );
  exit;
}

require_once "connect_db.php";

// set parameters and execute

$owner   		= $_POST['owner'];
$brand      = $_POST['brand'];
$model     	= $_POST['model'];
$license    = $_POST['license'];

$license_w 		= "W-";
$license_mw 	= "MW";

$license_full = $license_w . $license . $license_mw;

// prepare and bind
//i - integer
//d - double
//s - string
//b - BLOB

$stmt = $link->prepare("INSERT INTO vehicle(owner, brand, model, license) 
												VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $owner, $brand, $model, $license_full);



if ($stmt->execute()) { 
    $success = true;
};

//if ($success == true) {echo "SUCCES";} else {echo "FAIL";};
  
$stmt->close();
?>