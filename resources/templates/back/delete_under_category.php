<?php require_once("../../config.php");


if(isset($_GET['id'])) {


	$query =query("DELETE FROM under_categories WHERE uc_id= " .escape_string($_GET['id'])."");
	confirm($query);

	set_message ("<div class='alert alert-success alert-dismissible' role='alert'>
	<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	 <span aria-hidden='true'>&times;</span>
	</button>
	<strong>Category</strong> Deleted
	</div>");
	redirect("../../../public/admin/index.php?categories_under");
	

} elseif(isset($_GET['ps_id'])) {

	$supplier_id =$_GET['supplier_id'];

	$query =query("DELETE FROM variations WHERE ps_id= " .escape_string($_GET['ps_id'])."");
	confirm($query);

	set_message ("<div class='alert alert-success alert-dismissible' role='alert'>
	<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	 <span aria-hidden='true'>&times;</span>
	</button>
	<strong>Size</strong> Deleted
	</div>");
	redirect("../../../public/admin/supplierindex.php?supplier_id=$supplier_id&add_size");
	


} elseif(isset($_GET['pc_id'])) {

	$supplier_id =$_GET['supplier_id'];

	$query =query("DELETE FROM variations WHERE ps_id= " .escape_string($_GET['pc_id'])."");
	confirm($query);

	set_message ("<div class='alert alert-success alert-dismissible' role='alert'>
	<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	 <span aria-hidden='true'>&times;</span>
	</button>
	<strong>Color</strong> Deleted
	</div>");
	redirect("../../../public/admin/supplierindex.php?supplier_id=$supplier_id&add_color");
}

?>