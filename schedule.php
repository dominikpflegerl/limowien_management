<?php
// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if ( !isset( $_SESSION[ "loggedin" ] ) || $_SESSION[ "loggedin" ] !== true ) {
  header( "location: auth/login.php" );
  exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Limowien Management</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="mx-auto">
 	<div class="p-3">
		<!--Navbar -->
		<?php include_once('components\navbar.php')	?>
  	<!--/.Navbar -->
		
		<div class="py-3 px-4 mt-3 bg-primary rounded">
			<div class="mt-3">
				<table class="table bg-primary table-responsive overflow-auto">
					<thead>
						<tr>
							<th scope="col" class="text-center">Mo, 12. Aug</th>
							<th scope="col" class="text-center">Di, 12. Aug</th>
							<th scope="col" class="text-center">Mi, 12. Aug</th>
							<th scope="col" class="text-center">Do, 12. Aug</th>
							<th scope="col" class="text-center">Fr, 12. Aug</th>
							<th scope="col" class="text-center">Sa, 12. Aug</th>
							<th scope="col" class="text-center">So, 12. Aug</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="btn-group-toggle text-center" data-toggle="buttons"><label class="btn btn-light"><input type="checkbox">05:00 - 11:00</label>
							</td>
							<td class="btn-group-toggle text-center" data-toggle="buttons"><label class="btn btn-light"><input type="checkbox">05:00 - 11:00</label>
							</td>
							<td class="btn-group-toggle text-center" data-toggle="buttons"><label class="btn btn-light"><input type="checkbox">05:00 - 11:00</label>
							</td>
							<td class="btn-group-toggle text-center" data-toggle="buttons"><label class="btn btn-light"><input type="checkbox">05:00 - 11:00</label>
							</td>
							<td class="btn-group-toggle text-center" data-toggle="buttons"><label class="btn btn-light"><input type="checkbox">05:00 - 11:00</label>
							</td>
							<td class="btn-group-toggle text-center" data-toggle="buttons"><label class="btn btn-light"><input type="checkbox">05:00 - 11:00</label>
							</td>
							<td class="btn-group-toggle text-center" data-toggle="buttons"><label class="btn btn-light"><input type="checkbox">05:00 - 11:00</label>
							</td>
						</tr>
						<tr>
							<td class="btn-group-toggle text-center" data-toggle="buttons"><label class="btn btn-light"><input type="checkbox">11:00 - 17:00</label>
							</td>
							<td class="btn-group-toggle text-center" data-toggle="buttons"><label class="btn btn-light"><input type="checkbox">11:00 - 17:00</label>
							</td>
							<td class="btn-group-toggle text-center" data-toggle="buttons"><label class="btn btn-light"><input type="checkbox">11:00 - 17:00</label>
							</td>
							<td class="btn-group-toggle text-center" data-toggle="buttons"><label class="btn btn-light"><input type="checkbox">11:00 - 17:00</label>
							</td>
							<td class="btn-group-toggle text-center" data-toggle="buttons"><label class="btn btn-light"><input type="checkbox">11:00 - 17:00</label>
							</td>
							<td class="btn-group-toggle text-center" data-toggle="buttons"><label class="btn btn-light"><input type="checkbox">11:00 - 17:00</label>
							</td>
							<td class="btn-group-toggle text-center" data-toggle="buttons"><label class="btn btn-light"><input type="checkbox">11:00 - 17:00</label>
							</td>
						</tr>
						<tr>
							<td class="btn-group-toggle text-center" data-toggle="buttons"><label class="btn btn-light"><input type="checkbox">17:00 - 23:00</label>
							</td>
							<td class="btn-group-toggle text-center" data-toggle="buttons"><label class="btn btn-light"><input type="checkbox">17:00 - 23:00</label>
							</td>
							<td class="btn-group-toggle text-center" data-toggle="buttons"><label class="btn btn-light"><input type="checkbox">17:00 - 23:00</label>
							</td>
							<td class="btn-group-toggle text-center" data-toggle="buttons"><label class="btn btn-light"><input type="checkbox">17:00 - 23:00</label>
							</td>
							<td class="btn-group-toggle text-center" data-toggle="buttons"><label class="btn btn-light"><input type="checkbox">17:00 - 23:00</label>
							</td>
							<td class="btn-group-toggle text-center" data-toggle="buttons"><label class="btn btn-light"><input type="checkbox">17:00 - 23:00</label>
							</td>
							<td class="btn-group-toggle text-center" data-toggle="buttons"><label class="btn btn-light"><input type="checkbox">17:00 - 23:00</label>
							</td>
						</tr>
						<tr>
							<td class="btn-group-toggle text-center" data-toggle="buttons"><label class="btn btn-light"><input type="checkbox">23:00 - 05:00</label>
							</td>
							<td class="btn-group-toggle text-center" data-toggle="buttons"><label class="btn btn-light"><input type="checkbox">23:00 - 05:00</label>
							</td>
							<td class="btn-group-toggle text-center" data-toggle="buttons"><label class="btn btn-light"><input type="checkbox">23:00 - 05:00</label>
							</td>
							<td class="btn-group-toggle text-center" data-toggle="buttons"><label class="btn btn-light"><input type="checkbox">23:00 - 05:00</label>
							</td>
							<td class="btn-group-toggle text-center" data-toggle="buttons"><label class="btn btn-light"><input type="checkbox">23:00 - 05:00</label>
							</td>
							<td class="btn-group-toggle text-center" data-toggle="buttons"><label class="btn btn-light"><input type="checkbox">23:00 - 05:00</label>
							</td>
							<td class="btn-group-toggle text-center" data-toggle="buttons"><label class="btn btn-light"><input type="checkbox">23:00 - 05:00</label>
							</td>
						</tr>
					</tbody>
				</table>
				<input class="btn btn-light rounded mb-2" data-toggle="button" aria-pressed="false" autocomplete="off" type="submit" value="Speichern">
			</div>
		</div>			
	</div>	
		


  <!-- JavaScript -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" type="text/javascript"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
	
	<!-- JavaScript -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" type="text/javascript"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" type="text/javascript"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
  <script src="https://cdn.rawgit.com/pingcheng/bootstrap4-datetimepicker/master/build/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
  <!-- Bootstrap 4 Weekpicker JavaScript -->
  <script src="../js/bootstrap-weekpicker.js" type="text/javascript"></script>

  <script type="text/javascript">
    var weekpicker = $( "#weekpicker1" ).weekpicker();
  </script>
  <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push( [ '_setAccount', 'UA-36251023-1' ] );
    _gaq.push( [ '_setDomainName', 'jqueryscript.net' ] );
    _gaq.push( [ '_trackPageview' ] );

    ( function () {
      var ga = document.createElement( 'script' );
      ga.type = 'text/javascript';
      ga.async = true;
      ga.src = ( 'https:' == document.location.protocol ? 'https://ssl' : 'http://www' ) + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName( 'script' )[ 0 ];
      s.parentNode.insertBefore( ga, s );
    } )();
  </script>
</body>
</html>