<?php require_once("../../config.php");


if(isset($_GET['id'])) {

	$sql = "SELECT * FROM products WHERE product_category_id = ".escape_string($_GET['id'])." ";
	$results = query($sql);

	if (row_count($results) > 1) {

	set_message ("<div class='alert alert-success alert-dismissible' role='alert'>
	<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	 <span aria-hidden='true'>&times;</span>
	</button>
	<strong>Category</strong> Cannot Be Deleted
	</div>");
	redirect("../../../public/admin/index.php?categories");

	} else {


	$query =query("DELETE FROM categories WHERE cat_id= " .escape_string($_GET['id'])."");
	confirm($query);

	set_message ("<div class='alert alert-success alert-dismissible' role='alert'>
	<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	 <span aria-hidden='true'>&times;</span>
	</button>
	<strong>Category</strong> Deleted
	</div>");
	redirect("../../../public/admin/index.php?categories");

	}


	

} else {

	redirect("../../../public/admin/index.php?categories");


}

?>