
<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      // echo $_POST["employee_id"]; 
      $connect = mysqli_connect("127.0.0.1", "root", "", "test"); 
      $query = "SELECT * FROM delivery LEFT join ordered_products on ordered_products.delivery_id = delivery.delivery_id WHERE delivery.delivery_id = '".$_POST['employee_id']."' ";  
      $result = mysqli_query($connect, $query);
      $drow = mysqli_fetch_array($result);

      $prov         = $drow['province'];
      $municipality = $drow['municipality'];

      function province($prov) {

        $connect = mysqli_connect("127.0.0.1", "root", "", "test"); 
        $query = "SELECT * FROM province WHERE add_id = '$prov' ";  
        $result = mysqli_query($connect, $query);
        $drow = mysqli_fetch_array($result);
        $province = $drow['province'];
        return $province;
      }

      function city($municipality) {

        $connect = mysqli_connect("127.0.0.1", "root", "", "test"); 
        $query = "SELECT * FROM municipality WHERE mn_id = '$municipality' ";  
        $result = mysqli_query($connect, $query);
        $drow = mysqli_fetch_array($result);
        $municipality = $drow['mn_name'];
        return $municipality;

      }
      
      echo '
      <div class="container-fluid">
        <div class="col-md-6">
          <b>RECEIVER (BILL TO):</b><br>
          Full Name : <strong>'.$drow["full_name"].'</strong><br> 
          Billing Address : <strong>'.$drow["address"].'</strong><br>
          Email : <strong>'.$drow["email"].'</strong><br>
          Contact : <strong>'.$drow["contact_number"].'</strong><br>
          Barangay : <strong>'.$drow["brgy"].'</strong><br> 
        </div>
        <div class="col-md-6">
          Municipality / City : <strong>'.city($municipality).'</strong><br>
          Province : <strong>'.province($prov).'</strong><br>
          Landmark : <strong>'.$drow["landmark"].'</strong><br>
          Zip : <strong>'.$drow["zip"].'</strong><br>
          Note : <strong>'.$drow["note"].'</strong><br>   
        </div>
      </div>
      <div class="container-fluid">
      ';


      $output .= '
      <div class="table-responsive">  
           <table width="100%" cellpadding="5">
           <table id="employee_data" class="table table-striped table-bordered">
           <thead>
                <th>Action</th>
                <th>Product Name</th>
                <th>Color</th>
                <th>Size</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Price</th>
              </thead>';  
      $query = "SELECT * FROM ordered_products WHERE delivery_id = '".$_POST['employee_id']."' "; 
      $result1 = mysqli_query($connect, $query);

      while($row = mysqli_fetch_array($result1))

      {  
        $ord_id      = $row['ord_id'];
        $product_id  = $row['product_id'];
        $delivery_id = $row['delivery_id'];
        $color       = $row['color'];
        $size        = $row['size'];
        $status = $row['status'];
        $product_title = $row["product_title"];
        $quantity = $row["quantity"];
        $total_price = $row['total_price'];
          if($status == 0) {
          $stats = "PROCESS";
          $btn = '<a type="button" href="cancel.php?canA='.$ord_id.'&prid='.$product_id.'&delid='.$delivery_id.'" class="btn btn-default btn-sm approve_product">Cancel<i class="fa fa-times fa-fw"></i></a></a>';
          } elseif ($status == 1) {
          $stats = "APPROVED";
          $btn = '';
          } elseif ($status == 2) {
          $stats = "DISPATCHED";
          $btn = '';
          } elseif ($status == 3) {
          $stats = "DELIVERED";
          $btn = '';
          }
          if($color == '') {
            $color = "N/A";
          }
          if($size == '') {
            $size = "N/A";
          }
          $sql = "SELECT SUM(total_price) FROM ordered_products WHERE delivery_id = ".$_POST["employee_id"]." ";
          $result2 = mysqli_query($connect, $sql);
          while($row = mysqli_fetch_array($result2)){
            $sub = $row["SUM(total_price)"];

            // $total = number_format($sub,2);
            if($sub >= 500) {
              $shp = "Free";
              $total = $shp + $sub;
              $overall = number_format($total,2);
            } else {
              $shp = 500;
              $overall = $shp + $sub;
            }
          }
           $output .= '
              <tbody>
                <tr>
                  <td>'.$btn.'</td> 
                  <td>'.$product_title.'</td>  
                  <td>'.$color.'</td> 
                  <td>'.$size.'</td>                        
                  <td>'.$quantity.'</td>
                  <td>'.$stats.'</td>
                  <td>'.$total_price.'</td>                  
                </tr>';
                     
          }
            $output .=' 
                <tr>
                  <td align="right" colspan="6"><strong>Shipping Fee</strong></td>
                  <td align="right">'.$shp.'<strong></strong></td>
                </tr>';
            $output .=' 
                <tr>
                  <td align="right" colspan="6"><strong>Total</strong></td>
                  <td align="right">'.$overall.'<strong></strong></td>
                </tr></tbody></table></div></div>'; 
      }  
      $output .= "</tbody></table></div></div>";  
      echo $output;  
 ?>

