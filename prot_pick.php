<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if ( !isset( $_SESSION[ "loggedin" ] ) || $_SESSION[ "loggedin" ] !== true ) {
  header( "location: index.php" );
  exit;
}

date_default_timezone_set('Europe/Vienna');
$date = date('d.m.Y H:i', time());


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
  

	
	<style>
		.row {
			display: block;
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
					url: '/php/get_damagelist.php?vehicle='+selectedID,
					success: function(response){					
						document.getElementById("modalListDamageBody").innerHTML = response;
					}
			})
			}
			else {
				Swal.fire({
					type: 'error',
					title: 'Fahrzeug auswählen!',
					timer: 1000
				})
			}



			console.log(selectedID);
			console.log(selectedVehicle);
		}
	</script>
</head>

<body>

  <!--Navbar -->
	<?php include_once('asset\navbar.php');?>
  <!--/.Navbar -->
	
  <form id="protocolform" class="pt-2 px-5" action="php/insert_protocol_drop.php" method="post">
  	
			<!-- DateTime Feld -->
  		<div class="form-group row" id="DateTime">
    		<label for="DateTime" class="col-3 col-form-label">Zeitpunkt</label> 
    		<div class="col-auto">
      			<div class="input-group">
        			<div class="input-group-prepend"></div> 
        			<input id="DateTime" name="DateTime" type="text" class="form-control" disabled placeholder="<?php echo $date?>">
      			</div>
    		</div>
  		</div> 
  		<!-- DateTime Feld END -->
    
		
			<!-- Fahrer Feld -->
			<div class="form-group row" id="Fahrer">
				<label for="fahrer" class="col-3 col-form-label">Fahrer</label> 
    		<div class="col-auto">
					<div class="input-group">
						<div class="input-group-prepend"></div> 
						<input id="fahrer" name="text" type="text" class="form-control" disabled placeholder="<?php echo htmlspecialchars($_SESSION["firstname"]); echo " "; echo htmlspecialchars($_SESSION["lastname"]) ?>">
					</div>
				</div>
			</div> 
			<!-- Fahrer Feld  ENDE -->
		
		
			<!-- Fahrzeug Auswahl -->      
			<div class="form-group row">
				<label for="vehicle" class="col-3 col-form-label">Fahrzeug</label> 
    		<div class="col-auto">
					<select id="vehicle" name="vehicle" class="custom-select">
							<option disabled selected style="display: none" value="0">Fahrzeug auswählen...</option>
							<?php  
								require_once('php/connect_db.php');
								mysqli_select_db($link, 'limowien') or die('Cannot select database. ' . mysqli_error());
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
				<label for="mileage" class="col-3 col-form-label">Kilometerstand</label> 
    		<div class="col-auto">
					<div class="input-group">
						<input id="mileage" name="mileage" type="tel" autocomplete="off" onChange="km()" class="form-control" maxlength="6" required>
						<div class="input-group-append"><span class="input-group-text px-5" id="basic-addon2">km</span></div>
					</div>
				</div>
			</div>
			<!-- Kilometerstand Feld ENDE -->
	
		
		
			<!-- Ort Feld -->
			<div class="form-group row">
				<label for "location" class="col-3 col-form-label">Ort</label>  
    		<div class="col-auto">
					<div class="input-group">
						<input id="location" name="location" type="text" class="form-control" required>
					</div>
				</div>
			</div>
			<!-- Ort Feld ENDE -->
		

			<!-- Schaden Buttons -->
			<div class="btn-group w-100 mt-5" role="group">
					<button type="button" class="btn btn-dark w-50" 	onClick="ModalDamageList()">Schadenliste anzeigen</button>	
					<button type="button" class="btn btn-danger w-50"	onClick="ModalDamageAdd()">Schaden hinzufügen</button>
			</div>
			<!-- Schaden Buttons ENDE -->
		
		
			<!-- SUBMIT  --> 
			<div class="form-group row">
    		<div class="col-auto">
					<button id="button" type="submit" class="btn btn-success w-100 mt-3 py-3">Absenden</button>
				</div>
			</div>
			<!-- SUBMIT ENDE -->

	</form>
	
	
	<!-- MODAL ListDamage -->
	
	<div class="modal fade" id="modalListDamage" tabindex="-1" role="dialog" aria-labelledby="modalListDamageTitle" aria-hidden="true">
		<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalListDamageTitle">asdf</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" id="modalListDamageBody">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Schließen</button>
				</div>
			</div>
		</div>
	</div>
	

	
	<!-- MODAL ListDamage END -->	
	
	<!-- MODAL AddDamage -->
	
	<div class="modal fade" id="modalAddDamage" tabindex="-1" role="dialog" aria-labelledby="modalAddDamageTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalAddDamageTitle">Schaden hinzufügen</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					...
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	
	<!-- MODAL AddDamage END -->
	
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


	<!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->

	
</body>
</html>
