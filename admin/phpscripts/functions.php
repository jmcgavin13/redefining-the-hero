<?php
	
	function redirect_to($location) {
		if($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}
	
	
	function sendMessage($fname, $lname, $email, $message, $direct) {
		$to = "email@organs.com";
		$subj = "Contact Form Submission - Redefine the Hero Organ Donor";
		$extra = "Reply to: {$email}";
		$body = "First Name: {$fname}\n\Last Name: {$lname}\n\nEmail: {$email}\n\nMessage: {$message}";
		//echo $body;
		//This will not work on MAMP...
		mail($to, $subj, $body, $extra);
		//.............................
		redirect_to($direct);
	}


	function sendUserMessage($name, $email, $password) {
		$to = $email;
		$subj = "Organ Donor Admin Login Info";
		$extra = "Do not reply to this email.\n\nPlease login to your account at: someURL.com/admin/admin_login.php\n\nPlease login and change your temporary password.";
		$body = "Name: {$name}\n\nTemporary password: {$password}\n\n";
		//echo $body;
		//This will not work on MAMP...
		mail($to, $subj, $body, $extra);
		//.............................
	}


	function addLandImage($mainImg,$desc) {
		include('connect.php');
		$mainImg = mysqli_real_escape_string($link,$mainImg);
		
		if($_FILES['landImg_img']['type'] == "image/jpg" || $_FILES['landImg_img']['type'] == "image/jpeg") {
			
			$targetpath = "../images/uploads/{$mainImg}";
			
			if(move_uploaded_file($_FILES['landImg_img']['tmp_name'],$targetpath)) {
				
				$orig = "../images/uploads/".$mainImg;
				
				$qstring = "INSERT INTO tbl_landImg VALUES(NULL,'{$mainImg}','{$desc}')";
				//echo $qstring;
				$result = mysqli_query($link,$qstring);
				
				redirect_to("admin_success.php");	
			}
		}
		
		mysqli_close($link);
	}


	function deleteLandImage($id) {
		include('connect.php');

		$delstring = "DELETE FROM tbl_landImg WHERE landImg_id={$id}";
		$delquery = mysqli_query($link, $delstring);

		if($delquery){
			redirect_to("../admin_success.php");
		}else{
			$message = "Sorry, unable to delete this image.";
			echo $message;
		}
		mysqli_close($link);
	}


	function addPhoto($photo,$desc) {
		include('connect.php');
		$photo = mysqli_real_escape_string($link,$photo);
		
		if($_FILES['photos_img']['type'] == "image/jpg" || $_FILES['photos_img']['type'] == "image/jpeg") {
			
			$targetpath = "../images/uploads/{$photo}";
			
			if(move_uploaded_file($_FILES['photos_img']['tmp_name'],$targetpath)) {
				
				$orig = "../images/uploads/".$photo;
				
				$qstring = "INSERT INTO tbl_photos VALUES(NULL,'{$photo}','{$desc}')";
				//echo $qstring;
				$result = mysqli_query($link,$qstring);
				
				redirect_to("admin_success.php");	
			}
		}
		
		mysqli_close($link);
	}


	function deletePhotos($id) {
		include('connect.php');

		$delstring = "DELETE FROM tbl_photos WHERE photos_id={$id}";
		$delquery = mysqli_query($link, $delstring);

		if($delquery){
			redirect_to("../admin_success.php");
		}else{
			$message = "Sorry, unable to delete this image.";
			echo $message;
		}
		mysqli_close($link);
	}
	
?>