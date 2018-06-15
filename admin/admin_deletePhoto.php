<?php
	
	require_once("phpscripts/init.php");
	confirm_logged_in();

	//ini_set('display_errors',1);
	//error_reporting(E_ALL);

	$tbl = "tbl_photos";
	$photos = getAll($tbl);

?>

<?php
$strPageTitle = 'Delete Photos';
include_once("layout/header_innerPages.php");
?>

    <!--START BODY CONTENT HERE-->
    
    
    <h1 class="hide">Delete Photos</h1>
    
    <section id="addEditUserWrapper">
		<h1 class="hide">Delete Existing Photos</h1>

		<div class="row">

			<?php
			include("layout/sideNav.php");
			?>

			<div class="small-12 medium-7 columns">

			<p>NOTE: Ensure there are always 6 images for proper display on the front end of the website.</p>

	    <div class="row" data-equalizer>

		    	<?php
					while($row=mysqli_fetch_array($photos)){
						echo "<div class=\"small-6 medium-6 large-4 columns end\">";
						echo "<img src=\"../images/uploads/{$row['photos_img']}\" alt=\"{$row['photos_desc']}\">";
						echo "<div class=\"DellandImgCon\" data-equalizer-watch>";
						echo "{$row['photos_desc']}"; 
						echo "</div>";
						
						echo "<div class=\"delConBut\">";
						echo "<a href=\"phpscripts/caller.php?caller_id=deletePhotos&id={$row['photos_id']}\"><br>Delete Image</a>";
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