<?php
	require_once('init.php');

	if(isset($_GET['caller_id'])){
		$dir = $_GET['caller_id'];
		//echo $dir;
		if($dir == "logout"){
			logged_out();
		}else if($dir == "deleteUsers"){
			
			$id = $_GET['id'];
			deleteUsers($id);
		}else if($dir == "deleteImage"){
			
			$id = $_GET['id'];
			deleteLandImage($id);
		}else if($dir == "deletePhotos"){
			
			$id = $_GET['id'];
			deletePhotos($id);
		}
	}
?>