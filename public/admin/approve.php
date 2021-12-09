<?php include'../../resources/config.php'?>

<?php
	global $connection;	
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$sql = "UPDATE ordered_products SET status = 1 WHERE ord_id = ".$id." ";
		$update_query = query($sql);
        confirm($update_query);

        		echo '<script>';
				echo 'alert("Approved");';
				echo 'self.location = "index.php?admin_indexcontent";';
				echo '</script>';
	}

	if(isset($_GET['dis'])) {  
		$id = $_GET['dis'];

		$sql = "UPDATE ordered_products SET status = 2 WHERE ord_id = ".$id." ";
		$update_query = query($sql);
        confirm($update_query);

        		echo '<script>';
				echo 'alert("Dispatched");';
				echo 'self.location = "index.php?admin_indexcontent";';
				echo '</script>';
		
	}

	if(isset($_GET['del'])) { 
		$id = $_GET['del'];

		$sql = "UPDATE ordered_products SET status = 3 WHERE ord_id = ".$id." ";
		$update_query = query($sql);
        confirm($update_query);

        		echo '<script>';
				echo 'alert("Delivered");';
				echo 'self.location = "index.php?admin_indexcontent";';
				echo '</script>';
	}
?>