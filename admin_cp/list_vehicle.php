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
  <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Scripts -->
  <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
	<script src="https://malsup.github.io/min/jquery.form.min.js"></script> 
	
</head>
	
<body>
  <!--Navbar -->
  <?php include_once('asset\navbar.php'); ?>
  <!--/.Navbar -->
  
  <div class="container">
		
	<h1>Limowien</h1>
		
  <?php
  require_once( 'php/connect_db.php' );
		
	//	
		// LIMOWIEN
	//
		
  $sql1 = "SELECT * FROM vehicle WHERE owner = 'Limowien' ORDER BY license";
  if ( $result1 = mysqli_query( $link, $sql1 ) ) {
    if ( mysqli_num_rows( $result1 ) > 0 ) {
      echo '<table align="center" class="table table-dark table-hover table-responsive-sm w-100">';
      echo '<tr>';
      echo '<th style="width: 150px; min-width: 150px">Kennzeichen</th>';
      echo '<th style="min-width: 222px" >Marke</th>';
      echo '<th style="min-width: 222px" >Model</th>';
      echo '<th style="width: 150px; min-width: 150px"></th>';
			echo '</tr>';
      while ( $row1 = mysqli_fetch_array( $result1 ) ) {
        echo '<tr>';
        echo '<td>' . $row1[ 'license' ] . '</td>';
        echo '<td>' . $row1[ 'brand' ] . '</td>';
        echo '<td>' . $row1[ 'model' ] . '</td>';
		  	echo '<td align="center"><button type="button" class="btn btn-outline-success btn-sm mx-1" disabled>Edit</button><button type="button" class="btn btn-danger btn-sm mx-1">Delete</button></td>';				
        echo '</tr>';
      } 
			?>
			
			<tfood>
						<form id="vehicleAddLimowien" method="post" action="php/insert_vehicle.php">
						<input type="hidden" name="owner" value="Limowien">
							<tr>
								<td>
									<div class="input-group input-group-sm">
		  							<div class="input-group-prepend"><div class="input-group-text">W-</div></div>
											<input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "4" name="license" class="form-control" required>
										<div class="input-group-append"><div class="input-group-text">MW</div></div>
									</div>
								</td>
								
								<td>
									<div>
										<input type="text" name="brand" class="form-control-sm w-100" placeholder="Marke" text-align="center" required>
									</div>
								</td>
								
								<td>
									<div>
										<input type="text" name="model" class="form-control-sm w-100" placeholder="Modell" text-align="center" required>
									</div>
								</td>
								
								<td>
									<div align="right">
										<button id="buttonSubmitLimowien" class="btn btn-success btn-sm w-100" type="submit">Add Vehicle</button>
									</div>
								</td>
							</tr>
						</form>
			</tfood>
	
      <?php
			echo "</table>";
      // Free result set
      mysqli_free_result( $result1 );
    } else {
      echo "No records matching your query were found.";
    }
  } else {
    echo "ERROR: Could not able to execute $sql1. " . mysqli_error( $link );
  }
		
	//	
		// TAXOIL
	//
		
	?>
	
	<h1>Taxoil</h1>	
		
	<?php
		
  $sql2 = "SELECT * FROM vehicle WHERE owner = 'taxoil' ORDER BY brand, model, license";
  if ( $result2 = mysqli_query( $link, $sql2 ) ) {
    if ( mysqli_num_rows( $result2 ) > 0 ) {
      echo '<table align="center" class="table table-dark table-hover table-responsive-sm w-100">';
      echo '<tr>';
      echo '<th scope="col-sm-3">Kennzeichen</th>';
      echo '<th scope="col-sm-3">Marke</th>';
      echo '<th scope="col-sm-3">Model</th>';
      echo '<th scope="col-sm-3"></th>';
			echo '</tr>';
      while ( $row2 = mysqli_fetch_array( $result2 ) ) {
        echo '<tr>';
        echo '<td>' . $row2[ 'license' ] . '</td>';
        echo '<td>' . $row2[ 'brand' ] . '</td>';
        echo '<td>' . $row2[ 'model' ] . '</td>';
		  	echo '<td align="right"><button type="button" class="btn btn-outline-success btn-sm mx-1" disabled>Edit</button><button type="button" class="btn btn-danger btn-sm mx-1">Delete</button></td>';				
        echo '</tr>';
      }
			
			?>
			<tfood>
						<form id="vehicleAddTaxoil" method="post" action="php/insert_vehicle.php">
						<input type="hidden" name="owner" value="Taxoil">
							<tr>
								<td>
									<div class="input-group input-group-sm">
		  							<div class="input-group-prepend"><div class="input-group-text">W-</div></div>
											<input type="text" name="license" class="form-control" style="width:100px" placeholder="Kennzeichen" >
										<div class="input-group-append"><div class="input-group-text">MW</div></div>
									</div>
								</td>
								
								<td>
									<div>
										<input type="text" name="brand" class="form-control-sm" placeholder="Marke" text-align="center">
									</div>
								</td>
								
								<td>
									<div>
										<input type="text" name="model" class="form-control-sm" placeholder="Modell" text-align="center">
									</div>
								</td>
								
								<td>
									<div align="right">
										<button id="buttonSubmitTaxoil" class="btn btn-success btn-sm" type="submit">Add Vehicle</button>
									</div>
								</td>
							</tr>
						</form>
			</tfood>
      <?php
      echo "</table>";
      // Free result set
      mysqli_free_result( $result2 );
    } else {
      echo "No records matching your query were found.";
    }
  } else {
    echo "ERROR: Could not able to execute $sql2. " . mysqli_error( $link );
  }
		

  ?>	
		
	<script>
		$('#buttonSubmitLimowien').click(function(){
			$('#vehicleAddLimowien').ajaxForm(function() { 
				Swal.fire({	position: 'center',	type: 'success', title: 'Fahrzeug (Limowien) gespeichert!', showConfirmButton: false, timer: 2000});
				$("#vehicleAddLimowien")[0].reset();
			}); 
		});
		
		$('#buttonSubmitTaxoil').click(function(){
			$('#vehicleAddTaxoil').ajaxForm(function() { 
				Swal.fire({	position: 'center',	type: 'success', title: 'Fahrzeug (Taxoil) gespeichert!', showConfirmButton: false, timer: 2000});
				$("#vehicleAddTaxoil")[0].reset();
			}); 
		});			
	</script>

  <!-- JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>