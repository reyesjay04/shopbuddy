<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Dashboard <small>Statistics Overview</small>
              <?php  $_SESSION['suppid']; 
              $suppid = $_SESSION['suppid'];
              ?>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Sales Report
            </li>
        </ol>
    </div>
</div>
    <div class="row">
       <form method="post" > <!-- action="detail.php" -->
        <div class="col-lg-1">
        </div>
        <div class="col-lg-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Sales</h3>
                </div>
                <?php 
                function getproductid($product_id) {

                    $sql = "SELECT product_price FROM products WHERE product_id = '$product_id' ";
                    $results = query($sql);
                    $row = fetch_array($results);
                    $product_price = $row['product_price'];
                    return $product_price;

                }

                $sql = "SELECT * FROM ordered_products WHERE supplier_id = $suppid AND status = 3 ORDER BY ord_id DESC ";
                $results = query($sql);
                
                ?>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="employee_data" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Total Price (Peso)</th>
                                    <th>Date Ordered</th>
                                    <th>Time Ordered</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                while ($row = fetch_array($results)) {
                                    $delbtn = $row['delivery_id']; 
                                    $product_title  = $row['product_title'];
                                    $quantity = $row['quantity'];
                                    $date = $row['date_ordered'];
                                    $time = $row['time_ordered'];
                                    $product_id = $row['product_id'];
                                    $total_price = getproductid($product_id) * $quantity;
                                ?>
                                <tr>
                                    <td><?php echo $delbtn; ?></td>
                                    <td><?php echo $product_title; ?></td>
                                    <td><?php echo $quantity; ?></td>
                                    <td>&#8369; <?php echo number_format($total_price, 2) ?></td>
                                    <td><?php echo $date; ?></td>
                                    <td><?php echo $time; ?></td>
                                <?php
                                }
                                ?>           
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
   <div class="container">
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Customer Details</h4>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
    </div>
    




     <div class="col-lg-1"></div>
     <div class="col-lg-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Products</h3>
            </div>
            <?php
                function getcat($product_category_id) {
                    $sql = "SELECT * FROM categories WHERE cat_id = '$product_category_id' ";
                    $results = query($sql);
                    $row = mysqli_fetch_array($results);
                    $title = $row['cat_title'];
                    return $title;
                }

                $sql = "SELECT * FROM products WHERE supplier_id = $suppid AND active = 1 ORDER BY product_id DESC ";
                $results = query($sql);

            ?>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="datalist" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Product #</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Stocks</th>
                                <th>Price</th>
                                <th>Date Created</th>
                                <th>Time Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while ($row = fetch_array($results)) {
                                    $product_id = $row['product_id'];
                                    $product_title = $row['product_title']; 
                                    $product_category_id  = $row['product_category_id'];
                                    $product_quantity = $row['product_quantity'];
                                    $product_price = $row['product_price'];
                                    $date = $row['date_created'];
                                    $time = $row['time_created'];
                                    $cat_title = getcat($product_category_id);
                                
                            ?>
                            <tr>
                                <td><?php echo $product_id; ?></td>
                                <td><?php echo $product_title;?></td>
                                <td><?php echo $cat_title;?></td>
                                <td><?php echo $product_quantity;?></td>
                                <td><?php echo $product_price;?></td>
                                <td><?php echo $date;?></td>
                                <td><?php echo $time;?></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>

<script>
$(document).ready(function() {
    $("[id*='employee_data']").DataTable({
        dom: 'lBfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
   
    });
});
</script>

<script>
$(document).ready(function() {
    $("[id*='datalist']").DataTable({
        dom: 'lBfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});
</script>
<!-- <script>
    $(document).ready(function(){
        var customer_id = $(this).attr("id");
        $.ajax({
            url:"detail.php",
            method: "post",
            data:{customer_id:customer_id},
            suceess:function(data){
                $('#employee_detail').html(data);
                $('#myModal').modal("show");

            }
        })  
    })
</script> -->