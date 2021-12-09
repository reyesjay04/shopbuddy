<?php require_once("config.php"); ?>

<?php

if(isset($_GET['color_name']) and isset($_GET['size_name'])) {
    $color_name = $_GET['color_name'];
    $size_name  = $_GET['size_name'];
    $_SESSION['color'] = $color_name;
    $_SESSION['size'] = $size_name;
}

if(isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $sql = "SELECT user_id FROM customers WHERE email = '".escape_string($email)."' ";
        $result = query($sql);
        if(row_count($result) == 1) {

            $row = fetch_array($result);
            $db_user_id = $row['user_id']; 
        }
}

if(isset($_GET['add'])) {

        $query = query("SELECT * FROM products WHERE product_id=" . escape_string($_GET['add']). " ");
        confirm($query);
        
        while($row = fetch_array($query)) {

            $supplier_id            = $row['supplier_id'];
            $product_id             = $row['product_id'];
            $product_price          = $row['total_price'];
            $product_title          = $row['product_title'];
            $product_quantity       = $row['product_quantity'];
            $product_image          = $row['product_image'];

        }

        if(isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $sql = "SELECT user_id FROM customers WHERE email = '".escape_string($email)."' ";
        $result = query($sql);
        
        if(row_count($result) == 1) {

            $row = fetch_array($result);
            $db_user_id = $row['user_id'];

            $sql = "SELECT quantity , product_quantity FROM temporder WHERE product_id=" . escape_string($_GET['add']). " AND user_id = ".escape_string($db_user_id)." ";
            $results = query($sql);

            if(row_count($results) == 1) {

                $row = fetch_array($result);
                $db_quantity      = $row['quantity'];
                $product_quantity = $row['product_quantity'];
                $asd = $product_quantity - $db_quantity;          

                if(isset($_GET['color_name']) and isset($_GET['size_name'])) {
                    $color_name = $_GET['color_name'];
                    $size_name  = $_GET['size_name'];
                    $asd = $product_quantity - $quantity;

                    $query  = "UPDATE temporder SET quantity=quantity + 1, product_total_price = product_price *quantity, color='{$color_name}', size='{$size_name}' WHERE product_id= " . escape_string($_GET['add']) . " AND user_id = " .escape_string($db_user_id)." ";
                    $send_update_query = query($query);
                    confirm($send_update_query);  
                    redirect("../public/checkout.php");
                        
                } else {

                    $query  = "UPDATE temporder SET quantity=quantity + 1, product_total_price = product_price *quantity WHERE product_id= " . escape_string($_GET['add']) . " AND user_id = " .escape_string($db_user_id)." ";
                    $send_update_query = query($query);
                    confirm($send_update_query);
                  
                    
                }

                $query  = "UPDATE products SET product_quantity = product_quantity - 1 WHERE product_id= " . escape_string($_GET['add']) . " ";
                $send_update_query = query($query);
                confirm($send_update_query);
                redirect("../public/checkout.php");      

            } else {

            $query = query("INSERT INTO temporder(product_id, product_title, product_price, product_quantity, quantity, user_id, product_image , supplier_id, color , size) VALUES('{$product_id}', '{$product_title}', '{$product_price}', '{$product_quantity}', '1', '{$db_user_id}' , '{$product_image }' , '{$supplier_id}' , '{$color_name}' , '{$size_name}')");
            confirm($query);

            $query  = "UPDATE temporder SET product_total_price=product_price*quantity WHERE product_id= " . escape_string($_GET['add']) . " AND user_id = ".escape_string($db_user_id) ." ";
            $send_update_query = query($query);
            confirm($send_update_query);

            $query  = "UPDATE products SET product_quantity = product_quantity - 1 WHERE product_id= " . escape_string($_GET['add']) . " ";
            $send_update_query = query($query);
            confirm($send_update_query);

            redirect("../public/checkout.php");

            }

        }

    } else {
        redirect("../public/login.php");
    }
     
}

