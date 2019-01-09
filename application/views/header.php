<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	 <link rel="stylesheet" href="https://bootswatch.com/4/slate/bootstrap.css" >

	
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">System Zarządzania Pracownikami</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <?php if($this->session->userdata('UserID')): ?>
         <li class="nav-item dropdown navbar-collapse">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Konto</a>
    <div class="dropdown-menu" role="menu">
 
     <a class="dropdown-item" href="#"> <?php echo anchor("dashboard/changePassword", '  Zmień hasło'); ?></a>
     
      <a class="dropdown-item" href="#"> <?php echo anchor("login/logout", '  Wyloguj'); ?></a>
  
    </div>
  </li>
  <?php else: ?>


  <?php endif; ?>
    </ul>

  </div>
</nav>