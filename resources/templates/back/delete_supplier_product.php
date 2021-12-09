<?php require_once("../../config.php");


if(isset($_GET['id'])) {

	if(isset($_GET['supplier_id'])) {

	$supplier_id = $_GET['supplier_id'];

		$query =query("DELETE FROM products WHERE product_id= " .escape_string($_GET['id'])."  AND supplier_id = " .escape_string($_GET['supplier_id']). " ");
	confirm($query);

	redirect("../../../public/admin/supplierindex.php?supplier_product&supplier_id=$supplier_id");
	set_message("Product Deleted");

	}

} else {

	redirect("../../../public/admin/supplierindex.php?supplier_product&supplier_id=$supplier_id");

}

?>