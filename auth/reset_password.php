<?php
// Initialize the session
//session_start();
 
// Check if the user is logged in, if not then redirect to login page
//if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//    header("location: ../index.php");
//    exit;
//}
 
// Include config file
require_once "../assets/php/connect_db.php";

// Define variables and initialize with empty values
$old_password = $new_password = $confirm_new_password = NULL;
$old_password_err = $new_password_err = $confirm_new_password_err = NULL;
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
  
  if($old_password == "") {
    $old_password_err = "check this";
  } else {
    $old_password  = secure($_POST["old_password"]);
  }
        
//  // Check input errors before updating the database
//  if(empty($new_password_err) && empty($confirm_password_err)){
//        // Prepare an update statement
//        $sql = "UPDATE user SET password = ? WHERE id = ?";
//        
//        if($stmt = mysqli_prepare($link, $sql)){
//            // Bind variables to the prepared statement as parameters
//            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
//            
//            // Set parameters
//            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
//            $param_id = $_SESSION["id"];
//            
//            // Attempt to execute the prepared statement
//            if(mysqli_stmt_execute($stmt)){
//                // Password updated successfully. Destroy the session, and redirect to login page
//                session_destroy();
//                header("location: ../index.php");
//                exit();
//            } else{
//                echo "Oops! Something went wrong. Please try again later.";
//            }
//        }
//        
//        // Close statement
//        mysqli_stmt_close($stmt);
//    }
//    
//    // Close connection
//    mysqli_close($link);
}

function secure($input) {
  $input = trim($input);
  $input = stripslashes($input);
  $input = htmlspecialchars($input);
  
  return $input;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Limowien Management</title>

  <!-- Bootstrap -->
  <link href="/assets/css/bootstrap_login.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  
  <!-- Scripts -->
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
  
  <script>
    $previousPage = "javascript:history.go(-1)";
    if(isset($_SERVER['HTTP_REFERER'])) {
      $previousPage = $_SERVER['HTTP_REFERER'];
    }
  </script>
</head>
<body>  
	<div class="wrapper fadeInDown">
		<div id="formContent">
			<!-- Icon -->
			<div class="fadeIn first py-4">
				<img src="/assets/images/logo.png" alt="Logo" id="icon"/>
			</div>

			<!-- Login Form -->
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<!-- OLD PW -->
				<input type="password" required name="old_password" class="fadeIn second" autocomplete="off" placeholder="Altes Passwort"><br>				
        <!-- NEW PW -->
				<input type="password" required name="new_password" class="fadeIn third" autocomplete="off" placeholder="Neues Passwort"><br>				
        <!-- CONFIRM NEW PW -->
				<input type="password" required name="confirm_new_password" class="fadeIn fourth" autocomplete="off" placeholder="Neues Passwort bestätigen"><br>
				<!-- Submit -->
				<input type="submit" class="button fadeIn fifth button-primary" value="ABSENDEN">
			</form>
      
      <!-- ABORT -->
      <button type="button" onClick="javascript:history.go(-1)" class="button fadeIn fifth button-secondary mt-0" value="Abbrechen">
        Abbrechen
      </button>
		</div>
	</div>  
</body>
</html>
