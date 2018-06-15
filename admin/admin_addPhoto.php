<?php
	
	require_once('phpscripts/init.php');
	confirm_logged_in();

	//ini_set('display_errors',1);
    //error_reporting(E_ALL);
	
	if(isset($_POST['submit'])) {
		$photo = $_FILES['photos_img']['name'];
		//echo $fimg;
		$desc = $_POST['photos_desc'];
		
		$uploadPhoto = addPhoto($photo,$desc);
		
		$message = $uploadPhoto;
	}

?>

<?php
$strPageTitle = 'Add Photo';
include_once("layout/header_innerPages.php");
?>

    <!--START BODY CONTENT HERE-->
    
    
    <h1 class="hide">Add Photo</h1>
    
    <section id="addEditUserWrapper">
		<h1 class="hide">Add New Photo</h1>

		<div class="row">

			<?php
			include("layout/sideNav.php");
			?>

			<div class="small-12 medium-7 columns">

			<p>Recomended Image Dimensions: 328px x 328px</p>

		    <?php if(!empty($message)){echo $message;} ?>
			<form action="admin_addPhoto.php" method="post" enctype="multipart/form-data">
				
				<label>Photo:</label>
				<input type="file" name="photos_img" value="" size="32">
				
				<label>Image Description:</label>
				<input class="inputAddEdit" type="text" name="photos_desc" value="" size="32">

				<input type="submit" name="submit" value="Add" id="addEditSubmit">
			</form>

			</div>		
		</div>
		</section>


	<!--CLOSE BODY CONTENT HERE-->
 
    
<?php
	include("layout/footer.php");
?>