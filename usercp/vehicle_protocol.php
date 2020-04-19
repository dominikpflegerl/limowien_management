<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if ( !isset( $_SESSION[ "loggedin" ] ) || $_SESSION[ "loggedin" ] !== true ) {
  header( "location: ../index.php" );
  exit;
}

date_default_timezone_set('Europe/Vienna');
$date = date('d.m.Y H:i', time());
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Limowien Management</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
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
  
	<!-- Custom CSS -->
	<style>
		.row {
			display: block;
		}
		
		.protocolform {
			align-content: center;
		}
	</style>
	
	<script>
		function ModalDamageList(){
			var e = document.getElementById('vehicle');
			var selectedVehicle = e.options[e.selectedIndex].text;
			var selectedID			= e.options[e.selectedIndex].value;

			if (selectedID != 0) {
				$('#modalListDamage').modal('show');
				document.getElementById("modalListDamageTitle").innerHTML = selectedVehicle;

				$.ajax({
					type: 'GET',
					url: '../assets/php/get_damagelist.php?vehicle='+selectedID,
					success: function(response){					
						document.getElementById("modalListDamageBody").innerHTML = response;
					}
				})
			}	else {
				Swal.fire({
					type: 'error',
					title: 'Fahrzeug auswählen!',
					timer: 0
				})
			}
			console.log(selectedID);
			console.log(selectedVehicle);
		}
	</script>
</head>
	
