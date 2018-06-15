<?php
	date_default_timezone_set('America/New_York');
	
	function logIn($username, $password, $ip) {
		require_once("connect.php");
		$username = mysqli_real_escape_string($link, $username);
		$password = mysqli_real_escape_string($link, $password);
		$salt = 'hilfue2fnlfmkon4iu4f6r7fherwuvnijvhcibchieqiubiebuvijevijqevjjewaa';
		$EncPassword = hash('sha256', $salt.$password);
		$loginString = "SELECT * FROM tbl_user WHERE user_name='{$username}' AND user_pass='{$EncPassword}'";
		//echo $loginString;
		$user_set = mysqli_query($link, $loginString);
		
		if(mysqli_num_rows($user_set)) {
			$found_user = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
			$id = $found_user['user_id'];
			if($found_user['user_loginAttempt']<=2) {
			$_SESSION['users_id'] = $id;
			$_SESSION['users_name'] = $found_user['user_name'];
			$_SESSION['users_lastlogin'] = $found_user['user_lastlogin'];
			$_SESSION['users_level'] = $found_user['user_level'];
			if(mysqli_query($link, $loginString)){
				$time = date("F j, Y, g:i a");
				//if correct login and reset loginAttempt to 0
				$updateString = "UPDATE `tbl_user` SET user_logins = user_logins + 1, `user_ip` = '{$ip}', `user_lastlogin` = '{$time}', user_loginAttempt = 0 WHERE `tbl_user`.`user_id` = {$id}";
				$updateQuery = mysqli_query($link, $updateString);
		}if($found_user['user_logins']<1){
			redirect_to("admin_edituser.php");
		}if($found_user['user_logins']>=1){
			redirect_to("admin_index.php");
		}
			}else{
				$message = ("This account has been locked due to too many attempts to login.<br>Please contact admin for support.");
				return $message;
			}
		}else{
			$message = "Username and/or password incorrect.<br>You will be locked out after 3 failed attempts.";
			//add 1 to the loginAtempt because of incorrect username or password
			$updateFailCounter = "UPDATE tbl_user SET user_loginAttempt = user_loginAttempt + 1 WHERE user_name='{$username}' OR user_pass='{$password}'";
			$updateQuery = mysqli_query($link, $updateFailCounter);
		
			//get the current number of login attempts for the username or password
			$loginAttempts = "SELECT user_loginAttempt FROM tbl_user WHERE user_name='{$username}' OR user_pass='{$password}'";
			$result = mysqli_query($link, $loginAttempts);
			$currentAttempts = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$failCounter = $currentAttempts['user_loginAttempt'];
			
			return $message;
		}
		mysqli_close($link);
	}




?>