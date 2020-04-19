<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if ( !isset( $_SESSION[ "loggedin" ] ) || $_SESSION[ "loggedin" ] !== true ) {
  header( "location: ../auth/login.php" );
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
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  
</head>
	
<body class="mx-auto">
 	<div class="p-3">
		<!--Navbar -->
		<?php include_once('../components/navbar.php')	?>
  	<!--/.Navbar -->
		
		<div class="py-3 px-4 mt-3 bg-primary rounded">
			<div class="">
				<?php
				require_once( '../assets/php/connect_db.php' );
				$sql = "SELECT damage.id AS ID,  dmg_location.name AS LOC, dmg_side.name AS SIDE, dmg_category.name AS CAT, dmg_attr.name AS ATTR, dmg_picture.path AS PIC, damage.vehicle_id AS VEHICLE
								FROM damage 
								LEFT JOIN dmg_location ON damage.location_id 	= dmg_location.id
								LEFT JOIN dmg_side		ON damage.side_id 		= dmg_side.id
								LEFT JOIN dmg_category ON damage.category_id 	= dmg_category.id
								LEFT JOIN dmg_attr		ON damage.attr_id 		= dmg_attr.id 
								LEFT	JOIN dmg_picture	ON damage.id			= dmg_picture.damage_id
								WHERE vehicle_id = 8";
				if ( $result = mysqli_query( $link, $sql ) ) {
					if ( mysqli_num_rows( $result ) > 0 ) {
						echo '<table class="table table-dark bg-primary w-100" align="center">';
						echo '<tr>';
							echo '<th scope="col">ID</th>';
							echo '<th scope="col">LOCATION</th>';
							echo '<th scope="col">SIDE</th>';
							echo '<th scope="col">CAT</th>';
							echo '<th scope="col">ATTR</th>';
							echo '<th scope="col">PIC</th>';
						echo '</tr>';
						while ( $row = mysqli_fetch_array( $result ) ) {
							echo '<tr>';
								echo '<td>' . $row[ 'ID' ] . '</td>';
								echo '<td>' . $row[ 'LOC' ] . '</td>';
								echo '<td>' . $row[ 'SIDE' ] . '</td>';
								echo '<td>' . $row[ 'CAT' ] . '</td>';
								echo '<td>' . $row[ 'ATTR' ] . '</td>';
								echo '<td id="vehicle' . $row[ 'VEHICLE' ] . '"><a href="' . $row[ 'PIC' ] . '"><i class="material-icons" style="color: white;">photo</i></a></td>';
							echo '</tr>';
						}

						echo "</table>";
						// Free result set
						mysqli_free_result( $result );
					} else {
						echo "No records matching your query were found.";
					}
				} else {
					echo "ERROR: Could not able to execute $sql. " . mysqli_error( $link );
				}
				?>
			</div>
		</div>
	</div>

  <!-- JavaScript -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" type="text/javascript"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
</body>	
</html>