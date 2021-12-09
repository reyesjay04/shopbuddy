<?php

$connect = new PDO("mysql:host=127.0.0.1;dbname=test", "root", "");

if(isset($_POST['supplier_id'])) {
	$supplier_id = $_POST['supplier_id'];;
}

// $sql = "SELECT * FROM variations WHERE variation_name = :last_name AND product_id = :first_name ";
// $check = $connect->prepare($sql);
// $statement ->execute($data);

// if(!$statement) {
	$query = "
	INSERT INTO variations
	(supplier_id , product_id, variation_name, active , type) 
	VALUES ('$supplier_id' ,:first_name, :last_name , '1' , 'C')
	";

	for($count = 0; $count<count($_POST['hidden_first_name']); $count++)
	{
		$data = array(
			':first_name'	=>	$_POST['hidden_first_name'][$count],
			':last_name'	=>	$_POST['hidden_last_name'][$count]
		);
		$statement = $connect->prepare($query);
		$statement->execute($data);

	// }
}



?>