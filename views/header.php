<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>HockeyTips</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


</head>

<body>



<!-- HEADER -->
<div class="container">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Tenth navbar example">
    <div class="container-fluid">
        <ul class="logo">
	    <a href="index.php" class="text-light text-decoration-none"><h5>HockeyTips</h5></a>
	</ul>
    </div>

    <div class="container-fluid" bis_skin_checked="1">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08" bis_skin_checked="1">
        <ul class="navbar-nav">
          <li class="nav-item">
	  <a class="nav-link <?php if ($page == "about") echo "active"?>" aria-current="page" href="index.php?page=about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if ($page == "contact") echo "active"?>" href="index.php?page=contact">Contact</a>
          </li>
          <?php
          if(appSession::isSet('id')) {
	  ?> 
	    <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-bs-toggle="dropdown" aria-expanded="false">Menu</a>
              <ul class="dropdown-menu" aria-labelledby="dropdown10">
 <?php
                            if( in_array(appSession::get('group_name'), array('superadmin','admin'))){ ?>
                                <li class="container">
                                    <a class="dropdown-item" href="index.php?page=users-admin">Users administration</a>
                                    <div class="dropdown-divider"></div>
                                </li>
                            <?php }
                            if( in_array(appSession::get('group_name'), array('superadmin','admin','analyzer'))){ ?>
                                <li class="container">
                                    <a class="dropdown-item" href="index.php?page=game-admin">Game administration</a>
                                    <a class="dropdown-item" href="index.php?page=addgame">Add new game</a>
                                    <div class="dropdown-divider"></div>
                                </li>
                            <?php }
                            if( in_array(appSession::get('group_name'), array('superadmin','admin','normal','analyzer'))){ ?>
                            <li class="container">
                                <a class="dropdown-item" href="index.php?page=review-admin">Review administration</a>
                            </li>
                            <?php } ?>
              </ul>
            </li>
  	  <?php
	  }
          ?>
        </ul>
      </div>
    </div>
    <div class="container-fluid">
	 <?php
          if(!appSession::isSet('id')) {
	  ?> 

        <ul class="logo">
                        <li class="container">
                <button onclick="location.href='index.php?page=login'" type="button" class="btn  m-1 w-110px btn-primary">Log in</button>
                <button onclick="location.href='index.php?page=register'" type="button" class="btn  m-1 w-110px btn-primary">Register</button>

	
                        </li>
	</ul>
	<?php
	  } else {
?>

        <ul class="logo">

                        <li class="container">
                            <form action="index.php?page=logout" method="post" class="d-flex text-center">
                            <p class="text-light">user: <?= $_SESSION['username'] ?></p>&nbsp;
                                <button type="submit" name="oSubmit" class="btn btn-danger m-1 w-110px btn-block flex-fill btn-primary">Log out</button>
                            </form>
                        </li>
	</ul>


<?php
	  }
?>
    </div>

  </nav>


</div>
<!-- CONTENT -->
