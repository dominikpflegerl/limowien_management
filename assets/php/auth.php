<?php
// BASIC FUNCTIONS
function writeConsole($text) { echo "<script>console.log('$text');</script><br>"; }
function showError($text) { echo "<script>showError('$text');</script>"; }
function showSuccess($text) { echo "<script>showSuccess('$text');</script>"; }
function showLoading($time) { echo "<script>showLoading('$time');</script>"; }

function secure($input) {
  $input = trim($input);
  $input = stripslashes($input);
  $input = htmlspecialchars($input);
  return $input;
}

//resetAdmin();
function resetAdmin() {
  require "connect_db.php";
  $hashed_password = password_hash("limowien", PASSWORD_DEFAULT);
  writeConsole($hashed_password);
  $sql = "UPDATE users SET password = '".$hashed_password."' WHERE user_id = 1";

  if($stmt = mysqli_prepare($link, $sql)) {
    if(mysqli_stmt_execute($stmt)) {
      showSuccess('Passwort: "limowien" gesetzt!');
    } else echo "<script>showError('Fehler!');</script>"; echo mysqli_error($link);
    mysqli_stmt_close($stmt);
  } else showError('SQL Fehler!'); echo mysqli_error($link);
  mysqli_close($link);
}


function logout() {
  showLoading(5000);
  
  session_start();
    $_SESSION = array();
  session_destroy();

  sleep(1);
  header("location: ../index.php");
  exit;  
} if (isset($_GET['logout'])) {logout();}

function login() {
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $password = NULL;
    // Validate credentials
    if(!empty($_POST["username"]) && 
       !empty($_POST["password"])){    
      $username = secure($_POST['username']);
      $password = secure($_POST['password']);
      $sql = "SELECT user_id, username, password, firstname, lastname, role_id FROM users WHERE username = ?";
      require_once "connect_db.php";
      if($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_username); // s for string
        // Set parameters
        $param_username = $username;
        if(mysqli_stmt_execute($stmt)){
          mysqli_stmt_store_result($stmt);
          // Check if username exists, if yes then verify password
          if(mysqli_stmt_num_rows($stmt) == 1){  
            mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $firstname, $lastname, $role);
            if(mysqli_stmt_fetch($stmt)){
                if(password_verify($password, $hashed_password)){
                  session_start();
                  // Store data in session variables
                  $_SESSION["loggedin"] = true;
                  $_SESSION["user_id"] = $id;
                  $_SESSION["username"] = $username;                            
                  $_SESSION["firstname"] = $firstname;                            
                  $_SESSION["lastname"] = $lastname;
                  $_SESSION["role"] = $role;
                  // Redirect user to welcome page
                  sleep(1);
                  header("location: ../index.php");
                } else echo showError('Passwort ungültig!');
              }
            } else echo showError('Benutzer ungültig!');
          } else {
            showError('Es ist etwas schiefgelaufen. <br> Bitte versuche es später erneut.');
            unset($_POST["username"]);
            unset($_POST["password"]);
          }
          mysqli_stmt_close($stmt);
        } else showError('SQL Fehler: '); echo mysqli_error($link);
        mysqli_close($link);
      } else echo showError('Bitte Benutzername und Passwort eingeben!');
  }  
} // END OF FUNCTION

function check_password() {
  require_once "connect_db.php";
  $sql = "SELECT password FROM users WHERE user_id = ?";
  $password = secure($_POST['old_password']);
  
  if($stmt = mysqli_prepare($link, $sql)) {
    // bind the ? to a variable in the SQL statement
    mysqli_stmt_bind_param($stmt, "i", $param_user_id);
    // set the variable
    $param_user_id = $_SESSION["user_id"];
    
    // execute the filled SQL Query
    if(mysqli_stmt_execute($stmt)) {
      mysqli_stmt_store_result($stmt);
      mysqli_stmt_bind_result($stmt, $hashed_password);
      if(mysqli_stmt_fetch($stmt)) {
        if(password_verify($password, $hashed_password)) {
          writeConsole('check_password(): Password ist richtig!');
          return true;
        } else writeConsole('check_password(): Passwort ist falsch!');
      }
    } else writeConsole('check_password(): exec SQL Query failed!');
    mysqli_stmt_close($stmt);
  } else writeConsole('check_password(): SQL Connection failed!');
  mysqli_close($link);
} // END OF FUNCTION

function update_password() {
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(!empty($_POST['old_password']) &&
       !empty($_POST['new_password']) &&
       !empty($_POST['confirm_new_password'])) { 
      $old_password_secured         = secure($_POST['old_password']);
      $new_password_secured         = secure($_POST['new_password']);
      $confirm_new_password_secured = secure($_POST['confirm_new_password']);

      if($old_password_secured !== $new_password_secured) {
        if($new_password_secured == $confirm_new_password_secured) { 
          if(check_password()) {
            require "connect_db.php";
            $sql = "UPDATE users SET password = ? WHERE user_id = ?";
              
            if($stmt = mysqli_prepare($link, $sql)) {
              // bind variabls to the prepared statement as parameters
              mysqli_stmt_bind_param($stmt, "si", $param_password, $param_user_id);  // s = string, i = integer

              // now set the parameters
              $param_password = password_hash($new_password_secured, PASSWORD_DEFAULT);
              $param_user_id  = $_SESSION["user_id"];

              // execute the SQL Query
              if(mysqli_stmt_execute($stmt)) {
                showSuccess('Passwort geändert!<br>Bitte melden Sie sich erneut an!');
                sleep(3);
                session_destroy();
                header("location: ../index.php");
              } else echo "<script>showError('Fehler!');</script>"; echo mysqli_error($link);
              mysqli_stmt_close($stmt);
            } else showError('SQL Fehler!'); echo mysqli_error($link);
            mysqli_close($link);
          } else showError('Das Passwort ist falsch!');
        } else showError('Die neuen Passwörter stimmen nicht überrein!');
      } else showError('Das neue Passwort darf nicht dem alten Passwort gleichen!');
    } else showError('Bitte alle Felder ausfüllen!');
  }
} // END OF FUNCTION

?>