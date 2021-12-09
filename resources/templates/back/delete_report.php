<?php require_once("../../config.php");


if(isset($_GET['id'])) {

	$query =query("DELETE FROM reports WHERE report_id= " .escape_string($_GET['id'])."");
	confirm($query);

	redirect("../../../public/admin/index.php?reports");
	set_message("Report Deleted");

} else {

	redirect("../../../public/admin/index.php?reports");


}

?>