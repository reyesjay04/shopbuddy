<?php

if(isset($_POST['save'])) {
	$
	$sql = "INSERT INTO size (size_name) VALUES (?,?,?)";
	$pdo->prepare($sql)->execute([$name, $surname, $sex]);
}

?>