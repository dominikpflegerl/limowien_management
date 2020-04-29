<?php
  // Initialize the session
  session_start();
  // Check if the user is logged in, if not then redirect him to login page
  if (!isset($_SESSION["loggedin"] ) || $_SESSION["loggedin"] !== true) {
    header("location: auth/login.php"); exit;
  };
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Limowien Management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<!-- Stylesheets END -->
  
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <link rel="stylesheet" href="/assets/css/sweetalert2_dark.css">
  
  <!-- own script -->
  <script src="/assets/js/auth.js"></script>  
</head>

<body class="mx-auto bg-transparent">
 	<div class="p-3">
		<!--Navbar -->
		<?php include_once('components\navbar.php')	?>
  	<!--/.Navbar -->
    
    <!-- News PHP -->
    <?php include('assets/php/sql_news.php'); getNews();?>
    
		<div class="py-3 px-4 mt-3 bg-primary rounded">
      <h1>News hinzufügen:</h1>
			<form>
        <div class="form-group">
          <input type="text" id="title" name="title" class="form-control bg-transparent text-white rounded px-2 py-3" value="Meeting, am Montag um 17:00 Uhr!">
        </div>
        <div class="form-group">
          <textarea type="text" id="content" name="content" class="form-control bg-transparent text-white rounded px-2" rows="7">Bitte alle am Montag um 17:00 Uhr erscheinen!</textarea>
        </div>
        <button type="submit" id="button" class="btn btn-outline-secondary mr-3 rounded">Absenden</button>
      </form>
		</div>
	</div>

  <!-- JavaScript -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" type="text/javascript"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
</body>
</html>