<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if ( !isset( $_SESSION[ "loggedin" ] ) || $_SESSION[ "loggedin" ] !== true ) {
  header( "location: index.php" );
  exit;
}


require_once "config.php";

// prepare and bind
$stmt = $link->prepare("INSERT INTO protocol (protocol_typ_id, vehicle_id, mileage, location, user_id)
                    VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("iiisi", $protocol_typ_id, $vehicle_id, $mileage, $location, $user_id);

// set parameters and execute
$protocol_typ_id = 1;
$vehicle_id   = $_POST['vehicle'];
$mileage      = $_POST['mileage'];;
$location     = $_POST['location'];;
$user_id      = $_SESSION['user_id'];;


if ($stmt->execute()) { 
    $success = true;
}
  
$stmt->close();

?>