<body class="mx-auto">
 	<div class="p-3">
		
		<!--Navbar -->
		<?php include_once('../components/navbar.php')	?>
  	<!--/.Navbar -->
		
		<div class="py-3 px-4 mt-3 bg-primary rounded">
			<h1>Fahrzeug Protokolle</h1>
			<form id="protocolform" action="assets/php/insert_protocol_drop.php" method="post">
				
				<!-- Protokoll Auswahl -->      
					<div class="form-group row">
						<label for="protocol" class="col-3 col-form-label text-white font-weight-bold">Art</label> 
						<div class="col-auto">
							<select id="protocol" name="protocol" class="custom-select">
									<option disabled selected style="display: none" value="0">Protokoll auswählen...</option>
									<?php  
										require_once('../assets/php/connect_db.php');
										mysqli_select_db($link, 'web_limowien') or die('Cannot select database. ' . mysqli_error());
										$sql = mysqli_query($link, "SELECT * FROM protocol_typ;");
										while ($row = mysqli_fetch_array($sql)) {
											echo "<option class='text-black' value='" . $row['protocol_typ_id'] . "'>  " . $row['name'] . " </option>";
										}
									?>
							</select>
						</div>
					</div> 
				<!-- Protokoll Auswahl ENDE -->				
				
				<!-- DateTime Feld -->
				<div class="form-group row" id="DateTime">
					<label for="DateTime" class="col-3 col-form-label text-white font-weight-bold">Zeitpunkt</label> 
					<div class="col-auto">
						<div class="input-group">
							<div class="input-group-prepend"></div> 
							<input id="DateTime" name="DateTime" type="text" class="form-control rounded" disabled placeholder="<?php echo $date?>">
						</div>
					</div>
				</div> 
				<!-- DateTime Feld END -->
		
				<!-- Fahrer Feld -->
					<div class="form-group row" id="Fahrer">
						<label for="fahrer" class="col-3 col-form-label text-white font-weight-bold">Fahrer</label> 
						<div class="col-auto">
							<div class="input-group">
								<div class="input-group-prepend"></div> 
								<input id="fahrer" name="text" type="text" class="form-control rounded" disabled placeholder="<?php echo htmlspecialchars($_SESSION["firstname"]); echo " "; echo htmlspecialchars($_SESSION["lastname"]) ?>">
							</div>
						</div>
					</div> 
				<!-- Fahrer Feld  ENDE -->
		
				<!-- Fahrzeug Auswahl -->      
					<div class="form-group row">
						<label for="vehicle" class="col-3 col-form-label text-white font-weight-bold">Fahrzeug</label> 
						<div class="col-auto">
							<select id="vehicle" name="vehicle" class="custom-select">
									<option disabled selected style="display: none" value="0">Fahrzeug auswählen...</option>
									<?php  
										require_once('../assets/php/connect_db.php');
										mysqli_select_db($link, 'web_limowien') or die('Cannot select database. ' . mysqli_error());
										$sql = mysqli_query($link, "SELECT vehicle_id, license, model FROM vehicle");
										while ($row = mysqli_fetch_array($sql)) {
											echo "<option value='". $row['vehicle_id']. "'>  ". $row['license'] ." | ". $row['model'] . "</option>";
										}
									?>
							</select>
						</div>
					</div> 
				<!-- Fahrzeug Auswahl ENDE -->
		
				<!-- Kilometerstand Feld -->
				<div class="form-group row">
					<label for="mileage" class="col-3 col-form-label text-white font-weight-bold">Kilometerstand</label> 
					<div class="col-auto">
						<div class="input-group">
							<input id="mileage" name="mileage" type="tel" autocomplete="off" onChange="km()" class="form-control" maxlength="6" required>
							<div class="input-group-append"><span class="input-group-text" id="basic-addon2">km</span></div>
						</div>
					</div>
				</div>
				<!-- Kilometerstand Feld ENDE -->
		
				<!-- Ort Feld -->
				<div class="form-group row">
					<label for "location" class="col-3 col-form-label text-white font-weight-bold">Ort</label>  
					<div class="col-auto">
						<div class="input-group">
							<input id="location" name="location" type="text" class="form-control" required>
						</div>
					</div>
				</div>
				<!-- Ort Feld ENDE -->
		
				<!-- Schaden Buttons -->
				<div class="btn-group btn-row pt-3">
						<button type="submit" id="button" class="btn btn-outline-success mr-3 rounded">Absenden</button>
						<button type="button" class="btn btn-secondary rounded" onClick="ModalDamageList()">Schadenliste anzeigen</button>
				</div>
				<!-- Schaden Buttons ENDE -->
				
			</form>
		</div>
	
	<!-- MODAL ListDamage -->

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
				<div class="modal-body" id="modalAddDamage" style="display: none">
					<form id="addDamage">
						<div class="form-row d-inline-flex">
							<div class="col-auto">
								<select id="vehicle" name="vehicle" class="custom-select">
									<option disabled selected style="display: none" value="0">Ort</option>
										<?php  
											require_once('../php/connect_db.php');
											mysqli_select_db($link, 'limowien') or die('Cannot select database. ' . mysqli_error());
											$sql = mysqli_query($link, "SELECT id, name FROM dmg_location WHERE id BETWEEN 1 AND 99");
											while ($row = mysqli_fetch_array($sql)) {
												echo "<option value='". $row['id']. "'>". $row['name'] ."</option>";
											}
										?>
									<option disabled>-- INNENRAUM </option>
										<?php  
											require_once('../php/connect_db.php');
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
											require_once('../php/connect_db.php');
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
											require_once('../assets/php/connect_db.php');
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
											require_once('../assets/php/connect_db.php');
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
					<button type="button" class="btn btn-success float-left" onClick="showAddDamage()">Schaden hinzufügen</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal">Schließen</button>
				</div>
			</div>
		</div>
	</div>

	<!-- MODAL ListDamage END -->	

<!-- 					-->
<!-- END BODY -->
<!-- 					-->
	
	<script>
		$('#button').click(function(){
			$('#protocolform').ajaxForm(function() { 
				Swal.fire({	position: 'center',	type: 'success', title: 'Protokoll abgesendet!', showConfirmButton: false, timer: 2000});
				$("#protocolform")[0].reset();
			}); 
		});			
	</script>
	<script>
	function showAddDamage() {
		$("#modalAddDamage").show()
	}
	</script>

  <!-- JavaScript -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" type="text/javascript"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
</body>
</html>	