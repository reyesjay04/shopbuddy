<?php include '../resources/config.php' 
              
?>

<?php

if(isset($_POST['Submit'])) {

    $user_id           = $_SESSION['id'];
    $user              = escape_string($_POST['user']);
    $total_total_price = escape_string($_POST['total_total_price']);
    $full_name         = escape_string($_POST['full_name']);
    $contact_number    = escape_string($_POST['contact_number']);
    $email             = escape_string($_SESSION['email']);
    $address           = escape_string($_POST['address']);
    $brgy              = escape_string($_POST['brgy']);
    $municipality      = escape_string($_POST['municipality']);
    $province          = escape_string($_POST['province']);
    $landmark          = escape_string($_POST['landmark']);
    $note              = escape_string($_POST['note']);
    $zip               = escape_string($_POST['zip']);
    $t                 = time();
    $date              = date("Y-m-d",$t);
    $curr_time         = date("H:i:s",$t);

    $query = query("INSERT INTO delivery (user_id, full_name, contact_number, email, address, brgy, municipality, province, landmark, note , zip, date , time , active) VALUES('{$user}', '{$full_name}', '{$contact_number}', '{$email}', '{$address}', '{$brgy}', '{$municipality}' , '{$province}' , '{$landmark}' , '{$note}' , '{$zip}' ,'$date' , '$curr_time' , '0')");
    confirm($query);

        $sql    = "SELECT SUM(product_total_price) FROM temporder WHERE user_id = '" .escape_string($user). "'";
        $result = query($sql);

        if(row_count($result) > 0) {

            $row = fetch_array($result);

            $db_user_product_total = $row['SUM(product_total_price)'];
            
            $count_total = count_total_orders($total_row);

            $query = query("INSERT INTO orders (order_amount, order_transaction, order_status, order_currency, date_ordered, time_ordered , active) 
                VALUES('{$db_user_product_total}', '{$count_total}', 'Completed', 'PHP', '$date','$curr_time', '0')");
            confirm($query);

            $sql = "DELETE FROM temporder WHERE user_id = ".$user. "";
            $results = query($sql);

        }
    $sql = "SELECT * FROM `delivery` ORDER by delivery_id DESC LIMIT 1";
    $result = query($sql);

    while($row = fetch_array($result)) {
        $delivery_id = $row['delivery_id'];
    }

    $count=count($_POST["id"]);

    for($i=0;$i<$count;$i++) {
        $totaltotal = $_POST['total_total_price'];
        $sql1 = "INSERT INTO ordered_products (user_id , supplier_id ,delivery_id, product_title, color, size, quantity ,total_price, product_id, date_ordered , time_ordered) VALUES ('".$_POST['user_id'][$i]."','".$_POST['supplier_id'][$i]."','$delivery_id' ,'".$_POST['name'][$i]."','".$_POST['color'][$i]."','".$_POST['size'][$i]."', '".$_POST['quantity'][$i]."','".$_POST['total_price'][$i]."','".$_POST['prid'][$i]."','$date' , '$curr_time')";
        $result = mysqli_query($connection , $sql1);
    }
    echo $count;
    redirect("thank_you.php");
    exit;

}
?>

