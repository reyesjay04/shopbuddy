
<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $employee_id = $_POST["employee_id"];    
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
      <div id="printThisToo">
      <br>
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
          Municipality : <strong>'.city($municipality).'</strong><br>
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
                <th>Quantity</th>
                <th>Status</th>
                <th>Price</th>
           </thead>'; 
      $total = 0; 
      $query = "SELECT * FROM ordered_products WHERE delivery_id = '".$_POST['employee_id']."' "; 
      $result1 = mysqli_query($connect, $query);
      while($row = mysqli_fetch_array($result1)) {  

          $status = $row['status'];
          $product_title = $row["product_title"];
          $quantity = $row["quantity"];
          $product_price = $row['total_price'];
          $ord_id = $row['ord_id'];
          $pricedec = number_format($product_price,2);
          if($status == 0) {
          $stats = "PENDING";
          $btn = '<a id="printPageButton2" type="button" href="approve.php?id='.$ord_id.'" class="btn btn-default btn-sm approve_product">Approve <i class="fa fa-thumbs-up" style="font-size: 15px"></i></a></a>';
          } elseif ($status == 1) {
          $stats = "APPROVED";
          $btn = '<a id="printPageButton2" type="button" href="approve.php?dis='.$ord_id.'" class="btn btn-default btn-sm approve_product">Dispatch<i class="fa fa-truck fa-fw" style="font-size: 15px"></i></a></a>';
          } elseif($status == 2) {
          $stats = "DISPATCHED";
          $btn = '<a id="printPageButton2" type="button" href="approve.php?del='.$ord_id.'" class="btn btn-default btn-sm approve_product">Delivered<i class="fa fa-check fa-fw" style="font-size: 15px"></i></a></a>';
          } elseif($status == 3) {
          $stats = "DELIVERED";
          $btn = '<a id="printPageButton2" type="button" class="btn btn-default btn-sm approve_product">Complete <i class="fa fa-flag fa-fw" style="font-size: 15px"></i></a></a>';
          }              
          $sql = "SELECT SUM(total_price) FROM ordered_products WHERE delivery_id = $employee_id ";
          $result2 = mysqli_query($connect, $sql);
          while($row = mysqli_fetch_array($result2)){

            $sub = $row["SUM(total_price)"];
            $total = number_format($sub,2);

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
                  <td id="">'.$btn.'</th>
                  <td>'.$product_title.'</th>                         
                  <td>'.$quantity.'</th>
                  <td>'.$stats.'</th>
                  <td>'.$pricedec.'</th>
                </tr>
                ';  
      }  
            $output .=' <tr>
                  <td align="right" colspan="4"><strong>Shipping Fee</strong></td>
                  <td align="right">'.$shp.'<strong></strong></td>
                  </tr>';
            $output .=' <tr>
                  <td align="right" colspan="4"><strong>Total</strong></td>
                  <td align="right">'.$overall.'<strong></strong></td>
                  </tr></tbody></table></div></div></div><br><br>';   
      echo $output;  
 } 
 ?>
 <script type="text/javascript">
 $(document).ready(function () {
   $("[id*='employee_data']").DataTable({
    "pageLength": 5,
   //  dom: 'lBfrtip',
   //      buttons: [
   //           'copy', 'csv', 'excel', 'pdf', 'print'
   //      ]
   // });
});
</script>
<style type="text/css">
@media screen {
  #printSection {
      display: none;
  }
}
@media print {
  #printPageButton {
    display: none;
  }
}
@media print {
  #printPageButton2 {
    display: none;
  }
}

@media print {
  body * {
    visibility:hidden;
  }
  #printSection, #printSection * {
    visibility:visible;
  }
  #printSection {
    position:absolute;
    left:0;
    top:0;
  }
}
</style>
<button id="btnPrint">Print</button>
<script type="text/javascript">
  document.getElementById("btnPrint").onclick = function() {
    // printElement(document.getElementById("printThis"));
    printElement(document.getElementById("printThisToo"), true, "<hr />");
    window.print();
}

function printElement(elem, append, delimiter) {
    var domClone = elem.cloneNode(true);
    var $printSection = document.getElementById("printSection");
    if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }
    if (append !== true) {
        $printSection.innerHTML = "";
    }
    else if (append === true) {
        if (typeof(delimiter) === "string") {
            $printSection.innerHTML += delimiter;
        }
        else if (typeof(delimiter) === "object") {
            $printSection.appendChlid(delimiter);
        }
    }
    $printSection.appendChild(domClone);
}
</script>