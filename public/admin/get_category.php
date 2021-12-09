<?php include '../../resources/config.php'; ?>
<?php
	global $connection;
	$id = $_GET["id"];
	$query = mysqli_query($connection,"SELECT * FROM under_categories WHERE cat_id = '$id'");
	echo '$("#under_category").append( $(\'<option>\',{value:0,text:\'Select Under Category\'}));';
    if ($query) {
    	while($row = mysqli_fetch_array($query)) {
	    	$row_id = $row["uc_id"];
	    	$name = $row["uc_name"];
	    	echo '$("#under_category").append( $(\'<option>\',{value:'.$row_id.',text:\''.strtoupper($name).'\'}));'."\n";
	    }
    }
?>