<?php
	include 'phpscripts/connect.php';

	$link->set_charset("utf8");

	$myQuery = "SELECT * FROM tbl_landImg";
	$result = mysqli_query($link, $myQuery);

	$allImages = "[";

	while ($row = mysqli_fetch_assoc($result)) {
		$allImages .= json_encode($row).",";
	}

	$allImages .= "]";

	$allImages = substr_replace($allImages, "", -2,1);

	echo $allImages;
	//echo mysqli_num_rows($result);		
?>