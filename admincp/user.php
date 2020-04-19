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
  

  
</head>
<body>
  <!--Navbar -->
  <?php 
	include_once('asset\navbar.php');

  ?>
  <!--/.Navbar -->
  
  <div class="container pt-4">
  <?php
  require_once( 'php/connect_db.php' );
  $sql = "SELECT * FROM user ORDER BY user_id";
  if ( $result = mysqli_query( $link, $sql ) ) {
    if ( mysqli_num_rows( $result ) > 0 ) {
      echo '<table class="table table-dark">';
      echo '<tr>';
        echo '<th scope="col">User ID</th>';
        echo '<th scope="col">Benutzername</th>';
        echo '<th scope="col">Vorname</th>';
        echo '<th scope="col">Nachname</th>';
        echo '<th scope="col">Registrierungsdatum</th>';
        echo '<th scope="col">Gruppe</th>';
        echo '<th scope="col"></th>';
      echo '</tr>';
      while ( $row = mysqli_fetch_array( $result ) ) {
        echo '<tr>';
          echo '<td>' . $row[ 'user_id' ] . '</td>';
          echo '<td>' . $row[ 'username' ] . '</td>';
          echo '<td>' . $row[ 'firstname' ] . '</td>';
          echo '<td>' . $row[ 'lastname' ] . '</td>';
          echo '<td>' . $row[ 'created_at' ] . '</td>';
          echo '<td>' . $row[ 'role_id' ] . '</td>';
		  		echo '<td><button type="button" class="btn btn-outline-success btn-sm mx-1">Edit</button><button type="button" class="btn btn-danger btn-sm mx-1">Delete</button></td>';
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



  <!-- JavaScript -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" type="text/javascript"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
</body>

</html>