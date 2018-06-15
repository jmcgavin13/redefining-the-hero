<?php
	
	function editUser($id, $email, $password) {
		include('connect.php');
		
		$salt = 'hilfue2fnlfmkon4iu4f6r7fherwuvnijvhcibchieqiubiebuvijevijqevjjewaa';
		$EncPassword = hash('sha256', $salt.$password);
		$updatestring = "UPDATE tbl_user SET user_email='{$email}', user_pass='{$EncPassword}' WHERE user_id={$id}";
		$updatequery = mysqli_query($link, $updatestring);
		
		if($updatequery) {
			redirect_to("admin_success.php");
		}else{
			$message = "There was a problem changing your user account settings. Please contact your web admin.";
			return $message;
		}
		mysqli_close($link);
	}
	
	function getUser($id) {
		require_once('connect.php');
		$userstring = "SELECT * FROM tbl_user WHERE user_id={$id}";
		$userquery = mysqli_query($link, $userstring);
		
		if($userquery){
			$found_user = mysqli_fetch_array($userquery, MYSQLI_ASSOC);
			return $found_user;
		}else{
			$message = "There was a problem changing your account. Please contact the web admin for help.";
			return $message;
		}
		mysqli_close($link);
	}
	
	function createUser($name, $email, $level) {
		require_once("connect.php");
		$ip = 0;
		$password = bin2hex(openssl_random_pseudo_bytes(4));
		$salt = 'hilfue2fnlfmkon4iu4f6r7fherwuvnijvhcibchieqiubiebuvijevijqevjjewaa';
		$EncPassword = hash('sha256', $salt.$password);
		$userstring = "INSERT INTO tbl_user VALUES(NULL,'{$name}','{$EncPassword}','{$ip}','{$level}','{$email}','0','0','0')";
		//echo $userstring;
		$userquery = mysqli_query($link, $userstring);
		if($userquery) {
			sendUserMessage($name, $email, $password);
			redirect_to("admin_success.php");
		}else{
			$message = "There was a problem setting up this user";
			return $message;
		}
		mysqli_close($link);
	}

	function deleteUsers($id) {
		include('connect.php');
		
		$delstring = "DELETE FROM tbl_user WHERE user_id={$id}";
		$delquery = mysqli_query($link, $delstring);

		if($delquery){
			redirect_to("../admin_success.php");
		}else{
			$message = "Sorry, unable to delete this user.";
			echo $message;
		}
		mysqli_close($link);
	}

	//Master user = admin
	//Master pass = master@userP@$$

?>