if(isset($_GET['remove'])) {

    $query = query("SELECT * FROM products WHERE product_id=" . escape_string($_GET['remove']). " ");
    $result = ($query);

    if(row_count($result) > 0) {

        while($row = fetch_array($query)) {

            $query  = "UPDATE temporder SET quantity=quantity-1, product_total_price=product_price*quantity WHERE product_id= " . escape_string($_GET['remove']) . " AND user_id = ".escape_string($db_user_id)." ";
            $send_update_query = query($query);
            confirm($send_update_query);

            $sql = "SELECT quantity FROM temporder WHERE product_id=" . escape_string($_GET['remove']). " AND user_id = ".escape_string($db_user_id)." ";
            $results = query($sql);

            $query  = "UPDATE products SET product_quantity = product_quantity + 1 WHERE product_id= " . escape_string($_GET['remove']) . " ";
            $send_update_query = query($query);
            confirm($send_update_query);

            if(row_count($results) == 1) {

                $row = fetch_array($results);
                $db_quantity = $row['quantity'];

                if($db_quantity < 1) {

                 $sql = "DELETE FROM temporder WHERE product_id=" . escape_string($_GET['remove']). " AND user_id = " .escape_string($db_user_id). " ";

                $results = query($sql);
                redirect("../public/checkout.php");

                }

                redirect("../public/checkout.php");
            }

        }

    } else {

        redirect("../public/checkout.php");
    }

    
}

if(isset($_GET['delete'])){

    if(isset($_GET['qty'])) {

     if(isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $sql = "SELECT user_id FROM customers WHERE email = '".escape_string($email)."' ";
        $result = query($sql);
        if(row_count($result) == 1) {

            $row = fetch_array($result);
            $db_user_id = $row['user_id'];
        }
    }

      $query  = "UPDATE products SET product_quantity = product_quantity + ".escape_string($_GET['qty'])." WHERE product_id= " . escape_string($_GET['delete']) . " ";
      $send_update_query = query($query);
      confirm($send_update_query);

      $sql = "DELETE FROM temporder WHERE product_id=" . escape_string($_GET['delete']). " AND user_id = ".escape_string($db_user_id)." ";
      $results = query($sql);
      redirect("../public/checkout.php");
  }
}



function cart() {

    if(isset($_SESSION['email'])) {

        $email  = $_SESSION['email'];
        $sql    = "SELECT user_id FROM customers WHERE email = '".escape_string($email)."' ";
        $result = query($sql);

        if(row_count($result) == 1) {
            $row = fetch_array($result);
            $db_user_id = $row['user_id'];
        }
    }
        
    $query = query("SELECT * FROM temporder WHERE user_id = " . escape_string($db_user_id). " ");
    confirm($query);

    while($row = fetch_array($query)) {

        $value =$row['quantity'];
        $product_id = $row['product_id'];
        $sub = number_format($row['product_total_price'], 2) * $value;
        $product_total_price = number_format($row['product_total_price'], 2);
        $product_image = display_image($row['product_image']);
        $product_quantity = $row['product_quantity'];
        $asd = $product_quantity - $value;
        
        if($asd < 1) {

        $btn = '<a class="btn btn-default btn-sm" ><span class="glyphicon glyphicon-plus"></span></a> ';

        } else {
        $btn = '<a class="btn btn-default btn-sm"href="../resources/cart.php?add='.$product_id.'&qty='.$value.'"><span class="glyphicon glyphicon-plus"></span></a> ' ;  

        }
        $product = <<<DELIMETER
        <tr>
            <td>
                {$row['product_title']}<input type="hidden" name="suppid" value="{$row['supplier_id']}">
                <br>
                <img width='100' style='height: 100px' src='../resources/{$product_image}'>
            </td>
            <td>
                &#8369;{$row['product_price']}
            </td>
        <td>{$value}</td>
        <td>&#8369;{$product_total_price}</td>
        <td>
        <a class='btn btn-default btn-sm' href="../resources/cart.php?remove={$row['product_id']}"><span class='glyphicon glyphicon-minus'></span></a> 
        $btn
        <a class='btn btn-default btn-sm' href="../resources/cart.php?delete={$row['product_id']}&qty=$value"><span class='glyphicon glyphicon-remove'></span></a>
        </tr>
DELIMETER;
        
echo $product;



    }
}


