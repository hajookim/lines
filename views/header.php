<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="http://jadekim-com.stackstaging.com/styles.css"
  </head>
  <body>
  	<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="?page=home">Lines</a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <?php 
        if ($_SESSION['id']) {
            echo '<li class="nav-item">
            <a class="nav-link" id="timelineLink" href="?page=timeline">Your timeline</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="yourLinesLink" href="?page=yourtweets">Your Lines</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="followersLink" href="?page=publicprofiles">Followers</a>
      </li>';
        }
      ?>
      
    </ul>
    <div class="form-inline my-2 my-lg-0"> 
    	<?php if ($_SESSION['id']) { ?> 
    		<a class="btn btn-outline-success my-2 my-sm-0" href="?function=logout">Logout</a>
    	<?php } else { ?>
    		<button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#myModal">Login/Signup</button>	
    	
    	<?php }?>
   	
      
    </div>
  </div>
</nav>