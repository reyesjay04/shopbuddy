<?php require_once("../../config.php");


if(isset($_GET['id'])) {

	$sql = "SELECT order_id FROM temporder WHERE product_id = " .escape_string($_GET['id'])."";
    $results = query($sql);

    if(row_count($results) == 1) {

    	set_message("Cannot Delete This Product");
		redirect("../../../public/admin/index.php?products");

    } else {

    	$query =query("DELETE FROM products WHERE product_id= " .escape_string($_GET['id'])."");
		confirm($query);    
    
		$query =query("DELETE FROM temporder WHERE product_id= " .escape_string($_GET['id'])."");
		confirm($query);

    	redirect("../../../public/admin/index.php?products");
		set_message("Product Deleted");	
        
 
    }

} else {

	redirect("../../../public/admin/index.php?products");

}

?>