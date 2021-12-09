<?php require_once("../../config.php");


if(isset($_GET['id'])) {

	$query =query("DELETE FROM products WHERE product_id= " .escape_string($_GET['id'])."");
	confirm($query);

	redirect("../../../public/admin/index.php?product_confirm");
	set_message("Product Deleted");

} else {

	redirect("../../../public/admin/index.php?product_confirm");


}

?>