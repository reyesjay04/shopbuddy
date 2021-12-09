<?php require_once("../../config.php");


if(isset($_GET['id'])) {

	$query =query("DELETE FROM size WHERE size_id= " .escape_string($_GET['id'])."");
	confirm($query);

	set_message ("<div class='alert alert-success alert-dismissible' role='alert'>
	<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	 <span aria-hidden='true'>&times;</span>
	</button>
	<strong>Size</strong> Deleted
	</div>");
	redirect("../../../public/admin/index.php?size");
	

} else {

	redirect("../../../public/admin/index.php?size");


}

if(isset($_GET['iid'])) {

	$query =query("DELETE FROM color WHERE color_id= " .escape_string($_GET['iid'])."");
	confirm($query);

	set_message ("<div class='alert alert-success alert-dismissible' role='alert'>
	<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	 <span aria-hidden='true'>&times;</span>
	</button>
	<strong>Color</strong> Deleted
	</div>");
	redirect("../../../public/admin/index.php?color");
	

} else {

	redirect("../../../public/admin/index.php?size");


}

?>