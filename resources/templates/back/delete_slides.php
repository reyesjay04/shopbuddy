<?php require_once("../../resources/config.php");


if(isset($_GET['delete_slides_id'])) {

	$query =query("DELETE FROM slides WHERE slide_id = " .escape_string($_GET['delete_slides_id'])."");
	confirm($query);

	set_message("Slide Deleted");
	redirect("index.php?slides");
		

} else {

	redirect("index.php?slides");


}

?>