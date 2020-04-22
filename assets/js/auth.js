// JavaScript 
function showLoading(time) {
  Swal.fire({
    width: 200,
    timer: time,
    onBeforeOpen: () => {
      Swal.showLoading()
    },
  })
}

function showError(message) {
  Swal.fire({
    icon: 'error',
    timer: 3000,
    html: message,
    showConfirmButton: true,
    confirmButtonColor: '#b69862'
  })
}

function showSuccess(message) {
  Swal.fire({
    icon: 'success',
    timer: 3000,
    html: message,
    showConfirmButton: false,
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
    showLoading(2000);
    return true;  
  }
}

function validateInput(form, input, errmsg) {
  var validation = document.forms[form][input].value;
  if (validation = "") {
    showError(errmsg);
    return false
  } else return true;
}