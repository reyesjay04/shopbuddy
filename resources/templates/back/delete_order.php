<?php require_once("../../config.php");


if(isset($_GET['id'])) {

	$query =query("DELETE FROM orders WHERE order_id= " .escape_string($_GET['id'])."");
	confirm($query);

	redirect("../../../public/admin/index.php?orders");
	set_message("Order Deleted");

} else {

	redirect("../../../public/admin/index.php?orders");


}

?>