<?php

	function getAll($tbl) {
		include('connect.php');
		$queryAll = "SELECT * FROM {$tbl}";
		$runAll = mysqli_query($link, $queryAll);
		
		if($runAll){
			return $runAll;	
		}else{
			$error =  "There was an error accessing this information.  Please contact your admin.";
			return $error;
		}
	}

	function getUsers($tbl) {
		include('connect.php');
		$queryAll = "SELECT * FROM tbl_user WHERE user_name!='admin'";
		$runAll = mysqli_query($link, $queryAll);
		
		if($runAll){
			return $runAll;	
		}else{
			$error =  "There was an error accessing this information.  Please contact your admin.";
			return $error;
		}
	}

	function getSix($tbl) {
		include('connect.php');
		$queryAll = "SELECT * FROM {$tbl} ORDER BY photos_id DESC LIMIT 6";
		$runAll = mysqli_query($link, $queryAll);
		
		if($runAll){
			return $runAll;	
		}else{
			$error =  "There was an error accessing this information.  Please contact your admin.";
			return $error;
		}
	}

	function getSingle($tbl, $col, $id) {
		require_once('connect.php');
		$querySingle = "SELECT * FROM {$tbl} WHERE {$col}={$id}";
		$runSingle = mysqli_query($link, $querySingle);
		
		if($runSingle){
			return $runSingle;	
		}else{
			$error =  "There was an error accessing this information.  Please contact your admin.";
			return $error;
		}
	}

?>