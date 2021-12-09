<?php 

if(isset($_POST['customer_id'])) {
    $output = '';
    $connect = mysqli_connect("127.0.0.1", "root", "" , "test");
    $query = "SELECT * FROM delivery LEFT join ordered_products on ordered_products.delivery_id = delivery.delivery_id WHERE delivery.delivery_id = '".$_POST['customer_id']."' ";
    $results = mysqli_query($connect , $query); 

    $output .= '
    <div class="table-responsive">
        <table class="table table-bordered">';
    while($row = mysqli_fetch_array($results)) {

        $output .= '
            <tr>
                <td><label>Name</label></td>
                <td><label>'.$row['delivery_id'].'</label></td>
            </tr>
        ';
    }
}

?>

