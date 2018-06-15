<?php
	//ini_set('display_errors',1);
	//error_reporting(E_ALL);

	require_once("phpscripts/init.php");
	confirm_logged_in();
	
	$id = $_SESSION['users_id'];
	//echo $id;
	$popForm = getUser($id);
	//echo $popForm;
?>

<?php
$strPageTitle = 'Request Successful';
include_once("layout/header_innerPages.php");
?>

    <!--START BODY CONTENT HERE-->
    
    
    <h1 class="hide">Success Page</h1>
    
    <section id="addEditUserWrapper">
		<h1 class="hide">Successfully Added/Edited User</h1>
		
		<div class="row">
			<div class="small-12 columns" id="successCon">

				<h2>Your request has successfully been completed!</h2>
				<p>The requested changes will take effect immediately and have been stored on the system.</p>
				<p><a href="admin_index.php">Return back to main Admin Panel</a></p>
				
			</div>
		</div>
	</section>


	<!--CLOSE BODY CONTENT HERE-->
 
    
<?php
	include("layout/footer.php");
?>