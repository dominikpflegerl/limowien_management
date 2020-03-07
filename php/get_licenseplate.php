<?php 
	require_once('connect_db.php');
	$vehicleID = $_GET['vehicle'];
	mysqli_select_db($link, 'limowien') or die('Cannot select database. ' . mysqli_error());
	$sql = mysqli_query($link, "SELECT license FROM vehicle WHERE vehicle_id = $vehicleID");
	
	$row = mysqli_fetch_assoc($sql);
  $licensePHP = $row['license'];
	echo $licensePHP;
?>