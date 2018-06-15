<?php
	
	require_once("phpscripts/init.php");
	confirm_logged_in();

	//ini_set('display_errors',1);
	//error_reporting(E_ALL);

	$tbl = "tbl_landImg";
	$landImg = getAll($tbl);

?>

<?php
$strPageTitle = 'Delete Landing Image';
include_once("layout/header_innerPages.php");
?>

    <!--START BODY CONTENT HERE-->
    
    
    <h1 class="hide">Delete Landing Image</h1>
    
    <section id="addEditUserWrapper">
		<h1 class="hide">Delete Existing Landing Image</h1>

	    <div class="row" data-equalizer>

	    	<?php
			include("layout/sideNav.php");
			?>

			<div class="small-12 medium-7 columns">

		    	<?php
					while($row=mysqli_fetch_array($landImg)){
						echo "<div class=\"small-6 medium-6 large-4 columns end\">";
						echo "<img src=\"../images/uploads/{$row['landImg_img']}\" alt=\"{$row['landImg_desc']}\">";
						echo "<div class=\"DellandImgCon\" data-equalizer-watch>";
						echo "{$row['landImg_desc']}";
						echo "</div>";

						echo "<div class=\"delConBut\">";
						echo "<a href=\"phpscripts/caller.php?caller_id=deleteImage&id={$row['landImg_id']}\"><br>Delete Image</a>";
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