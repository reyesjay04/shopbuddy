<?php
	$id = $_GET["id"];
	$query = query("SELECT * FROM under_categories WHERE cat_id = '$id'");
	echo '$("#under_category").append( $(\'<option>\',{value:0,text:\'SELECT UNDER CATEGORY\'}));';
    confirm($query);
    while($row = mysqli_fetch_array($query)) {
    	$row_id = $row["uc_id"];
    	$name 	= $row["uc_name"];
    	echo '$("#under_category").append( $(\'<option>\',{value:'.$row_id.',text:\''.strtoupper($name).'"\'}));'."\n";
    }
?>