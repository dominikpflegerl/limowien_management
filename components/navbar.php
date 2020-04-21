<nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
  
  <!-- Menu Button for mobile -->
  <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333" aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
	  <span class="navbar-toggler-icon my-1"></span><img src="/assets/images/icon.png" style="width:32px" class="ml-3">
  </button>
  <!-- End Menu Button -->
  
  <div class="collapse navbar-collapse mb-2 mt-1" id="navbarSupportedContent-333">
		<!-- LEFT SIDE -->
    <ul class="navbar-nav mr-aut">
      <li class="nav-item">
				<a class="nav-link border-bottom font-weight-bold" href="/index.php">Home</a>
      </li>
			<li class="nav-item">
        <a class="nav-link border-bottom" href="/usercp/schedule.php">Dienstplan</a>
      </li>
			<li class="nav-item dropdown border-bottom">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PKW</a>
        <div class="dropdown-menu dropdown-default bg-primary border-left" aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item bg-primary" href="/usercp/vehicle_protocol.php">Protokolle</a>
          <a class="dropdown-item bg-primary" href="/usercp/vehicle_damage.php">Schaden</a>
        </div>
      </li>
      <?php
      if($_SESSION["role"] == 1) {
        echo '<li class="nav-item dropdown border-bottom navbar-admin">';
        echo '<a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administrator</a>';
        echo '<div class="dropdown-menu dropdown-default bg-primary border-left" aria-labelledby="navbarDropdownMenuLink-333">';
        echo '<a class="dropdown-item bg-primary" href="/admincp/user.php">Benutzer</a>';
        echo '<a class="dropdown-item bg-primary" href="/admincp/schedule.php">Dienstplan</a>';
				echo '<a class="dropdown-item bg-primary" href="/admincp/vehicle.php">Fahrzeuge</a>';
        echo '<a class="dropdown-item bg-primary" href="/admincp/vehicle_protocol.php">Protokolle</a>';
        echo '<a class="dropdown-item bg-primary" href="/admincp/vehicle_damage.php">Schaden</a>';
        echo '</div>';
        echo '</li>';
      }
      ?>  
    </ul>
		
		<!-- RIGHT SIDE -->
    <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item dropdown border-bottom">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Willkommen, <b><?php echo htmlspecialchars($_SESSION["firstname"]); echo " "; echo htmlspecialchars($_SESSION["lastname"]) ?></b>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-default bg-primary border-left" aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item bg-primary" href="/auth/reset_password.php">Passwort ändern</a>
          <a class="dropdown-item bg-primary text-muted font-weight-bold" href="/auth/logout.php">Abmelden</a>
        </div>
      </li>
    </ul>
  </div>
</nav>