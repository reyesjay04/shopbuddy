<?php include 'pagination.php' ?>
<?php
date_default_timezone_set("Asia/Manila");

$upload_directory = "uploads/";
$upload_directory_profile = "uploads/profile";
// helper functions
function row_count($result) {

$result = mysqli_num_rows($result);

return $result;

}
function escape($string) {


    return mysqli_real_escape_string($con, $string);


}

function last_id() {
    
    global $connection;

    return mysqli_insert_id($connection);

}
function set_message($msg) {
    
    if(!empty($msg)) {
        $_SESSION['message'] = $msg;
    } else {
        $msg = "";
    }
    
}

function clean($string) {

    return htmlentities($string);
}

function display_message() {
    if (isset( $_SESSION['message'])) {
        echo  $_SESSION['message'];
        unset ($_SESSION['message']);
        
    }
}

function token_generator() {

    $token = $_SESSION['token'] = md5(uniqid(mt_rand(), true));
    return $token;

}

function redirect($location){
    
    header("Location: $location");
    
}

function query($sql){

    global $connection;

    return mysqli_query($connection, $sql);
}

function confirm($results){
    
    global $connection;

    if (!$results) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
}


function escape_string($string){
       
    global $connection;
    
    return mysqli_real_escape_string($connection, $string);

   
}
function fetch_array($result) {

    global $connection;


    return mysqli_fetch_array($result);

}

function validation_errors($error_message) {
    $error_message = <<<DELIMETER
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Warning! </strong> $error_message
    </div>
DELIMETER;

return $error_message;
}

function email_exists($email) {

    $sql = "SELECT user_id FROM customers WHERE email ='$email'";
    $results = query($sql);

    if(row_count($results) == 1) {

        return true;

    } else {
        
        return false;
    }
}
function category_exist($cat_title) {

    $sql = "SELECT cat_id FROM categories WHERE cat_title ='$cat_title'";
    $results = query($sql);

    if(row_count($results) == 1) {

        return true;

    } else {
        
        return false;
    }
}

function profile_exist($profile) {

    $sql = "SELECT profile FROM customers WHERE profile LIKE '%profile%' ";
    $results = query($sql);

    if(row_count($results) == 1) {

        return true;

    } else {
        
        return false;
    }
}


function size_exist($size_name) {

    $sql = "SELECT size_id FROM size WHERE size_name ='$size_name'";
    $results = query($sql);

    if(row_count($results) == 1) {

        return true;

    } else {
        
        return false;
    }
}

function color_exist($color_name) {

    $sql = "SELECT color_id FROM color WHERE color_name = '$color_name' ";
    $results = query($sql);

    if(row_count($results) == 1) {

        return true;

    } else {
        
        return false;
    }
}
function email_add_exists($email_address) {

    $sql = "SELECT supplier_id FROM supplier WHERE email_address ='$email_address'";
    $results = query($sql);

    if(row_count($results) == 1) {

        return true;

    } else {
        
        return false;
    }
}

function username_exists($username) {

    $sql = "SELECT user_id FROM customers WHERE username ='$username'";
    $results = query($sql);


    if(row_count($results) == 1) {
        return true;
    } else {
        return false;
    }
}

function send_email($emain, $subject, $msg, $headers) {

return mail($emain, $subject, $msg, $headers);


}

function supplier_email() {

    if(isset($_SESSION['email_address'])) {

        $email_address = $_SESSION['email_address'];

        $sql = "SELECT supplier_id FROM supplier WHERE email_address ='$email_address'";
        $results = query($sql);


        if(row_count($results) == 1) {

            $row = fetch_array($results);
            $db_supplier_id = $row['supplier_id'];

            return $db_supplier_id;
        } else {
            return false;
        }
    }
}


//****************************************************************************************************
//GET PRODUCTS

function get_products($search) {
     //echo $id;

    if(isset($_GET['search'])) {

        $sql="SELECT * FROM products WHERE product_title LIKE '%$search%'";
        $result = query($sql);

        $rows = mysqli_num_rows($result); 

        if(isset($_GET['page'])){

            $page = preg_replace('#[^0-9]#', '', $_GET['page']);

        } else {

            $page = 1;

        }

        $perPage = 8; 

        $lastPage = ceil($rows / $perPage); 

        if($page < 1){ 

            $page = 1;

        } elseif($page > $lastPage){

            $page = $lastPage; 
        }
        $middleNumbers = ''; 

        $sub1 = $page - 1;
        $sub2 = $page - 2;
        $add1 = $page + 1;
        $add2 = $page + 2;

        if($page == 1){

            $middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';

            $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add1.'&search='.$search.'">' .$add1. '</a></li>';

        } elseif ($page == $lastPage) {
    
            $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub1.'&search='.$search.'">' .$sub1. '</a></li>';
            $middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';

        } elseif ($page > 2 && $page < ($lastPage -1)) {

            $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub2.'&search='.$search.'">' .$sub2. '</a></li>';

            $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub1.'&search='.$search.'">' .$sub1. '</a></li>';

            $middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';

            $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add1.'&search='.$search.'">' .$add1. '</a></li>';

            $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add2.'&search='.$search.'">' .$add2. '</a></li>';

        } elseif($page > 1 && $page < $lastPage){

            $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page= '.$sub1.'&search='.$search.'">' .$sub1. '</a></li>';

            $middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';
 
            $middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add1.'&search='.$search.'">' .$add1. '</a></li>';

        }

        $limit = 'LIMIT ' . ($page-1) * $perPage . ',' . $perPage;

        $query2= query("SELECT * FROM products WHERE product_title LIKE '%$search%' AND active = 1 $limit");
           
        confirm($query2);

        $outputPagination = "";

        if($page != 1){

    $prev  = $page - 1;

    $outputPagination .='<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$prev.'&search='.$search.'">Back</a></li>';
    }


    $outputPagination .= $middleNumbers;


    if($page != $lastPage){

        $next = $page + 1;

        $outputPagination .='<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$next.'&search='.$search.'">Next</a></li>';

    }
    while($row = fetch_array($query2)) {

    $product_image = display_image($row['product_image']);
    $supplier_id = $row['supplier_id'];

    $product = <<<DELIMETER
     <div class="col-sm-3 col-lg-3 col-md-3" style="padding-left: 5px;padding-right: 5px;">
        <div class="thumbnail" style="height: 335px;">
            <a href="item.php?id={$row['product_id']}"><img style="max-height: 200px;" src="../resources/{$product_image}" alt=""></a>
                <div style="height: 140px"class="caption">
                    <p style="color: black;font-size: 13px;font-weight: 600; height:30px;" class="text-center">{$row['product_title']}</p>
                    <h4 style="color: #f57224;margin-bottom: 0px; font-size: 12px">&#8369;{$row['total_price']}</h4>
                    <p style="color: #9e9e9e;font-size: 14px;margin-top: 0px;margin-bottom: 5px; font-size: 12px; height: 30px;">Description: {$row['short_desc']}</p>
                    <h4 style="color: #9e9e9e;font-size: 14px;margin-top: 0px;margin-bottom: 5px; font-size: 12px">{$row['product_quantity']} products</h4>
                    <h4 style="color: #1f1919; font-size: 14px; font-size: 12px">{$row['company_name']}</h4>
                    </h4>
                   
                </div>
        </div>
    </div>   
DELIMETER;
echo $product;

            }
        echo "
       <div class='clearfix'>
            <div class='text-center'>
                <ul class='pagination pull-right' style='position: absolute;bottom: -4px;right: 10px;'>
                    {$outputPagination}
                </ul>
            </div>
        </div>";


    } else {

        pagination_fetch();

    }


}



function get_categories () {

$query ="SELECT DISTINCT product_category_id FROM products WHERE active = 1";
$results = query($query);


  while($row = mysqli_fetch_assoc($results)) {

    // var_dump($row);
    $product_category_id = $row['product_category_id'];

    $query = query("SELECT * FROM categories WHERE cat_id = ".escape_string($product_category_id)." ");
    confirm($query);
    while ($row = fetch_array($query)) {

    
    $row['cat_id'];
    $row['cat_title'];                
    $categories_links = <<<DELIMETER

<a href='category.php?id={$row['cat_id']}' class='list-group-item' style='font-weight: 600;'>{$row['cat_title']}</a>

DELIMETER;
echo $categories_links;

        }

    }
    
}




