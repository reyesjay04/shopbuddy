<?php require_once("../../config.php");

if(isset($_GET['id'])) {


	if(isset($_GET['commission'])) { 

	$commission = $_GET['commission'];

		if(isset($_GET['output'])) {

			$output = $_GET['output'];
			$today  = date("Y-m-d H:i:s"); 

	        $query  = "UPDATE products SET ";
	        $query .= "commission  			= '{$commission}'  , ";
	        $query .= "total_price          = '{$output}'      , ";
	        $query .= "active          		= '1'  			   , ";
	        $query .= "date_created         = '{$today}'  		 ";
	        $query .= "WHERE product_id=" . escape_string($_GET['id']);

	        $send_update_query = query($query);
	        confirm($send_update_query);


			redirect("../../../public/admin/index.php?product_confirm");
			set_message("Product Added");

		}
	
	}

} else {

	redirect("../../../public/admin/index.php?product_confirm");

}

?>