<?php
	require_once("phpscripts/init.php");
	confirm_logged_in();
	
	//ini_set('display_errors',1);
	//error_reporting(E_ALL);
	
	$id = $_SESSION['users_id'];
	//echo $id;
	$popForm = getUser($id);
	//echo $popForm;
	
	if(isset($_POST['submit'])) {
		//echo "submit clicked";
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
		
	$result = editUser($id, $email, $password);
	$message = $result;
	}
?>

<?php
$strPageTitle = 'Edit User';
include_once("layout/header_innerPages.php");
?>

    <!--START BODY CONTENT HERE-->
    
    
    <h1 class="hide">Edit User</h1>
    
    <section id="addEditUserWrapper">
		<h1 class="hide">Create New Admin User</h1>
		
		<div class="row">

			<?php
			include("layout/sideNav.php");
			?>

			<div class="small-12 medium-7 columns">

				<p>Hello <?php echo $_SESSION['users_name']; ?>. You can edit your details below:</p>

				<?php if(!empty($message)){echo $message;} ?>
				<form action="admin_edituser.php" method="post">
					
					<label>Email Address:</label>
					<input class="inputAddEdit" name="email" type="text" value="<?php echo $popForm['user_email']; ?>">
					
					<label>Password:</label>
					<input class="inputAddEdit hideChar" name="password" type="password" value="<?php echo $popForm['user_pass']; ?>">
					
					<div class="small-12 columns">
						<p>NOTE: Once you click 'Edit User' the effects are immediate.</p>
					</div>
					
					<div class="small-12 columns">
						<input type="submit" name="submit" value="Edit User" id="addEditSubmit">
					</div>
					
				</form>
				
			</div>
		</div>
	</section>


	<!--CLOSE BODY CONTENT HERE-->
 
    
<?php
	include("layout/footer.php");
?>