<?php
	
	 function single_edit($tbl,$col,$id) {

	 	$result = getSingle($tbl, $col, $id);
	 	$getResult = mysqli_fetch_array($result);

	 	echo "<form action=\"phpscripts/edit.php\" method=\"post\">";
	 	echo "<input hidden name=\"tbl\" value=\"{$tbl}\">";
	 	echo "<input hidden name=\"col\" value=\"{$col}\">";
	 	echo "<input hidden name=\"id\" value=\"{$id}\">";
	 	for($i=0; $i<mysqli_num_fields($result); $i++) {
	 		//echo $i;

	 		$dataType = mysqli_fetch_field_direct($result,$i);
	 		$fieldName = $dataType->name;
	 		//echo $fieldName."<br>";
	 		$fieldType = $dataType->type;
	 		//echo $fieldType."<br>";
	 		if($fieldName != $col) {
	 			echo "<label class=\"editAllLabel\">{$fieldName}</label>";
	 			if($fieldType != 252) {
	 				if($fieldName != "stats_icon") {
	 					echo "<input class=\"editAllInput\" type=\"text\" name=\"{$fieldName}\" value=\"{$getResult[$i]}\">";
	 				}else{
	 					echo "<input hidden class=\"editAllInput\" type=\"text\" name=\"{$fieldName}\" value=\"{$getResult[$i]}\">";
	 				}
	 			}else{
	 				echo "<textarea class=\"editAlltextarea\" name=\"$fieldName\">{$getResult[$i]}</textarea><br><br>";
	 			}
	 		}
	 	}
	 	echo "<input class=\"editAllSubmit\" type=\"submit\" value=\"Save Content\">";

	 	echo "</form>";
	 }

?>