<?php
require_once "../assets/php/auth.php";
session_start();

// if already logged in -> redirect to index 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../index.php"); exit;
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Limowien Management</title>
  
	<!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/assets/css/bootstrap_login.css">  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <!-- Bootstrap, jQuery and Poppers.js Script -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <link rel="stylesheet" href="/assets/css/sweetalert2_dark.css">
  
  <!-- own script -->
  <script src="/assets/js/auth.js"></script>  
</head>

<body>
	<div class="wrapper fadeInDown">
		<div id="formContent">
			<!-- Icon -->
			<div class="fadeIn first py-4">
				<img src="/assets/images/logo.png" id="icon" alt="Logo" />
			</div>
      
			<!-- Login Form -->
			<form name ="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
				<!-- Username -->
				<input type="text" name="username" class="fadeIn second" autocomplete="off" placeholder="Benutzername" value="">
				<!-- Password -->
				<input type="password" name="password" class="fadeIn third" placeholder="Passwort" value="" style="input {background-color: red}"> <br>
				<!-- Submit -->
				<input type="submit" onClick="return validateForm()" class="button fadeIn fifth button-primary" value="LOGIN">
			</form>
		</div>
	</div>
</body>
</html>

<?php login(); ?>