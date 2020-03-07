<?php
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'limowien';

$dbConn = mysqli_connect ($dbHost, $dbUser, $dbPass) or die ('mysqli connect failed. ' . mysqli_error());
mysqli_select_db($dbConn, 'limowien') or die('Cannot select database. ' . mysqli_error());

$sql = mysqli_query($dbConn, "SELECT vehicle_id, license FROM vehicle");

echo '<input id="ChildName" name="ChildName" list="names" style=" width:450px; height:45px;font-size:20pt;" maxlength="15" size="4" >';
echo '<datalist id="names">';
    while ($row = mysqli_fetch_array($sql)) {
    echo "<option data-value='". $row['vehicle_id']. "'>" . $row['license'] ."</option>";
    }
echo '</datalist>';

?>