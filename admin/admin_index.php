<?php	
	require_once("phpscripts/init.php");
	confirm_logged_in();

	//ini_set('display_errors',1);
	//error_reporting(E_ALL);


	if(isset($_GET['tbl'])) {
		$tbl = $_GET['tbl'];
		$col = $_GET['col'];
		$id = $_GET['id'];
	}

	//$getDetails = getAll($tbl);
?>

<?php
$strPageTitle = 'Admin Content Management';
include_once("layout/header.php");
?>
    
    <div id="CMSTopBar">
    <div class="row">
		<div class="small-8 medium-6 columns">
    
			<h1><?php $dayTime = date('H');
				if($dayTime<12) {
					echo "Good Morning ".$_SESSION['users_name'];
				}else if(($dayTime>=12)&&($dayTime<19)) {
					echo "Good Afternoon ".$_SESSION['users_name'];
				}else if($dayTime>=19) {
					echo "Good Evening ".$_SESSION['users_name'];
				}
			?></h1>
			<p>Your last login was on: <?php echo $_SESSION['users_lastlogin']; ?></p>
	
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

    <!--START BODY CONTENT HERE-->

    <div class="row CMSCon">
    	<?php
			include("layout/sideNav.php");
		?>

    	<div class="small-12 medium-7 columns CMSright">
    		<?php single_edit($tbl,$col,$id); ?>
    	</div>
    </div>

	<!--CLOSE BODY CONTENT HERE-->
 
    
<?php
	include("layout/footer.php");
?>