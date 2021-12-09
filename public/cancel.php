<?php include'../resources/config.php'?>

<?php
	global $connection;
	$id    = $_GET['canA'];
	$prid  = $_GET['prid'];
	$delid = $_GET['delid'];
if(isset($_GET['canA'])) {

	$sql = "SELECT * FROM ordered_products WHERE ord_id = ".$id." ";
	$result = query($sql);

	if(row_count($result) == 1) {
		$row = fetch_array($result);
		$quantity = $row['quantity'];

		$query = "UPDATE products SET product_quantity = product_quantity + $quantity WHERE product_id = ".$prid." ";
        $send_update_query = query($query);
        confirm($send_update_query);

	    $sql1 = "DELETE FROM ordered_products WHERE ord_id = ".$id." ";
		$update_query1 = query($sql1);
	    confirm($update_query1);

		$sql = "SELECT * FROM ordered_products WHERE delivery_id = ".$delid." ";
		$result = query($sql);

		if(row_count($result) == 1) { 
		reload_page();
		} else {
		$sql1 = "DELETE FROM delivery WHERE delivery_id = ".$delid." ";
		$update_query1 = query($sql1);
	    confirm($update_query1);
		reload_page();
		}
	} 
}
function reload_page() {
    echo '<script>';
	echo 'alert("Cancelled");';
	echo 'self.location = "records.php";';
	echo '</script>';
}
?>