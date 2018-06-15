<?php
	
	require_once('phpscripts/init.php');
	confirm_logged_in();

	//ini_set('display_errors',1);
    //error_reporting(E_ALL);
	
	if(isset($_POST['submit'])) {
		$mainImg = $_FILES['landImg_img']['name'];
		//echo $fimg;
		$desc = $_POST['landImg_desc'];
		
		$uploadLandImg = addLandImage($mainImg,$desc);
		
		$message = $uploadLandImg;
	}

?>

<?php
$strPageTitle = 'Add Landing Image';
include_once("layout/header_innerPages.php");
?>

    <!--START BODY CONTENT HERE-->
    
    
    <h1 class="hide">Add Landing Image</h1>
    
    <section id="addEditUserWrapper">
		<h1 class="hide">Add New Landing Image</h1>

	    <div class="row">
			
			<?php
			include("layout/sideNav.php");
			?>

			<div class="small-12 medium-7 columns">

			<p>Recomended Image Dimensions: 1000px x 1250px</p>

		    <?php if(!empty($message)){echo $message;} ?>
			<form action="admin_addLandImg.php" method="post" enctype="multipart/form-data">
				
				<label>Landing Image:</label>
				<input type="file" name="landImg_img" value="" size="32">
				
				<label>Image Description:</label>
				<input class="inputAddEdit" type="text" name="landImg_desc" value="" size="32">

				<input type="submit" name="submit" value="Add" id="addEditSubmit">
			</form>

			</div>		
		</div>
		</section>


	<!--CLOSE BODY CONTENT HERE-->
 
    
<?php
	include("layout/footer.php");
?>