function process_transaction() {

     if(isset($_GET['tx'])) {
        $amount =$_GET['amt'];
        $currency = $_GET['cc'];
        $transaction = $_GET['tx'];
        $status = $_GET['st'];
        $item_quantity = 0;
        $total = 0;
   
    foreach ($_SESSION as $name => $value) {
        
        if($value > 0) {
    
            if(substr($name, 0, 8 ) == "product_") {
                        
                $length = strlen($name - 8);
                        
                $id = substr($name, 8 , $length);

                //insert into orders
                  
                $send_order = query("INSERT INTO orders (order_amount, order_transaction,order_currency ,order_status ) VALUES ('{$amount}','{$transaction}','{$currency}','{$status}')");

                $last_id = last_id();

                confirm($send_order);

                //select from products
            
                $query = query("SELECT * FROM products WHERE product_id = " . escape_string($id). " ");
        
                confirm($query);
    
    while($row = fetch_array($query)) {

        $product_price = $row['product_price'];
        $product_title = $row['product_title'];
        $product_quantity = $row['product_quantity'];
        $sub = $row['product_price'] * $value;
        $item_quantity += $value;


        //insert into reports

        $insert_report = query("INSERT INTO reports (product_id, order_id, product_title, product_price, product_quantity) VALUES ('{$id}','{$last_id}','{$product_title}','{$product_price}','{$value}')");
            
        confirm($insert_report);

        
    } 
        $total += $sub;
        echo $item_quantity;

            }

        }   

    }

}  else {
    redirect("index.php");
}
        

}


function show_paypal() {
    
    
    if (isset($_SESSION['item_quantity']) && $_SESSION['item_quantity'] >=1 )  {  
          $paypal_button = <<<DELIMETER
    <input type="image" name="upload"
    src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
    alt="PayPal - The safer, easier way to pay online">
    

DELIMETER;
        
return $paypal_button;
        
        }
}


function show_checkout() {

    if(isset($_SESSION['email'])) {

        $email = $_SESSION['email'];
  
        $email  = strtoupper($email);
        $sql    = "SELECT user_id FROM customers WHERE email = '".escape_string($email)."'  ";
        $result = query($sql);

        if(row_count($result) == 1) {

            $row = fetch_array($result);
            $db_user_id = $row['user_id'];

            $query = query("SELECT SUM(product_total_price) FROM temporder WHERE user_id = ".escape_string($db_user_id)." ");
            confirm($query);

            $row = fetch_array($query);

            $sum = $row[0];

            if($sum > 500) {
                $pricetag = 0;
               
            } else {
                $pricetag = 500;
               
            }

            $sql    = "SELECT * FROM temporder WHERE user_id = '".escape_string($db_user_id)."'  ";
            $result = query($sql);
            $checkout_button = <<<DELIMETER

            <a href="checkoutform.php?id={$db_user_id}&shp=$pricetag"><button type="button" class="btn btn-success" style="background-color: #d04f21;">Check Out</button></a>
DELIMETER;
        
            if(row_count($result) > 0) {
                return $checkout_button;
            } else {

            }     
        }           
    }
}

function order_checkout() {
        
    if(isset($_POST['submit'])) {

    $user_id           = escape_string($_GET['id']);
    $full_name         = escape_string($_POST['full_name']);
    $contact_number    = escape_string($_POST['contact_number']);
    $email             = escape_string($_SESSION['email']);
    $address           = escape_string($_POST['address']);
    $brgy              = escape_string($_POST['brgy']);
    $municipality      = escape_string($_POST['municipality']);
    $province          = escape_string($_POST['province']);
    $landmark          = escape_string($_POST['landmark']);
    $note              = escape_string($_POST['note']);
    $city              = escape_string($_POST['city']);
    $zip               = escape_string($_POST['zip']);
    $t                 = time();
    $date              = date("Y-m-d",$t);
    $curr_time         = date("H:i:s",$t);

    $query = query("INSERT INTO delivery (user_id, full_name, contact_number, email, address, brgy, municipality, city, province, landmark, note , zip, date , time , active) VALUES('{$user_id}', '{$full_name}', '{$contact_number}', '{$email}', '{$address}', '{$brgy}', '{$municipality}', '{$city}' , '{$province}' , '{$landmark}' , '{$note}' , '{$zip}' ,'$date' , '$curr_time' , '0')");
    confirm($query);


        $sql    = "SELECT SUM(product_total_price) FROM temporder WHERE user_id = '" .escape_string($_GET['id']). "'";
        $result = query($sql);

        if(row_count($result) > 0) {

            $row = fetch_array($result);

            $db_user_product_total = $row['SUM(product_total_price)'];
            
            $count_total = count_total_orders($total_row);

            $query = query("INSERT INTO orders (order_amount, order_transaction, order_status, order_currency, date_ordered, time_ordered , active) 
                VALUES('{$db_user_product_total}', '{$count_total}', 'Completed', 'PHP', '$date','$curr_time', '0')");
            confirm($query);

            $sql = "DELETE FROM temporder WHERE user_id = ".$user_id. "";
            $results = query($sql);

            $tmp = $_SESSION['email'];
            session_unset();
            $_SESSION['email'] = $tmp;
            redirect("thank_you.php");
            exit;


        }        
    }
}

?>