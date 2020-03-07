<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if ( !isset( $_SESSION[ "loggedin" ] ) || $_SESSION[ "loggedin" ] !== true ) {
  header( "location: login.php" );
  exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Scripts -->
  <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
	<script src="https://malsup.github.io/min/jquery.form.min.js"></script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/autonumeric/1.8.2/autoNumeric.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

  
</head>
<body>
  <!--Navbar -->
  <?php include_once('asset/navbar.php'); ?>
  <!--/.Navbar -->	
	<button type="button" data-toggle="modal" data-target="#modalListDamage">Launch modal</button><br>
<div class="modal fade" id="modalListDamage" tabindex="-1" role="dialog" aria-labelledby="modalListDamageTitle" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content" align="center">
      <div class="modal-header">
        <h5 class="modal-title" id="modalListDamageTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modalListDamageBody">
      </div>
			<div class="modal-body" id="modalAddDamage">
				<form id="addDamage">
					<div class="form-row d-inline-flex">
						<div class="col-auto">
							<select id="vehicle" name="vehicle" class="custom-select">
								<option disabled selected style="display: none" value="0">Ort</option>
									<?php  
										require_once('php/connect_db.php');
										mysqli_select_db($link, 'limowien') or die('Cannot select database. ' . mysqli_error());
										$sql = mysqli_query($link, "SELECT id, name FROM dmg_location WHERE id BETWEEN 1 AND 99");
										while ($row = mysqli_fetch_array($sql)) {
											echo "<option value='". $row['id']. "'>". $row['name'] ."</option>";
										}
									?>
								<option disabled>-- INNENRAUM </option>
									<?php  
										require_once('php/connect_db.php');
										mysqli_select_db($link, 'limowien') or die('Cannot select database. ' . mysqli_error());
										$sql = mysqli_query($link, "SELECT id, name FROM dmg_location WHERE id BETWEEN 100 AND 150");
										while ($row = mysqli_fetch_array($sql)) {
											echo "<option value='". $row['id']. "'>". $row['name'] ."</option>";
										}
									?>
							</select>
						</div>
						<div class="col-auto">
							<select id="vehicle" name="vehicle" class="custom-select">
								<option disabled selected style="display: none" value="0">Seite</option>
									<?php  
										require_once('php/connect_db.php');
										mysqli_select_db($link, 'limowien') or die('Cannot select database. ' . mysqli_error());
										$sql = mysqli_query($link, "SELECT id, name FROM dmg_side");
										while ($row = mysqli_fetch_array($sql)) {
											echo "<option value='". $row['id']. "'>". $row['name'] ."</option>";
										}
									?>
							</select>
						</div>
						<div class="col-auto">
							<select id="vehicle" name="vehicle" class="custom-select">
								<option disabled selected style="display: none" value="0">Kategorie</option>
									<?php  
										require_once('php/connect_db.php');
										mysqli_select_db($link, 'limowien') or die('Cannot select database. ' . mysqli_error());
										$sql = mysqli_query($link, "SELECT id, name FROM dmg_category");
										while ($row = mysqli_fetch_array($sql)) {
											echo "<option value='". $row['id']. "'>". $row['name'] ."</option>";
										}
									?>
							</select>
						</div>
						<div class="col-auto">
							<select id="vehicle" name="vehicle" class="custom-select">
								<option disabled selected style="display: none" value="0">Eigenschaft</option>
									<?php  
										require_once('php/connect_db.php');
										mysqli_select_db($link, 'limowien') or die('Cannot select database. ' . mysqli_error());
										$sql = mysqli_query($link, "SELECT id, name FROM dmg_attr ORDER BY name");
										while ($row = mysqli_fetch_array($sql)) {
											echo "<option value='". $row['id']. "'>". $row['name'] ."</option>";
										}
									?>
							</select>
						</div>
						<div class="col-auto">
							<button type="submit" id="button" class="btn btn-outline-success mr-3">Absenden</button>
						</div>
					</div>
				</form>
			</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success float-left" onClock="ModalDamageAdd()">Schaden hinzufügen</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Schließen</button>
      </div>
    </div>
  </div>
</div>
	<!--
		- location
  	- side
  	- category
  	- atr 
	-->
  
  


  <!-- JavaScript -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" type="text/javascript"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
</body>

</html>