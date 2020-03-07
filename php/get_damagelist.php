<?php
	require_once( 'connect_db.php' );
  $vehicleID = $_GET['vehicle'];
	mysqli_select_db($link, 'limowien') or die('Cannot select database. ' . mysqli_error());


	$sql = "SELECT damage.id AS ID,  dmg_location.name AS LOC, dmg_side.name AS SIDE, dmg_category.name AS CAT, dmg_attr.name AS ATTR, dmg_picture.path AS PIC, damage.vehicle_id AS VEHICLE
					FROM damage 
					LEFT JOIN dmg_location ON damage.location_id 	= dmg_location.id
					LEFT JOIN dmg_side		ON damage.side_id 		= dmg_side.id
					LEFT JOIN dmg_category ON damage.category_id 	= dmg_category.id
					LEFT JOIN dmg_attr		ON damage.attr_id 		= dmg_attr.id 
					LEFT	JOIN dmg_picture	ON damage.id			= dmg_picture.damage_id
					WHERE vehicle_id = $vehicleID";
					


	if ( $result = mysqli_query( $link, $sql ) ) {
    if ( mysqli_num_rows( $result ) > 0 ) {
      echo '<table class="table table-dark table-hover table-responsive-sm w-100">';
      while ( $row = mysqli_fetch_array( $result ) ) {
        echo '<tr>';
          echo '<td>' . $row[ 'LOC' ] . '</td>';
          echo '<td>' . $row[ 'SIDE' ] . '</td>';
          echo '<td>' . $row[ 'CAT' ] . '</td>';
          echo '<td>' . $row[ 'ATTR' ] . '</td>';
          echo '<td style="width: 50px; min-width: 50px" align="center" id="vehicle' . $row[ 'VEHICLE' ] . '"><a href="' . $row[ 'PIC' ] . '"><i class="material-icons" style="color: white;">photo</i></a></td>';
        echo '</tr>';
      }

      echo "</table>";
      // Free result set
      mysqli_free_result( $result );
    } else {
      echo "Es wurden noch keine Schäden eingetragen.";
    }
  } else {
    echo "ERROR: could not execute SQL statement!<br>" . mysqli_error( $link );
  }
	?>