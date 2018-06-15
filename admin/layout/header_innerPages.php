<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefine the Hero | <?=$strPageTitle?> </title>
    <link rel="stylesheet" href="../css/foundation.css">
    <link rel="stylesheet" href="css/admin.css">
    <link href="https://fonts.googleapis.com/css?family=Exo:200,300,400,700" rel="stylesheet">
  </head>
  <body class="body-<?=strtolower(str_replace(' ', '-', $strPageTitle))?>">
	  
	  
	<!--START HEADER CONTENT HERE-->  
	  
	  
	<div id="CMSTopBar">
    <div class="row">
		<div class="small-8 medium-6 columns">
    
			<h1><?=$strPageTitle?></h1>
			<p>Currently logged in as: <?php echo $_SESSION['users_name']; ?></p>
	
		</div>
		
		<div class="small-4 medium-6 columns" id="CMSoptions">
			<ul class="dropdown menu CMSnav" data-dropdown-menu>
			  <li>
			    <a href="#">Control Hub</a>
			    <ul class="menu topBarDropdownMenu">
			      <li><a href="admin_index.php">Edit Content</a></li>
			      <li><a href="admin_edituser.php">Edit Account</a></li>
			      <?php
			      if($_SESSION['users_level']<="1") {
			      	echo '<li><a href="admin_createuser.php">Add User</a></li>';
			        echo '<li><a href="admin_deleteuser.php">Delete User</a></li>';
			  	  }
			      ?>
			      <li><a href="phpscripts/caller.php?caller_id=logout">Log Out</a></li>
			    </ul>
			  </li>
			</ul>
		</div>
	</div>
    </div>
    
    
    <!--CLOSE HEADER CONTENT HERE-->  
	  