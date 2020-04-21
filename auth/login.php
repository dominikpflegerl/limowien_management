<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../index.php");
    exit;
};
 
// Define variables and initialize with empty values
$username = $password = NULL;
$username_err = $password_err = NULL;
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
	
  
  <script>
    function showLoading() {
      Swal.fire({
        timer: 000,
        onBeforeOpen: () => {
          Swal.showLoading()
        },
      })
    }
    function showError(errTyp) {
      Swal.fire({
        icon: 'error',
        timer: 3000,
        html: errTyp,
        showConfirmButton: true,
        confirmButtonColor: '#b69862'
      })
    }
    function validateForm() {
      var username = document.forms["login"]["username"].value;
      var password = document.forms["login"]["password"].value;

      if (username == "" && password == "") {
        showError("Bitte die Login-Daten eingeben!");
        return false;
      } else if (username == "") {
        showError("Bitte den Benutzernamen eingeben!");
        return false;
      } else if (password == "") {
        showError("Bitte das Passwort eingeben!");
        return false;
      } else {
        showLoading();
        return true;  
      }
    }
  </script>  
  
</head>
  
<body>
	<div class="wrapper fadeInDown">
		<div id="formContent">
			<!-- Icon -->
			<div class="fadeIn first py-4">
				<img src="../assets/images/logo.png" id="icon" alt="Logo" />
			</div>

			<!-- Login Form -->
			<form name ="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
				<!-- Username -->
				<input type="text" name="username" class="fadeIn second" autocomplete="off" placeholder="Benutzername" value="<?php echo $username; ?>">
				<!-- Password -->
				<input type="password" name="password" class="fadeIn third" placeholder="Passwort" value="" style="input {background-color: red}"> <br>
				<!-- Submit -->
				<input type="submit" onClick="return validateForm()" class="button fadeIn fifth button-primary" value="LOGIN">
			</form>
		</div>
	</div>
</body>
</html>

<?php
function validateForm($fieldname) {
  if(empty(trim($fieldname))){
    return "empty";
  } else {
    return "valid";
  }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){ 
  require_once "../assets/php/connect_db.php";

  // Validate credentials
  if(validateForm($_POST["username"]) == 'valid' && validateForm($_POST["password"] == 'valid')){    
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    // Prepare a select statement
    $sql = "SELECT user_id, username, password, firstname, lastname, role_id FROM users WHERE username = ?";
        
    if($stmt = mysqli_prepare($link, $sql)){
        
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "s", $param_username); // s for string
          
      // Set parameters
      $param_username = $username;
            
      // Attempt to execute the prepared statement
      if(mysqli_stmt_execute($stmt)){
        
        // Store result
        mysqli_stmt_store_result($stmt);
          
        // Check if username exists, if yes then verify password
        if(mysqli_stmt_num_rows($stmt) == 1){  
            
          // Bind result variables
          mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $firstname, $lastname, $role);
            
          if(mysqli_stmt_fetch($stmt)){
              if(password_verify($password, $hashed_password)){
                // Password is correct, so start a new session
                session_start();
                            
                // Store data in session variables
                $_SESSION["loggedin"] = true;
                $_SESSION["user_id"] = $id;
                $_SESSION["username"] = $username;                            
                $_SESSION["firstname"] = $firstname;                            
                $_SESSION["lastname"] = $lastname;
								$_SESSION["role"] = $role;
                            
                // Redirect user to welcome page
                header("location: ../index.php");
              } else {
                // Display an error message if password is not valid
                echo "<script>showError('Passwort ungültig!');</script>";
              }
            }
          } else {
            // Display an error message if username doesn't exist
            echo "<script>showError('Benutzer ungültig!');</script>";
          }
        } else {
          echo "<script>showError('Es ist etwas schiefgelaufen. <br> Bitte versuche es später erneut.');</script>";
          unset($_POST);

        }
				// Close statement
        mysqli_stmt_close($stmt);
      } else {
        echo "<script>showError('SQL Fehler!');</script>";
        echo mysqli_error($link);
		  }
    } else {
    echo "<script>showError('Bitte Benutzername und Passwort eingeben!');</script>";
  };
    // Close connection
    mysqli_close($link);
}
?> 