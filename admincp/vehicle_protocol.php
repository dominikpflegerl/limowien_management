<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if ( !isset( $_SESSION[ "loggedin" ] ) || $_SESSION[ "loggedin" ] !== true ) {header( "location: ../auth/login.php" );	exit;}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Limowien Management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.rawgit.com/pingcheng/bootstrap4-datetimepicker/master/build/css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<!-- Stylesheets END -->
</head>

<body class="mx-auto">
 	<div class="bg-white p-3">
		<!--Navbar -->
		<?php include_once('../components/navbar.php')	?>
  	<!--/.Navbar -->
		<div class="py-3 px-4 mt-3 bg-primary rounded">
			<h1>News</h1>
			<p>
				Hier stehen aktuelle News für die Limowien-Mitarbeiter, amiright?
				
				right?
				
				
				RIIIIIIIIGHHHHHHT? FUCK THIS CORONA VIRUS IN MY STUPID SEXY GAY BUTT
			</p>
		</div>
	</div>

  <!-- JavaScript -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" type="text/javascript"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
</body>

</html>
