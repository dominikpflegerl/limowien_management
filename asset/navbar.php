<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333" aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
	  <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Protokolle</a>
        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="../prot_drop.php">PKW | Abstell</a>
          <a class="dropdown-item" href="#">PKW | Übernahme</a>
          <a class="dropdown-item" href="#">PKW | Übergabe</a>
        </div>
      </li>
			<li class="nav-item">
        <a class="nav-link" href="../index.php">Dienstplan</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Liste</a>
        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="../list_vehicle.php">Fahrzeuge</a>
          <a class="dropdown-item" href="../list_user.php">Benutzer</a>
          <a class="dropdown-item" href="../list_damage.php">Schaden</a>
          <a class="dropdown-item" href="#">Abstellprotokolle</a>
          <a class="dropdown-item" href="#">Übernahmeprotokolle</a>
        </div>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Willkommen, <b><?php echo htmlspecialchars($_SESSION["firstname"]); echo " "; echo htmlspecialchars($_SESSION["lastname"]) ?></b>
        </a>
      

        <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="../php/reset_password.php">Passwort ändern</a>
          <a class="dropdown-item alert-link alert-danger" href="/php/logout.php">Abmelden</a>
        </div>
      </li>
    </ul>
  </div>
</nav>