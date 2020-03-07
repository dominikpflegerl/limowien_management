<?php 
require_once('php/connect_db.php');
mysqli_select_db($link, 'limowien') or die('Cannot select database. ' . mysqli_error());
$sql = mysqli_query($link, "SELECT license FROM vehicle WHERE vehicle_id = 3");
$row = mysqli_fetch_assoc($sql);
echo $row['license'];
?>