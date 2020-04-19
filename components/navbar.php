<nav class="navbar navbar-expand-xl navbar-dark bg-primary rounded navbar-fixed-top">
  <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333" aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
	  <span class="navbar-toggler-icon my-1"></span><img src="/assets/images/icon.png" style="width:32px" class="ml-3">
  </button>
  <div class="collapse navbar-collapse mb-2 mt-1" id="navbarSupportedContent-333">
		<img src="/assets/images/icon.png" style="width:32px" class="mr-3 navbar-desktop">
		<!-- LEFT SIDE -->
    <ul class="navbar-nav mr-aut">
      <li class="nav-item">
				<a class="nav-link border-bottom font-weight-bold" href="/index.php">Home</a>
      </li>
			<li class="nav-item">
        <a class="nav-link border-bottom" href="/schedule.php">Dienstplan</a>
      </li>
			<li class="nav-item dropdown border-bottom">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PKW</a>
        <div class="dropdown-menu dropdown-default bg-primary border-left" aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item bg-primary" href="#">Protokolle</a>
          <a class="dropdown-item bg-primary" href="#">Schaden</a>
        </div>
      </li>
      <li class="nav-item dropdown border-bottom navbar-admin">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administrator</a>
        <div class="dropdown-menu dropdown-default bg-primary border-left" aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item bg-primary" href="/admincp/user.php">Benutzer</a>
					<a class="dropdown-item bg-primary" href="/admincp/vehicle.php">Fahrzeuge</a>
          <a class="dropdown-item bg-primary" href="/admincp/vehicle_protocol.php">Protokolle</a>
          <a class="dropdown-item bg-primary" href="/admincp/vehicle_damage.php">Schaden</a>
        </div>
      </li>
    </ul>
		
		<!-- RIGHT SIDE -->
    <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item dropdown border-bottom">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Willkommen, <b><?php echo htmlspecialchars($_SESSION["firstname"]); echo " "; echo htmlspecialchars($_SESSION["lastname"]) ?></b>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-default bg-primary border-left" aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item bg-primary" href="auth/reset_password.php">Passwort ändern</a>
          <a class="dropdown-item bg-primary text-muted font-weight-bold" href="auth/logout.php">Abmelden</a>
        </div>
      </li>
    </ul>
  </div>
</nav>