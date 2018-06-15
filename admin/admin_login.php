<?php
	//ini_set('display_errors',1);
	//error_reporting(E_ALL);

	require_once("phpscripts/init.php");
	
	$ip = $_SERVER["REMOTE_ADDR"];
	//echo $ip;
	if(isset($_POST['submit'])) {
		//echo "Thanks for clicking...";
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		if($username != "" && $password != "") {
			$result = logIn($username, $password, $ip);
			$message = $result;
		}else{
			$message = "Please fill in the required fields.";
		}
	}
?>

<?php
$strPageTitle = 'Admin Login';
include_once("layout/header.php");
?>
    
    <!--START BODY CONTENT HERE--> 
	
	<h1 class="hide">Content Management System</h1>

	<div id="loginBodyWrapper">
	<section id="CMSLoginCon">
	<div class="row" id="CMSLogin">
		<h2 class="hide">Content Management System Login</h2>
		<div class="small-10 small-offset-1 medium-6 medium-offset-3 columns end">
			
			<img src="../images/header_logo.svg" alt="logo" id="adminLoginLogo">
			
			<div id="CMSLoginBox">
				<h2>Admin Login</h2>
				<p id="adminLoginError"><?php if(!empty($message)){echo $message;} ?></p>
				<form action="admin_login.php" method="post">
					<input type="text" name="username" value="" placeholder="Username" class="adminLoginInput">
					<input type="password" name="password" value="" placeholder="Password" class="adminLoginInput">
					<input type="submit" name="submit" value="Go!" id="adminLoginSubmit">
				</form>
			</div>
			
		</div>
	</div>
	</section>
	</div>

    <!--CLOSE BODY CONTENT HERE-->
 
    
<?php
	include("layout/footer.php");
?>