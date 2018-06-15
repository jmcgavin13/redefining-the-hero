<?php
	
	require_once("phpscripts/init.php");
	confirm_logged_in();

	//ini_set('display_errors',1);
	//error_reporting(E_ALL);

	$tbl = "tbl_user";
	$users = getUsers($tbl);

?>

<?php
$strPageTitle = 'Delete Users';
include_once("layout/header_innerPages.php");
?>

    <!--START BODY CONTENT HERE-->
    
    
    <h1 class="hide">Delete Users</h1>
    
    <section id="addEditUserWrapper">
		<h1 class="hide">Delete Existing Users</h1>

		<div class="row">

			<?php
			include("layout/sideNav.php");
			?>

			<div class="small-12 medium-7 columns">

			<p>NOTE: The master admin account can not be deleted and does not show up.</p>

	    <div class="row" data-equalizer>

		    	<?php
					while($row=mysqli_fetch_array($users)){
						echo "<div class=\"small-12 medium-12 large-6 columns end\">";
						echo "<div class=\"DellandImgCon\" data-equalizer-watch>";
						echo "{$row['user_name']}<br>";
						echo "{$row['user_email']}";
						echo "</div>";

						echo "<div class=\"delConBut\">";
						echo "<a href=\"phpscripts/caller.php?caller_id=deleteUsers&id={$row['user_id']}\"><br>Delete User</a>";
						echo "</div>";
						echo "</div>";
					}
				?>

				</div>		
			</div>
		</section>


	<!--CLOSE BODY CONTENT HERE-->
 
    
<?php
	include("layout/footer.php");
?>