function get_products_in_cat_page($id){

    $search = "";
    $query = query("SELECT * FROM products WHERE product_category_id = ".$id." AND active = 1");

    confirm($query);

        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $no_of_records_per_page = 8;
        $offset = ($page-1) * $no_of_records_per_page;

        $total_pages_sql = "SELECT COUNT(*) FROM products WHERE product_category_id = ".$id." AND active = 1";
        $result = query($total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $sql = "SELECT * FROM products WHERE product_category_id = ".$id." AND active = 1 LIMIT $offset, $no_of_records_per_page";
        $res_data = query($sql);
        while($row = mysqli_fetch_array($res_data)) {
            $product_image = display_image($row['product_image']);
            $supplier_id = $row['supplier_id'];
            $product = <<<DELIMETER
             <div class="col-sm-3 col-lg-3 col-md-3" style="padding-left: 5px;padding-right: 5px;">
                <div class="thumbnail" style="height: 335px;">
                    <a href="item.php?id={$row['product_id']}"><img style="max-height: 200px;" src="../resources/{$product_image}" alt=""></a>
                        <div style="height: 140px"class="caption">
                            <p style="color: black;font-size: 13px;font-weight: 600; height:30px;" class="text-center">{$row['product_title']}</p>
                            <h4 style="color: #f57224;margin-bottom: 0px; font-size: 12px">&#8369;{$row['total_price']}</h4>
                            <p style="color: #9e9e9e;font-size: 14px;margin-top: 0px;margin-bottom: 5px; font-size: 12px; height: 30px;">Description: {$row['short_desc']}</p>
                            <h4 style="color: #9e9e9e;font-size: 14px;margin-top: 0px;margin-bottom: 5px; font-size: 12px">{$row['product_quantity']} products</h4>
                            <h4 style="color: #1f1919; font-size: 14px; font-size: 12px">{$row['company_name']}</h4>
                            </h4>
                        </div>
                </div>
            </div>   
DELIMETER;
            echo $product;
        }
        ?>
</form>
    </div> 
        <link rel="stylesheet" type="text/css" href="css/page.css">
        <div class="pagination pull-right">
            <a href="<?php echo "category.php?page=".$page = 1; ?>" class="page">FIRST</a>
            <?php
                for ($page=1;$page<=$total_pages;$page++) {
                    echo '<a href="category.php?page=' . $page . '&id='.$id.'" class="page">' . $page . '</a>';
            }
            ?>
            <a href="<?php echo "category.php?page=".$total_pages; ?>" class="page">LAST</a>
        </div> 
<?php    
}

function get_products_in_cat_page_under(){
    
$query = query("SELECT * FROM products WHERE product_category_id = " . escape_string($_GET['id']). " AND active = 1");
    confirm($query);
    
    while ($row = fetch_array($query)) {

    $product_image = display_image($row['product_image']);
    
$product = <<<DELIMETER
 <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="../resources/{$product_image}" alt="" style="max-height: 110px">
                    <div class="caption">
                        <h3 style="color: black;">{$row['product_title']}</h3>
                        <p>{$row['short_desc']}</p>
                        <p>
                            <a href="../resources/cart.php?add={$row['product_id']}" class="btn btn-primary">Buy Now!</a> 
                            <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>
DELIMETER;
echo $product;
    }       
}



function login_user_admin(){
    
    if(isset($_POST['submit'])) {
        
        $username = escape_string($_POST['username']);
        $password = escape_string($_POST['password']);
        
        $query = query("SELECT * FROM admin WHERE username = '{$username}' AND password = '{$password}' ");
        confirm($query);
        
        
        if (mysqli_num_rows($query) == 0) {
             
            set_message("Your Username or Password is incorrect");
            redirect ("adminlogin.php");
            
        } else {

            $_SESSION['username'] = $username;
  /*          set_message("Welcome Admin {$username}");*/
            redirect ("admin/index.php?admin_indexcontent");
            
        }
         
    } 
}


//*************************************MAIL*************************************************//

function send_message() {

        if(isset($_POST['submit'])) {
            
            $to        = "shpbuddy@gmail.com";
            $from_name = $_POST['name'];
            $subject   = $_POST['subject'];
            $email     = $_POST['email'];
            $message1  = $_POST['message'];
            $message   = '
            <html>
            <head> 
            </head>
            <body style=" font-family: "Montserrat", sans-serif;
            font-smoothing: antialiased;">
            <div class="container" style="padding: 25px 100px;
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fac564;
            background-image: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/5908/food.png);">
            <div class="document" style="  background-color: rgba(#fac564,.5);
            padding: 40px 20px;
            border-radius: 5px;">
            <h1 style=" text-align: center;
            font-size: 3em;
            margin-bottom: 10px;
            text-transform: uppercase;
            font-weight: bold;
            color: white;
            text-shadow: 0 1px 2px rgba(black,.15);">Shop Buddy</h1>
            <hr class="brace" style="width: auto;
            min-width: 35px;
            padding-bottom: 20px;
            font-size: 2em;
            line-height: 2em;
            position: relative;
            text-align: center;
            vertical-align: middle;
            margin: 0 15px 15px;
            border: none;
            background-color: transparent;
            background-image: 
            radial-gradient(circle at 0 0, rgba($brace-color,0) 14.5px, $brace-color 15.5px, $brace-color 19.5px, rgba($brace-color,0) 20.5px),
            radial-gradient(circle at 35px 0, rgba($brace-color,0) 14.5px, $brace-color 15.5px, $brace-color 19.5px, rgba($brace-color,0) 20.5px);
            background-size: 35px 20px;
            background-position: center bottom;
            background-repeat: no-repeat;
            text-transform: lowercase;
            font-style: italic;
            color: $brace-color;
            filter: drop-shadow(0 1px 1px rgba(black,.15));
            overflow: visible;
  
            &:before {
            width: 50%;
            border-top: 5px solid $brace-color;
            border-left: 1px solid transparent; /* play with this until you like the look of it */
            border-top-left-radius: 20% 30px;
            height: 100%;
            content: "";
            absolute: top @height left -15px;
            box-sizing: border-box;
            margin-top: -5px;
            }
  
            &:after {
            width: 50%;
            border-top: 5px solid $brace-color;
            border-right: 1px solid transparent; /* play with this until you like the look of it */
            border-top-right-radius: 20% 30px;
            height: 100%;
            content: "";
            absolute: top @height right -15px;
            box-sizing: border-box;
            margin-top: -5px;
            }">
            <div class="document__content" style="column-count: 1;
            @media screen and (min-width:1200px) {
            column-count: 2;
            }
            column-gap: 20px;
            padding: 20px 0;
            margin: 0 100px;">
            <p style="margin: 0 20px 20px;
            font-size: 16px;
            line-height: 1.5em;
            color: lighten(black,20%);">'.$message1.'</p>
            </div>
            </div>
            </div>
            </body>
            </html>
            ';
            $headers = 'From:' .$from_name.$email." \r\n" .
            'Reply-To:' . $email ."\r\n".
            'Content-type: text/html; charset=iso-8859-1';
            
         
            $results = mail($to ,$subject, $message ,$headers);
            
            if(!$results) {
                set_message ("<div class='alert alert-danger alert-dismissible' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                     <span aria-hidden='true'>&times;</span>
                                </button>
                                 <strong>Sorry</strong> we could not sent your message
                              </div>");
                redirect("contact.php");
            }else{
                set_message ("<div class='alert alert-success alert-dismissible' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                     <span aria-hidden='true'>&times;</span>
                                </button>
                                <strong>Your</strong> message has been sent
                               </div>");
                redirect("contact.php");
            }
        
        }
}
//**************************************************************************************************************


function display_orders() {

    $query = query("SELECT * FROM orders");
    confirm($query);


    while ($row = fetch_array($query)) {

        $orders = <<<DELIMETER
<tr>
    <td>{$row['order_id']}</td>
    <td>{$row['order_amount']}</td>
    <td>{$row['order_transaction']}</td>
    <td>{$row['order_currency']}</td>
    <td>{$row['order_status']}</td>
    <td><a class="btn btn-danger" href="../../resources/templates/back/delete_order.php?id={$row['order_id']}">DELETE</a></td>
</tr>
DELIMETER;

echo $orders;
        # code...
    }
}

//************************************* SUPP:LIER PRODUCTS *************************************/

function display_image($picture) {

    global $upload_directory;

    return $upload_directory. DS . $picture;

}
function display_profile($picture) {

    global $upload_directory_profile;

    return $upload_directory_profile. DS . $picture;
}

function get_products_in_admin() {

    $query = query("SELECT * FROM products WHERE active = 1");
    confirm($query);
    
    while ($row = fetch_array($query)) {
    $category = show_product_category_title($row['product_category_id']);
    $product_image = display_image($row['product_image']);
    $price = number_format($row['product_price'], 2);
    $total_price = $row['total_price'];

            $product = <<<DELIMETER
<tr>
    <td>
        {$row['product_id']}
    </td>
       <td width="121px">
        <a class="btn btn-danger" href="../../resources/templates/back/delete_product.php?id={$row['product_id']}">
            Delete
        </a>
        <a class="btn btn-success" href="index.php?edit_product&id={$row['product_id']}"">
            Edit
        </a>
    </td>
    <td width="200px">
        {$row['product_title']}
    </td>
    <td>
        {$category}
    </td>
    <td>
        &#8369;$price
    </td>
    <td>
        &#8369;$total_price
    </td>
    <td>
        {$row['product_quantity']}
    </td>
    <td>
        {$row['company_name']}
    </td>
 
</tr>
      
DELIMETER;

echo $product;

    }
}

function get_supplier_products() {

    if(isset($_GET['supplier_id'])) {
        $get = $_GET['supplier_id'];
    }
 
    $query = query("SELECT * FROM products WHERE active = 1 AND supplier_id = ". escape_string($_GET['supplier_id'])." ");
    confirm($query);
    
    while ($row = fetch_array($query)) {

    $category = show_product_category_title($row['product_category_id']);

    $product_image = display_image($row['product_image']);

    $price = number_format($row['product_price'], 2);
    
$product = <<<DELIMETER
    <tr>
        <td>{$row['product_id']}</td>
        <td>
        <a href="supplierindex.php?edit_supplier_product&id={$row['product_id']}&supplier_id=$get"><img  width='100' src="../../resources/{$product_image}" alt="" style="max-height: 50px;"></a>&nbsp;&nbsp;{$row['product_title']}
        </td>
        <td>{$category}</td>
        <td>&#8369;$price</td>
        <td>{$row['product_quantity']}</td>
        <td><a class="btn btn-danger" href="../../resources/templates/back/delete_supplier_product.php?id={$row['product_id']}&supplier_id=$get"><span class="glyphicon glyphicon-remove"></span></a></td>
    </tr>
      
DELIMETER;

echo $product;

    }
}

function get_supplier_pending_products() {

    $get = $_GET['supplier_id'];
    
    $query = query("SELECT * FROM products WHERE active = 0 AND supplier_id = ". escape_string($_GET['supplier_id'])." ");
    confirm($query);
    
    while ($row = fetch_array($query)) {

    $category = show_product_category_title($row['product_category_id']);

    $product_image = display_image($row['product_image']);
    
$product = <<<DELIMETER
    <tr>
        <td>{$row['product_id']}</td>
        <td>{$row['product_title']}<br>
        <a href="index.php?edit_product&id={$row['product_id']}"><img  width='100' style="height: 50px;"src="../../resources/{$product_image}" alt=""></a>
        </td>
        <td>{$category}</td>
        <td>&#8369;{$row['product_price']}</td>
        <td>{$row['product_quantity']}</td>
        <td><a class="btn btn-danger" href="../../resources/templates/back/delete_supplier_product.php?id={$row['product_id']}&supplier_id=$get"><span class="glyphicon glyphicon-remove"></span></a></td>
    </tr>
      
DELIMETER;

echo $product;

    }
}




function show_product_category_title($product_category_id) {

    $category_query = query("SELECT * FROM categories WHERE cat_id = '{$product_category_id}'");

    confirm($category_query);

    while ($category_row = fetch_array($category_query)) {

        return $category_row['cat_title'];
    }


}
/******************************* ADDING PRODUCTS IN ADMIN ******************************/

function add_product() {


if(isset($_POST['publish'])) {


$product_title          = escape_string($_POST['product_title']);
$product_category_id    = escape_string($_POST['product_category_id']);
$product_price          = escape_string($_POST['product_price']);
$product_description    = escape_string($_POST['product_description']);
$short_desc             = escape_string($_POST['short_desc']);
$product_quantity       = escape_string($_POST['product_quantity']);
$uc_id                  = escape_string($_POST['under_category']);
$supplier_id            = escape_string($_GET['supplier_id']);
$t                 = time();
$date              = date("Y-m-d",$t);
$curr_time         = date("H:i:s",$t);


if (isset($_FILES['file'])) { 

    $product_image          = $_FILES['file']['name'];
    $image_temp_location    = $_FILES['file']['tmp_name'];

    $upload = move_uploaded_file($image_temp_location  , UPLOAD_DIRECTORY . DS . $product_image);


}

if(!$product_quantity == 0) {

    $sql = "SELECT company_name FROM supplier WHERE supplier_id = ".($supplier_id)." ";
    $results = query($sql);

    if(row_count($results) == 1) {
        $row = fetch_array($results);
        $company_name = $row['company_name'];
    }

    $query = query("INSERT INTO products(product_title, product_category_id, uc_id ,product_price, product_description, short_desc, product_quantity, product_image, supplier_id, company_name, date_created, time_created) VALUES('{$product_title}', '{$product_category_id}', '{$uc_id}','{$product_price}', '{$product_description}', '{$short_desc}', '{$product_quantity}', '{$product_image}' , '{$supplier_id}','{$company_name}','$date','$curr_time')");
$last_id = last_id();
confirm($query);


    set_message("<p class='bg-success'>New Product was added, Wait for admin to confirm your product.</p>");


} else {

    set_message("Invalid quantity value");
}



        }


}
function show_categories_add_product_page() {

$query = query("SELECT * FROM categories");
confirm($query);
           
            
        while($row = mysqli_fetch_array($query)) {
                
            $categories_options = <<<DELIMETER
            <option value="{$row['cat_id']}">{$row['cat_title']}</option>
DELIMETER;
     
    echo $categories_options;
    }

}


function show_categories_under_product_page() {
    
    
    $query = query("SELECT * FROM under_categories WHERE cat_id = ".$_GET." ");
    confirm($query);
           
            
        while($row = mysqli_fetch_array($query)) {
                
            $categories_options = <<<DELIMETER
            <option value="{$row['uc_id']}">{$row['uc_name']}</option>

DELIMETER;
     
    echo $categories_options;
        }
    
}

/*************************UPDATE PROD ****************************/

function update_product() {


    if(isset($_POST['update'])) {

        $product_title          = escape_string($_POST['product_title']);
        $product_category_id    = escape_string($_POST['product_category_id']);
        $product_price          = escape_string($_POST['product_price']);
        $product_description    = escape_string($_POST['product_description']);
        $short_desc             = escape_string($_POST['short_desc']);
        $product_quantity       = escape_string($_POST['product_quantity']);
        $total_price            = escape_string($_POST['total_price']);
        $product_image          = $_FILES['file']['name'];
        $image_temp_location    = $_FILES['file']['tmp_name'];

        move_uploaded_file($image_temp_location , UPLOAD_DIRECTORY . DS .  $product_image);

        if(empty($product_image)) {

            $get_pic = query("SELECT product_image FROM products WHERE product_id = " .escape_string($_GET['id']). " ");
            confirm($get_pic);


            while($pic = fetch_array($get_pic)) {

            $product_image = $pic['product_image'];

            }
        }
      
        $query  = "UPDATE products SET ";
        $query .= "product_title        = '{$product_title}'        , ";
        $query .= "product_category_id  = '{$product_category_id}'  , ";
        $query .= "product_price        = '{$product_price}'        , ";
        $query .= "product_description  = '{$product_description}'  , ";
        $query .= "short_desc           = '{$short_desc}'           , ";
        $query .= "total_price          = '{$total_price}'           , ";
        $query .= "product_quantity     = '{$product_quantity}'     , ";
        $query .= "product_image        = '{$product_image}'          ";
        $query .= "WHERE product_id=" . escape_string($_GET['id']);

        $send_update_query = query($query);
        confirm($send_update_query);
        set_message("Product Has Been Updated");
        redirect("index.php?products");

    }
}

function update_supplier_product() {


    if(isset($_POST['update'])) {

        $supplier_id            = escape_string($_GET['supplier_id']);
        $product_title          = escape_string($_POST['product_title']);
        $product_category_id    = escape_string($_POST['product_category_id']);
        $product_price          = escape_string($_POST['product_price']);
        $product_description    = escape_string($_POST['product_description']);
        $short_desc             = escape_string($_POST['short_desc']);
        $product_quantity       = escape_string($_POST['product_quantity']);
        $product_image          = $_FILES['file']['name'];
        $image_temp_location    = $_FILES['file']['tmp_name'];

        move_uploaded_file($image_temp_location , UPLOAD_DIRECTORY . DS .  $product_image);

        if(empty($product_image)) {

            $get_pic = query("SELECT product_image FROM products WHERE product_id = " .escape_string($_GET['id']). " ");
            confirm($get_pic);


            while($pic = fetch_array($get_pic)) {

            $product_image = $pic['product_image'];

            }
        }
      
        $query  = "UPDATE products SET ";
        $query .= "product_title        = '{$product_title}'        , ";
        $query .= "product_category_id  = '{$product_category_id}'  , ";
        $query .= "product_price        = '{$product_price}'        , ";
        $query .= "product_description  = '{$product_description}'  , ";
        $query .= "short_desc           = '{$short_desc}'           , ";
        $query .= "product_quantity     = '{$product_quantity}'     , ";
        $query .= "product_image        = '{$product_image}'          ";
        $query .= "WHERE product_id=" . escape_string($_GET['id']);

        $send_update_query = query($query);
        confirm($send_update_query);
        set_message("Product Has Been Updated");
        redirect("supplierindex.php?supplier_id=$supplier_id&supplier_product");

    }
}
/****************************CATEGORIES IN ADMIN***********************************/


function show_categories_in_admin(){

    $query = "SELECT * FROM categories";
    $category_query = query($query);
    confirm($query);

    while($row = fetch_array($category_query)) {

        $cat_id    = $row['cat_id'];
        $cat_title = $row['cat_title'];



        $category = <<<DELIMETER

<tr>
    <th>{$cat_id}</th>
    <th>{$cat_title}</th>
    <td><a class="btn btn-danger" href="../../resources/templates/back/delete_category.php?id={$row['cat_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
</tr>

DELIMETER;

echo $category;


    }

}
function show_categories_in_admin_color(){

    $query = "SELECT * FROM color";
    $category_query = query($query);
    confirm($query);

    while($row = fetch_array($category_query)) {

        $color_id    = $row['color_id'];
        $color_name  = $row['color_name'];



        $category = <<<DELIMETER

<tr>
    <th>{$color_id}</th>
    <th>{$color_name}</th>
    <td><a class="btn btn-danger" href="../../resources/templates/back/delete_size.php?iid={$row['color_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
</tr>

DELIMETER;

echo $category;


    }

}

function show_categories_in_admin_size(){

    $query = "SELECT * FROM size";
    $category_query = query($query);
    confirm($query);

    while($row = fetch_array($category_query)) {

        $size_id    = $row['size_id'];
        $size_name  = $row['size_name'];



        $category = <<<DELIMETER

<tr>
    <th>{$size_id}</th>
    <th>{$size_name}</th>
    <td><a class="btn btn-danger" href="../../resources/templates/back/delete_size.php?id={$row['size_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
</tr>

DELIMETER;

echo $category;


    }

}

function show_under_categories_in_admin_size(){
    $supplier_id = $_GET['supplier_id'];
    $query = "SELECT * FROM variations WHERE supplier_id = ".escape_string($supplier_id)."  AND type = 'S' ";
    $category_query = query($query);
    confirm($query);

    while($row = fetch_array($category_query)) {

        $ps_id   = $row['ps_id'];
        $variation = $row['variation_name'];
        $product_id = $row['product_id'];

        $sql = query("SELECT * FROM products WHERE product_id = ".escape_string($product_id)." ");
        $results = ($sql);

        if(row_count($results)) {
            $row = fetch_array($results);
            $product_title = $row['product_title'];

            $category = <<<DELIMETER

<tr>
    <th>{$ps_id}</th>
    <th>{$product_title}</th>
    <th>{$variation}</th>
    <td><a class="btn btn-danger" href="../../resources/templates/back/delete_under_category.php?ps_id=$ps_id&supplier_id=$supplier_id"><span class="glyphicon glyphicon-remove"></span></a></td>
</tr>
    
DELIMETER;

echo $category;

        }

    }

}

function show_under_categories_in_admin_color(){
    $supplier_id = $_GET['supplier_id'];
    $query = "SELECT * FROM variations WHERE supplier_id = ".escape_string($supplier_id)."  AND type = 'C' ";
    $category_query = query($query);
    confirm($query);

    while($row = fetch_array($category_query)) {

        $ps_id   = $row['ps_id'];
        $variation = $row['variation_name'];
        $product_id = $row['product_id'];

        $sql = query("SELECT * FROM products WHERE product_id = ".escape_string($product_id)." ");
        $results = ($sql);

        if(row_count($results)) {
            $row = fetch_array($results);
            $product_title = $row['product_title'];

        $category = <<<DELIMETER

<tr>
    <th>{$ps_id}</th>
    <th>{$product_title}</th>
    <th>{$variation}</th>
    <td><a class="btn btn-danger" href="../../resources/templates/back/delete_under_category.php?pc_id=$ps_id&supplier_id=$supplier_id"><span class="glyphicon glyphicon-remove"></span></a></td>
</tr>
    
DELIMETER;

echo $category;

        }




    }

}
function selectucid($uc_id) {
    $sql = "SELECT product_title FROM products WHERE uc_id = '$uc_id' ";
    $result = query($sql);
    $row = fetch_array($result);

    $product_title = $row['product_title'];
    return $product_title;
}

function show_under_categories_in_admin(){

    $query = "SELECT * FROM under_categories";
    $category_query = query($query);
    confirm($query);

    while($row = fetch_array($category_query)) {

        $cat_id    = $row['uc_id'];
        $cat_title = $row['uc_name'];
        $uc_id = $row['uc_id'];

        
        $prducid = selectucid($uc_id);
        if($prducid != '') {
            $prducid = selectucid($uc_id);
        } else {
            $prducid = "No Products Available";
        }

// <td><a class="btn btn-danger" href="../../resources/templates/back/delete_under_category.php?id={$row['uc_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
        $category = <<<DELIMETER

<tr>
    <th>{$cat_id}</th>
    <th>{$cat_title}</th>
    <th>{$prducid}</th>
</tr>
    
DELIMETER;

echo $category;


    }

}
function add_category() {


    if(isset($_POST['add_category'])) {

    $cat_title = escape_string($_POST['cat_title']);

        if(empty($cat_title) || $cat_title == " ") {
            
            echo "<h3><p class='bg-danger text-center'>This cannot be empty</p></h3>";

        } else {

            if(category_exist($cat_title)) {

                         set_message ("<div class='alert alert-danger alert-dismissible' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                     <span aria-hidden='true'>&times;</span>
                                </button>
                                 <strong>Category</strong> already exist
                              </div>");
                       
                
            } else {

            $insert_cat = query("INSERT INTO categories (cat_title) VALUES ('{$cat_title}') ");
            confirm($insert_cat);

                                    set_message ("<div class='alert alert-success alert-dismissible' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                     <span aria-hidden='true'>&times;</span>
                                </button>
                                 <strong>Category</strong> added
                              </div>");
                                       
            }
        }
    }
}
function add_size() {


    if(isset($_POST['add_size'])) {

    $size_name = escape_string($_POST['size_name']);

        if(empty($size_name) || $size_name == " ") {
            
            echo "<h3><p class='bg-danger text-center'>This cannot be empty</p></h3>";

        } else {

            if(size_exist($size_name)) {

                         set_message ("<div class='alert alert-danger alert-dismissible' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                     <span aria-hidden='true'>&times;</span>
                                </button>
                                 <strong>Size</strong> already exist
                              </div>");
                       
                
            } else {

            $insert_cat = query("INSERT INTO size (size_name) VALUES ('{$size_name}') ");
            confirm($insert_cat);

                                    set_message ("<div class='alert alert-success alert-dismissible' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                     <span aria-hidden='true'>&times;</span>
                                </button>
                                 <strong>Size</strong> added
                              </div>");
                                       
            }
        }
    }
}

function add_color() {


    if(isset($_POST['add_color'])) {

    $color_name = escape_string($_POST['color_name']);

        if(empty($color_name) || $color_name == " ") {
            
            echo "<h3><p class='bg-danger text-center'>This cannot be empty</p></h3>";

        } else {

            if(color_exist($color_name)) {

                         set_message ("<div class='alert alert-danger alert-dismissible' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                     <span aria-hidden='true'>&times;</span>
                                </button>
                                 <strong>Color</strong> already exist
                              </div>");
                       
                
            } else {

            $insert_cat = query("INSERT INTO color (color_name) VALUES ('{$color_name}') ");
            confirm($insert_cat);

                                    set_message ("<div class='alert alert-success alert-dismissible' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                     <span aria-hidden='true'>&times;</span>
                                </button>
                                 <strong>Color</strong> added
                              </div>");
                                       
            }
        }
    }
}
/*****************************ADMIN USERS ***************************/
function display_users(){

    $query = "SELECT * FROM customers";
    $user_query = query($query);
    confirm($query);

    while($row = fetch_array($user_query)) {

        $user_id    = $row['user_id'];
        $username   = $row['username'];
        $email      = $row['email'];
        $password   = $row['password'];

$user = <<<DELIMETER

<tr>
    <td>{$user_id}</td>
    <td>{$username}</td>
    <td>{$email}</td>
    <td><a class="btn btn-danger" href="../../resources/templates/back/delete_user.php?id={$row['user_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
</tr>

DELIMETER;

echo $user;

    }



}

function display_supplier(){

    $query = "SELECT * FROM supplier";
    $user_query = query($query);
    confirm($query);

    while($row = fetch_array($user_query)) {

        $supplier_id    = $row['supplier_id'];
        $username       = $row['username'];
        $email_address  = $row['email_address'];
        $password       = $row['password'];
        $company_name   = $row['company_name'];

$user = <<<DELIMETER

<tr>
    <td>{$supplier_id}</td>
    <td>{$username}</td>
    <td>{$company_name}</td>
    <td>{$email_address}</td>
    <td><a class="btn btn-danger" href="../../resources/templates/back/delete_user.php?id={$row['supplier_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
</tr>

DELIMETER;

echo $user;

    }



}


function add_user() {
    if(isset($_POST['add_user'])) {

        $username   = escape_string($_POST['username']);
        $email      = escape_string($_POST['email']);
        $password   = escape_string($_POST['password']);
       /* $user_photo = escape_string($_FILES['file']['name']);
        $photo_temp = escape_string($_FILES['file']['tmp_name']);*/

   /*     move_uploaded_file($photo_temp, UPLOAD_DIRECTORY . DS .  $user_photo);*/

        $query = query("INSERT INTO admin(username,email,password ) VALUES ('{$username}','{$email}','{$password}')");

        confirm($query);
        set_message("User Created");

        redirect("index.php?users");

    }
}
function getsupplier($supplier_id) {

            $sql = "SELECT * FROM supplier WHERE supplier_id = '$supplier_id'  ";
            $result = query($sql);

            $row = fetch_array($result);
            $company_name = $row['company_name'];
            return $company_name;

}
function get_reports() {
    
        // $sql = "SELECT SUM(total_price) FROM ordered_products ";
        //   $result2 = query($sql);
        //   while($row = fetch_array($result2)){
        //     $total_price = $row['SUM(total_price)'];
        //   }

    $query = query("SELECT * FROM ordered_products");
    confirm($query);

    
    while ($row = fetch_array($query)) {
        $supplier_id = $row['supplier_id'];
        $company_name = getsupplier($supplier_id);
/*
        
    $category = show_product_category_title($row['product_category_id']);

    $product_image = display_image($row['product_image']);*/
    
$report = <<<DELIMETER
    <tr>
        <td>{$row['ord_id']}</td>
        <td>{$company_name}</td>
        <td>{$row['delivery_id']}</td>
        <td>{$row['product_title']}</td>
        <td>{$row['quantity']}</td>
        <td>{$row['date_ordered']}</td>
        <td>{$row['time_ordered']}</td>
        <td>{$row['total_price']}</td>
    </tr>      
DELIMETER;

echo $report;

    }

//     $report1 = <<<DELIMETER
//     <tr>
//        <td align="right" colspan="6">$total_price</td>
//     </tr>    
// DELIMETER;
// echo $report1;
}
/***********************************SLIDES FNCT *****************************/

function add_slides() {


    if(isset($_POST['add_slide'])) {

        $slide_title  = escape_string($_POST['slide_title']);
        $slide_image        = $_FILES['file']['name'];
        $slide_image_loc    = $_FILES['file']['tmp_name'];

        if(empty($slide_title) || empty($slide_image)) {

        echo "<p class='bg-danger'>This field cannot be empty</p>";


        } else {

            if(isset($_FILES['file'])) {

                

                move_uploaded_file($slide_image_loc, UPLOAD_DIRECTORY . DS . $slide_image);

            }

            $query = query("INSERT INTO slides(slide_title, slide_image) VALUES('{$slide_title}', '{$slide_image}')");
            confirm($query);
            set_message("Slide Added");
            redirect("index.php?slides");


        }

    }

}

function get_current_slide_in_admin(){

$query = query("SELECT * FROM slides ORDER BY slide_id DESC LIMIT 1");
confirm($query);

while($row = fetch_array($query)) {

$slide_image = display_image($row['slide_image']);

$slide_active_admin = <<<DELIMETER



    <img style="max-height: 350px; max-width: 900px"class="img-responsive" src="../../resources/{$slide_image}" alt="">



DELIMETER;

echo $slide_active_admin;


    }



}

function get_active_slide() {

 $query = query("SELECT * FROM slides ORDER BY slide_id DESC LIMIT 1");
    confirm($query);

    while($row = fetch_array($query)) {
        $slide_image = display_image($row['slide_image']);

        $slides_active = <<<DELIMETER

        <div class="item active">
            <img style="max-width: 900px; max-height: 350px;"class="slide-image" src="../resources/uploads/{$row['slide_image']}" alt="">
        </div>

DELIMETER;

echo $slides_active;
    }

}


function get_slides() {

    $query = query("SELECT * FROM slides");
    confirm($query);



    while($row = fetch_array($query)) {
        $slide_image = display_image($row['slide_image']);

        $slides = <<<DELIMETER

        <div class="item">
            <img style="max-width: 900px; max-height: 350px;" class="slide-image" src="../resources/uploads/{$row['slide_image']}" alt="">
        </div>

DELIMETER;

echo $slides;
    }


}

function get_slide_thumbnails(){


$query = query("SELECT * FROM slides ORDER BY slide_id ASC ");
confirm($query);

while($row = fetch_array($query)) {

$slide_image = display_image($row['slide_image']);

$slide_thumb_admin = <<<DELIMETER


<div class="col-xs-6 col-md-3 image_container">
    
    <a href="index.php?delete_slides_id={$row['slide_id']}">
        
         <img style="max-width: 350px; max-height: 100px;" class="img-responsive slide_image" src="../../resources/{$slide_image}" alt="">

    </a>

    <div class="caption">

    <p>{$row['slide_title']}</p>

    </div>


</div>


    



DELIMETER;

echo $slide_thumb_admin;


    }
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function itexmo($number,$message,$apicode){

        $url = 'https://www.itexmo.com/php_api/api.php';
        $itexmo = array('1' => $number, '2' => $message, '3' => $apicode);
        $param = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($itexmo),
            ),
        );
        $context  = stream_context_create($param);
        return file_get_contents($url, false, $context);

}

function validate_user_registration() {

    $errors = [];
        $min = 3;
        $max = 20;

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        
        $first_name         = clean($_POST['first_name']);
        $last_name          = clean($_POST['last_name']);
        $username           = clean($_POST['username']);
        $email              = clean($_POST['email']);
        $contact_number     = clean($_POST['contact_number']);
        $password           = clean($_POST['password']);
        $confirm_password   = clean($_POST['confirm_password']);
        $bpassword          = clean($_POST['password']);

        if (isset($_FILES['file'])) { 

            $profile                = $_FILES['file']['name'];
            $image_temp_location    = $_FILES['file']['tmp_name'];

            $upload = move_uploaded_file($image_temp_location  , UPLOAD_DIRECTORY_PROFILE . DS . $profile);

        }

        if(strlen($first_name) < $min) {
            $errors[] = "Your firstname cannot be less than {$min} characters";

        } 
        if(strlen($first_name) > $max) {
            $errors[] = "Your firstname cannot be greater than {$max} characters";

        } 
        if(strlen($last_name) < $min) {
            $errors[] = "Your lastname cannot be less than {$min} characters";

        } 
        if(strlen($last_name) > $max) {
            $errors[] = "Your lastname cannot be greater than {$max} characters";

        } 
        if(username_exists($username)) {

            $errors[] = "Sorry the username is already exist";
        }

        if(email_exists($email)) {

            $errors[] = "Sorry email already registered";
        }

        if($password !== $confirm_password) {
            $errors[] = "Your password fields do not match";
        }
 
        if (!empty($errors)) {

            foreach ($errors as $error) {
            echo validation_errors($error);

            } 

        } else {

             $incemail = md5($email);
             if (register_user($first_name, $last_name , $username , $email ,$contact_number ,$password, $profile, $bpassword)) {
                // set_message("<p><a class='bg-success text-center' href='activate.php' style='font-size: 15px;color: black;'>We sent a verification code to your mobile number, click this link to activate your account.</a></p>");
                redirect ("activate.php?em=$incemail");
                        
            } else {

                set_message("<p class='bg-danger text-center'>Sorry we could not register the user</p>");
                redirect ("register.php");
            }

        }//post request*/
    }//function
}
function generatePIN($digits = 4){
    $i = 0; //counter
    $pin = ""; //our default pin is blank.
    while($i < $digits){
        //generate a random number between 0 and 9.
        $pin .= mt_rand(0, 9);
        $i++;
    }
    return $pin;
}
//If I want a 4-digit PIN code.
$pin = generatePIN();

function register_user($first_name, $last_name , $username , $email ,$contact_number ,$password, $profile, $bpassword) {

    $first_name     = escape_string($first_name);
    $last_name      = escape_string($last_name);
    $username       = escape_string($username);
    $email          = escape_string($email);
    $number         = escape_string($contact_number);
    $password       = escape_string($password);
    $bpassword      = escape_string($bpassword);
    $profile        = $profile;
    $name           = "Welcome to Shop Buddy! ";
    $api            = "TR-HOMEL560423_KUGEL";

    if(email_exists($email)) {

        return false;

    } elseif (username_exists($username)) {

        return false;

    } else {

        $password = md5($password);
        $pin = generatePIN();
        $validation_code = $pin;
        $text = $name . "Here is your validation code ". $validation_code;

        $sql = "INSERT INTO customers (first_name , last_name , username, email, contact_number,password, bpassword, validation_code, profile, active)";
        $sql.= " VALUES('$first_name','$last_name', '$username','$email','$contact_number','$password','$bpassword','$validation_code', '$profile', '0')";

        $result = query($sql);

        $result = itexmo($number,$text,$api);

        if ($result == ""){
        echo "iTexMo: No response from server!!!
        Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.  
        Please CONTACT US for help. ";  
        } else if ($result == 0){
        echo "Message Sent!";
        }
        else{   
        echo "Error Num ". $result . " was encountered!";
        
        }
        
        $subject = "Activate Account";
        $msg = "Please click the link below to activate your account

        http://localhost/shopbuddy/public/activatesupplier.php?email=$email&validation=$validation_code";

        $header = "From: noreply@yourwebsite.com";

        send_email($email, $subject, $msg, $headers);
        return true;
    }

}


function validate_supplier_registration() {

    $errors = [];
        $min = 3;
        $max = 20;

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        
        $company_name         = clean($_POST['company_name']);
        $email_address        = clean($_POST['email_address']);
        $contact_number       = clean($_POST['contact_number']);
        $address              = clean($_POST['address']);
        $username             = clean($_POST['username']);
        $password             = clean($_POST['password']);
        $confirm_password     = clean($_POST['confirm_password']);
      

        if(email_add_exists($email_address)) {

            $errors[] = "Sorry email already registered";
        }

        if($password !== $confirm_password) {
            $errors[] = "Your password fields do not match";
        }
 
        if (!empty($errors)) {

            foreach ($errors as $error) {
            echo validation_errors($error);

            } 

        } else {


             if (register_supplier($company_name, $email_address , $contact_number,$address,$username, $password)) {
                
                  set_message ("<div class='alert alert-success alert-dismissible' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                     <span aria-hidden='true'>&times;</span>
                                </button>
                                <strong>Please</strong> check your email or spam folder for activation link
                               </div>");
                redirect ("supplierregister.php");   
            } else {
                set_message ("<div class='alert alert-danger alert-dismissible' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                     <span aria-hidden='true'>&times;</span>
                                </button>
                                 <strong>Sorry</strong> we could not register the supplier
                              </div>");
                redirect ("supplierregister.php");
            }

        }//post request*/
    }//function
}

function register_supplier($company_name, $email_address , $contact_number,$address,$username, $password) {

    $company_name         = escape_string($_POST['company_name']);
    $email_address        = escape_string($_POST['email_address']);
    $contact_number       = escape_string($_POST['contact_number']);
    $address              = escape_string($_POST['address']);
    $username             = escape_string($_POST['username']);
    $password             = escape_string($_POST['password']);
    $confirm_password     = escape_string($_POST['confirm_password']);

    if(email_exists($email)) {

        return false;

    } elseif (username_exists($username)) {

        return false;

    } else {

        $password = md5($password);
        $validation_code = md5($username . microtime());

        $sql = "INSERT INTO supplier (company_name , email_address , contact_number, address, username ,password, validation_code, active)";
        $sql.= " VALUES('$company_name','$email_address', '$contact_number','$address','$username','$password','$validation_code','0')";

        $result = query($sql);
        
        $subject = "Activate Account";
        $msg = "Please click the link below to activate your account

        http://localhost/shopbuddy/public/activatesupplier.php?email=$email_address&code=$validation_code";

        $header = "From: noreply@yourwebsite.com";

        send_email($email_address, $subject, $msg, $headers);
        return true;
    }

}
function activate_supplier() {

    if($_SERVER['REQUEST_METHOD'] == "GET") {

        if(isset($_GET['email'])) {
            echo $email = clean($_GET['email']);
            echo $validation_code = clean($_GET['code']);

            $sql = "SELECT supplier_id FROM supplier WHERE email_address = '".escape_string($_GET['email'])."' AND validation_code = '".escape_string($_GET['code'])."' ";
            $result = query($sql);
        
            if(row_count($result) == 1) {

                $sql2 = "UPDATE supplier SET active = 1, validation_code = 0 WHERE email_address= '".escape_string($email)."' AND validation_code ='".escape_string($validation_code)."' ";
                $result2 = query($sql2);
                confirm($result2);

                set_message("<p class='bg-success'> YOUR ACCOUNT HAS BEEN ACTIVATED PLEASE LOGIN </p>");
                redirect("login.php");

            }  else {
                set_message("<p class='bg-danger'> SORRY YOUR ACCOUNT COULD NOT BE ACTIVATED </p>");
                redirect("login.php");

            }
        
        }

    }

}

function activate_user() {

    if($_SERVER['REQUEST_METHOD'] == "GET") {

        if(isset($_GET['email'])) {
            $email = clean($_GET['email']);
            $validation_code = clean($_GET['validation']);

            $sql = "SELECT user_id FROM customers WHERE email = '".escape_string($_GET['email'])."' AND validation_code = '".escape_string($_GET['validation'])."' ";
            $result = query($sql);
        

            if(row_count($result) == 1) {

                $sql2 = "UPDATE customers SET active = 1, validation_code = 0 WHERE email= '".escape_string($email)."' AND validation_code ='".escape_string($validation_code)."' ";
                $result2 = query($sql2);
                confirm($result2);
    
                echo '<script>';
                echo 'alert("Your Account Has Been Activated.");';
                echo 'self.location = "login.php";';
                echo '</script>';


            }  else {
                set_message("<div class='alert alert-danger alert-dismissible' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                     <span aria-hidden='true'>&times;</span>
                                </button>
                                 <strong>Sorry</strong> Cannot Activate Your Account
                              </div>");
                redirect("login.php");

            }
        
        }

    }

}

function validate_user_login() {

    $errors = [];
        $min = 3;
        $max = 20;

    if($_SERVER['REQUEST_METHOD'] == "POST") {
    
        $email          = clean($_POST['email']);
        $password       = clean($_POST['password']);
        $remember       = isset($_POST['remember']);

        if(empty($email)) {
            $errors[] = "Email field cannot be empty";
        }

        if(empty($password)) {
            $errors[] = "Password field cannot be empty";
        }


        if (!empty($errors)) {

            foreach ($errors as $error) {
            echo validation_errors($error);

            } 

        } else {

            if(login_user($email, $password, $remember)) {
                $_SESSION['email'] = $email;
                redirect("index.php");
            } else {
                echo validation_errors("Your credentials are not correct");

        }

        }
    }
}

/********************************USER LOGIN FNCTN***************************/

function login_user($email, $password, $remember) {

    $sql = "SELECT password, user_id, username FROM customers WHERE email = '".escape_string($email)."' AND active = 1";
    $result = query($sql);

    if(row_count($result) == 1) {

        $row = fetch_array($result);

        $db_password = $row['password'];

        if(md5($password) === $db_password) {


            if($remember == "on") {

                setcookie('email', $email, time() + 86400);
            }

            $_SESSION['email']   = $email;

    
            return true;

        } else {

            return false;
        }

        return true;

    } else {

        return false;

    }

}// end of function
/********************************logged in FNCTN***************************/

function validate_supplier_login() {

    $errors = [];
        $min = 3;
        $max = 20;

    if($_SERVER['REQUEST_METHOD'] == "POST") {
    
        $email_address  = clean($_POST['email_address']);
        $password       = clean($_POST['password']);
        $remember       = isset($_POST['remember']);

        if(empty($email_address)) {
            $errors[] = "Email field cannot be empty";
        }

        if(empty($password)) {
            $errors[] = "Password field cannot be empty";
        }


        if (!empty($errors)) {

            foreach ($errors as $error) {
            echo validation_errors($error);

            } 

        } else {

            if(login_supplier($email_address, $password, $remember)) {
               
                redirect("admin/supplierindex.php");
            } else {
                echo validation_errors("Your credentials are not correct");

        }

        }
    }
}

function login_supplier($email_address, $password, $remember) {

    $sql = "SELECT password, supplier_id, company_name FROM supplier WHERE email_address = '".escape_string($email_address)."' AND active = 1";
    $result = query($sql);


    if(row_count($result) == 1) {

        $row = fetch_array($result);

        $db_password     = $row['password'];
        
        if(md5($password) === $db_password) {


            if($remember == "on") {

                setcookie('email', $email_address, time() + 86400);
            }

            $_SESSION['email_address']   = $email_address;

      
    
            return true;

        } else {

            return false;
        }

        return true;

    } else {

        return false;

    }

}

function logged_in() {

    if(isset($_SESSION['email']) || isset($_COOKIE['email'])) {

        return true;

    } else {

        return false;
    }
}//////////////////
function mobilenumber($email) {

    $sql = "SELECT contact_number FROM customers WHERE email = '$email' ";
    $result = query($sql);
    $row = fetch_array($result);
    $contact = $row['contact_number'];
    return $contact;

}

function recover_password() {

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        if(isset($_SESSION['token']) && $_POST['token'] === $_SESSION['token']) {
                
                $email = clean($_POST['email']); 

                $number = mobilenumber($email);

                if(!empty($_POST['email']) && email_exists($email)) {

                $pin = generatePIN();

                $validation_code = $pin;

                setcookie('temp_access_code', $validation_code, time()+ 900);

                $sql = "UPDATE customers set validation_code = '".escape_string($validation_code)."'  WHERE email='".escape_string($email)."'";
                $result = query($sql);
                
                $name           = "Welcome to Shop Buddy! ";
                $api            = "TR-HOMEL560423_KUGEL";

                $text = $name . "Here is your password reset code ".$validation_code.".";

                $result = itexmo($number,$text,$api);

                if ($result == ""){
                echo "iTexMo: No response from server!!!
                Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.  
                Please CONTACT US for help. ";  
                } else if ($result == 0){
                echo "Message Sent!";
                }
                else{   
                echo "Error Num ". $result . " was encountered!";
                
                }
//                 $subject = "Please reset your password";        
//                 $message = "Here is your password reset code {$validation_code}
// Click here to reset your password http://localhost/shopbuddy/public/code.php?email=$email&code=$validation_code 
//                 ";

//                 $headers = "From: noreply@yourwebsite.com";
            
//                 send_email($email, $subject, $message, $headers);

                set_message("<p class = 'bg-success text-center'>Please check your email or spam folder for a password reset code.</p>");
                
                redirect("login.php");

                } else {

                echo validation_errors("This email does not exist");
            
                }       

        
        } else {

            redirect("index.php");
            
        }

        if(isset($_POST['cancel_submit'])) {
            redirect("login.php");
        }
    }
}

function validate_code() {

    if(isset($_COOKIE['temp_access_code'])) {

            if(!isset($_GET['email']) && !isset($_GET['code'])) {

                redirect("index.php");

            } else if (empty($_GET['email']) || empty($_GET['code'])) {

                redirect("index.php");

            } else {

                if(isset($_POST['code'])) {

                    $email = clean($_GET['email']);

                    $validation_code = clean($_POST['code']);
                    $sql ="SELECT user_id FROM customers WHERE validation_code = '".escape_string($validation_code)."' AND email='".escape_string($email)."'";
                    $result= query($sql);

                    if(row_count($result) == 1) {

                        setcookie('temp_access_code', $validation_code, time() + 18000);

                        redirect("reset.php?email=$email&code=$validation_code");
                    } else {
                        echo validation_errors("Sorry wrong validation code");
                    }

                }

            }
        ///

    } else {
        set_message("<p class='bg-danger text-center'>Sorry your validation cookie was expired.</p>");
        redirect("recover.php");
        
    }
} 

function password_reset() {

    if(isset($_COOKIE['temp_access_code'])) { 

        if(isset($_GET['email']) && isset($_GET['code'])) {

            if(isset($_SESSION['token']) && isset($_POST['token']))  {

                if($_POST['token'] === $_SESSION['token']) {

                    if($_POST['password'] === $_POST['confirm_password']) {

                            $updated_password = md5($_POST['password']);

                            $sql = "UPDATE customers SET password = '".escape_string($updated_password)."', validation_code = 0 WHERE email = '".escape_string($_GET['email'])."'";
                            query($sql);

                        set_message("<p class='bg-success text-center'>Your password have been updated.</p>");

                        redirect("login.php");

                    }

                }

            }

        } 

    } else {
        set_message("<p class='bg-danger text-center'>Sorry your time has expired.</p>");
        redirect("recover.php");

    }

}

////////////////////////////////TRYING TO ECHO MODAL ///////////////////////////////////////////

function modal() {
    $SHOW = <<<DELIMETER
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login First</h4>
        </div>
        <div class="modal-body">

              <div class="row">
            
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="login.php" class="active" id="login-form-link">Login</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="register.php" id="">Register</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="login-form"  method="post" role="form" style="display: block;">
                                    <div class="form-group">
                                        <input type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="login-
                                        password" tabindex="2" class="form-control" placeholder="Password" required>
                                    </div>
                                    <div class="form-group text-center">
                                        <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                        <label for="remember"> Remember Me</label>

                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <a href="recover.php" tabindex="5" class="forgot-password">Forgot Password?</a> &nbsp;&nbsp;&nbsp;&nbsp;

                                                    <a href="register.php" tabindex="5" class="forgot-password">Register Here</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
DELIMETER;
    echo $SHOW;
}
//////////////////////////////////////////GET EMAIL///////////////////////////////////////////////////////

function get_email() {

    if(isset($_SESSION['email'])) {

        $email = $_SESSION['email'];
      
        $sql = "SELECT profile ,username FROM customers WHERE email = '".escape_string($email)."' ";
        $result = query($sql);
        $email = strtoupper($email);


        if(row_count($result) == 1) {

            $row = fetch_array($result);
            $profile = display_profile($row['profile']);
        

$get_email = <<<DELIMETER
    
                <li class="upper-links dropdown">
                <img src="../resources/$profile" alt="Avatar" style="max-width:25px; max-height:20px; border-radius: 50%;">
                    <a class="links" href="#">$email</a>
                    <ul class="dropdown-menu">
                        <li class="profile-li" data-toggle="modal" data-target="#myModal"><a class="profile-links" href="#">My Account</a></li>
                        <li class="profile-li"><a class="profile-links" href="logout.php">Logout</a></li>
                    </ul>
                </li>
                  
DELIMETER;
echo $get_email;   
        }
    }
}    
/////////////////////////////////////INSERT ID INTO DATABASE FOR MULTIPLE USERS///////////////////////////////
function echo_user_id($db_user_id) {

    if(isset($_SESSION['email'])) {

        $email = $_SESSION['email'];

        $sql = "SELECT user_id FROM customers WHERE email = '".escape_string($email)."' ";
        $result = query($sql);

        if(row_count($result) == 1) {

            $row = fetch_array($result);
            $db_user_id = $row['user_id'];
            // echo $db_user_id;       
            return $db_user_id; 
        } else {

            return false;
            echo "GG2";
        }


    } else {
        echo "Login First";
    }

}
//
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
function count_approve(){

    if(isset($_SESSION['email'])) {

        $email = $_SESSION['email'];

        $sql = "SELECT user_id FROM customers WHERE email = '".escape_string($email)."' ";
        $result = query($sql);

        if(row_count($result) == 1) {

            $row = fetch_array($result);
            $db_user_id = $row['user_id'];

            $query = query("SELECT count(1) FROM delivery WHERE user_id = ". escape_string($db_user_id)."");
            confirm($query);

            $row = fetch_array($query);
            $total = $row[0];
            echo  $total;

        } 

    } else {

        echo "0";
        
    }

}
function count_orders(){

    if(isset($_SESSION['email'])) {

        $email = $_SESSION['email'];

        $sql = "SELECT user_id FROM customers WHERE email = '".escape_string($email)."' ";
        $result = query($sql);

        if(row_count($result) == 1) {

            $row = fetch_array($result);
            $db_user_id = $row['user_id'];

            $query = query("SELECT count(1) FROM temporder WHERE user_id = ". escape_string($db_user_id)." ");
            confirm($query);

            $row = fetch_array($query);
            $total = $row[0];
            echo  $total;

        } 

    } else {

        echo "0";
        
    }

}
function count_total_orders($total_row){

    if(isset($_SESSION['email'])) {

        $email = $_SESSION['email'];

        $sql = "SELECT user_id FROM customers WHERE email = '".escape_string($email)."' ";
        $result = query($sql);

        if(row_count($result) == 1) {

            $row = fetch_array($result);
            $db_user_id = $row['user_id'];

            $query = query("SELECT count(1) FROM temporder WHERE user_id = ". escape_string($db_user_id)." ");
            confirm($query);

            $row = fetch_array($query);
            $total_row = $row[0];
            return  $total_row;

        } 

    } else {

        echo "0";
        
    }

}

function get_product_total_price_sum() {

    if(isset($_SESSION['email'])) { 

        $email = $_SESSION['email'];

        $sql = "SELECT user_id FROM customers WHERE email = '".escape_string($email)."' ";
        $result = query($sql);

        if(row_count($result) == 1) {

            $row = fetch_array($result);
            $db_user_id = $row['user_id'];

            $query = query("SELECT SUM(product_total_price) FROM temporder WHERE user_id = ".escape_string($db_user_id)." ");
            confirm($query);

            $row = fetch_array($query);

            $sum = $row[0];

            echo number_format(round($sum, 2));
      } else {
        echo "0";
      }
  }

}
function get_product_total_price_sum_shipping() {

    if(isset($_SESSION['email'])) { 

        $email = $_SESSION['email'];

        $sql = "SELECT user_id FROM customers WHERE email = '".escape_string($email)."' ";
        $result = query($sql);

        if(row_count($result) == 1) {

            $row = fetch_array($result);
            $db_user_id = $row['user_id'];

            $query = query("SELECT SUM(product_total_price) FROM temporder WHERE user_id = ".escape_string($db_user_id)." ");
            confirm($query);

            $row = fetch_array($query);

            $sum = $row[0];

            if($sum > 500) {
                echo "Free Shipping";
            } else {
                echo "500 Shipping Fee";
            }
      } else {
        echo "0";
      }
  }

}



function get_qty_sum() {

    if(isset($_SESSION['email'])) { 

        $email = $_SESSION['email'];

        $sql = "SELECT user_id FROM customers WHERE email = '".escape_string($email)."' ";
        $result = query($sql);

        if(row_count($result) == 1) {

            $row = fetch_array($result);
            $db_user_id = $row['user_id'];

            $query = query("SELECT SUM(quantity) FROM temporder WHERE user_id = ".escape_string($db_user_id)." ");
            confirm($query);

            $row = fetch_array($query);

            $sum = $row[0];

            echo $sum;
      } else {
        echo "0";
      }
  }

}


function get_approved_orders() {
    
    if(isset($_SESSION['email'])) {
    $sql = "SELECT user_id FROM customers WHERE email = '".$_SESSION['email']."' ";
    $results = query($sql);

  

         if(row_count($results) == 1) {  

            $row = fetch_array($results);
            $user_id = $row['user_id'];  

            $sql1 = "SELECT * FROM delivery";
        //     $sql = query("SELECT * FROM delivery");
        //     confirm($sql);

        //     while ($row = fetch_array($sql)) {
        //         $stats = $row['active'];
        //         $delid = $row['delivery_id'];
        //         if($stats = 1) {
        //             $status = "ON PROCESS";
        //         } elseif($stats = 3) {
        //             $status = "DELIVERED";
        //         }


        //     }
        }
    } else {
        echo "<h4 class='text-center' style='color: black'>Login First</h>";
    }

}
 

function get_orders() {

    if(isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
    }

    $sql = "SELECT user_id FROM customers WHERE email = '".escape_string($email)."' ";
    $result = query($sql);

    if(row_count($result) == 1) {

        $row = fetch_array($result);
        $db_user_id = $row['user_id'];

        $query = query("SELECT * FROM temporder WHERE user_id = '".escape_string($db_user_id)."' ");
        confirm($query);

        while ($row = fetch_array($query)) {

            $qty = $row['quantity'];
            $product_image = display_image($row['product_image']);  

            $get_orders = <<<DELIMETER
            <td>
                <a href="item.php?id={$row['product_id']}"><img style="max-height: 50px; max-width: 100px;" src="../resources/{$product_image}" alt="">
                </a>
                <a style= "font-size: 12px;"href=item.php?id={$row['product_id']}>{$row['product_title']}
                </a>
            </td>
            <td>
                $qty
            </td>
            <td>
                <h5>
                    <span class="price">&#8369;{$row['product_price']}</span>
                </h5>
            </td>


DELIMETER;

echo $get_orders;

        } 

    }
 
}


function get_sum() {

    if(isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
    }

    $sql = "SELECT user_id FROM customers WHERE email = '".escape_string($email)."' ";
    $result = query($sql);

    if(row_count($result) == 1) {

        $row = fetch_array($result);
        $db_user_id = $row['user_id'];

    $query = query("SELECT SUM(product_total_price) FROM temporder WHERE user_id = '".escape_string($db_user_id)."'");
    confirm($query);

    $row = fetch_array($query);

    $sum = $row[0] + $_GET['shp'];
    $sum = number_format($sum, 2, '.', ' ');
    echo "&#8369;$sum";

    }

}

function delete_cart() {

      $sql = "DELETE FROM temporder WHERE product_id=" . escape_string($_GET['delete']). " ";
      $results = query($sql);
}


function echo_submit() {

    if(isset($_POST["submit"])) {
        
    set_message("<p class='bg-success' style='
    color: black;'>New Product was added, Wait for admin to confirm your product.</p>");
    

}

}

function save($table , $fields, $values) {
    $sql = "INSERT INTO $table ($fields) VALUES ($values)";
    $result = query($sql);
    if($result) {
        return last_id();
    } else {
        return "Error $results -> $sql";
    }
}

function isGmail($email) {

    $email = trim($email); // in case there's any whitespace
    return mb_substr($email, -10) === '@gmail.com';
}

?>
