<?php

//insert.php
$connect = new PDO("mysql:host=127.0.0.1;dbname=test", "root", "");

	$query = "
	INSERT INTO under_categories
	(cat_id , uc_name,  active) 
	VALUES ( :first_name, :last_name , '1')
	";

	for($count = 0; $count<count($_POST['hidden_first_name']); $count++)
	{
		$data = array(
			':first_name'	=>	$_POST['hidden_first_name'][$count],
			':last_name'	=>	$_POST['hidden_last_name'][$count]
		);
		$statement = $connect->prepare($query);
		$statement->execute($data);

	}
?>