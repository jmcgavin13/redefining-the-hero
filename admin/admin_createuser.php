<?php
	require_once("phpscripts/init.php");
	confirm_logged_in();
	
	//ini_set('display_errors',1);
	//error_reporting(E_ALL);
	
	if(isset($_POST['submit'])) {
		//echo "submit clicked";
		$name = trim($_POST['name']);
		$email = trim($_POST['email']);
		$level = ($_POST['lvllist']);
		if(empty($level)) {
			//echo "Level not selected";
			$message = "Please select a user level.";
		}else{
			//echo "Level Selected";
			$result = createUser($name, $email, $level);
			$message = $result;
		}
	}
?>

<?php
$strPageTitle = 'Create New User';
include_once("layout/header_innerPages.php");
?>

    <!--START BODY CONTENT HERE-->
    
    
    <h1 class="hide">Create User</h1>
    
	<section id="addEditUserWrapper">
		<h1 class="hide">Create New Admin User</h1>
		
		<div class="row">

			<?php
			include("layout/sideNav.php");
			?>

			<div class="small-12 medium-7 columns">
				
				<p>NOTE: Only a Web Master has the ability to add new users.</p>

				<?php if(!empty($message)){echo $message;} ?>
				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
					<label>Username:</label>
					<input class="inputAddEdit" name="name" type="text" value="<?php if(!empty($name)){echo $name;} ?>">
					
					<label>Email Address:</label>
					<input class="inputAddEdit" name="email" type="text" value="<?php if(!empty($email)){echo $email;} ?>">
					
					<select name="lvllist">
						<option value="">Please Select User Level...</option>
						<option value="2">Web Admin</option>
						<option value="1">Web Master</option>
					</select>
					
					<div class="small-12 columns">
						<p>NOTE: A temporary password for the user will automatically be generated and emailed to them upon submission.</p>
					</div>
					
					<div class="small-12 columns">
						<input type="submit" name="submit" value="Create User" id="addEditSubmit">
					</div>
					
				</form>
				
			</div>
			
		</div>
	</section>


	<!--CLOSE BODY CONTENT HERE-->
 
    
<?php
	include("layout/footer.php");
?>