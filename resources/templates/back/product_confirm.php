
<h1 class="page-header">
   All Products

</h1>


<h3 class="bg-success"><?php display_message(); ?></h3>

  <table class="table table-hover" id="tblOne">
    <thead>
      <tr>
           <th>Id</th>
           <th>Title</th>
           <th>Comp. Name</th>
           <th>Category</th>
           <th>Quantity</th>
           <th>Price</th>
           <th>Commission (Percentage)</th>
           <th>Total Price</th>
      </tr>
    </thead>
    <tbody>
        <?php 
    
    $query = query("SELECT * FROM products WHERE active = 0");
    confirm($query);


    if(mysqli_num_rows($query) == 0 ) {

        echo "<h2><p class='bg-success text-center'>No Pending Products</p></h2>";

    } else {

        while ($row = fetch_array($query)) {

            $category = show_product_category_title($row['product_category_id']);

            $product_image = display_image($row['product_image']);

            $product_id = $row["product_id"];

            $price = number_format($row['product_price'], 2);
            $default_price = $row['product_price'];
            $comp = $row['company_name'];
            $current_price = $row['product_price'];
            ?>
            <tr>
               <td>
                  <?php echo $row['product_id'] ?>
               </td>
               <td>
                  <?php echo $row['product_title'] ?>
                  <br>
                  <a href="index.php?edit_product&id=<?php echo $row['product_id'] ?>"><img  width='100' src="../../resources/<?php echo $product_image ?>" alt="" style="height: 50px;"></a>
               </td>
               <td>
                  <?php echo $comp; ?>
               </td>
               <td>
                  <?php echo $category; ?>
               </td>
               <td><?php echo $row['product_quantity']; ?></td>
               <td>
                  <input type="text" name="input1" value="<?php echo $price; ?>" class="form-control" style="width: 150px;"readonly>
                  <input type="hidden" id="price_<?php echo $product_id; ?>" name="price_<?php echo $product_id; ?>" value="<?php echo $default_price; ?>" style="width: 150px;">
               </td>
              <form method="get" action="../../resources/templates/back/accept_product.php">
    
                   <td>
                      <input type="hidden" name="id" value="<?php echo $product_id; ?>" class="form-control"  style="width: 150px;" >
                      <input type="number" min=0 oninput="validity.valid||(value='');" name="commission" id="commission_<?php echo $product_id; ?>" class="form-control" onblur="calc(<?php echo $product_id; ?>);" style="width: 150px;" required >
                   </td>
                   <td>
                      <input type="number" name="output" id="output_<?php echo $product_id; ?>" class="form-control"  style="width: 150px;" readonly>
                   </td>
                  
                    <td>
                      <button class="btn btn-success"><span class="glyphicon glyphicon-check"></span></button>
                      <a class="btn btn-danger" href="../../resources/templates/back/delete_product_request.php?id=<?php echo $row['product_id'] ?>"><span class="glyphicon glyphicon-remove"></span>
                      </a>     
                    </td>
                </form> 
            </tr>

        <?php 
        }
    }
?>
        <script type="text/javascript">
          function calc(id) {
            var price = $("#price_" + id).val();
            var commission = $('#commission_' + id).val();
            var percentage = parseFloat(commission) / 100;

            var output = parseFloat(price) * parseFloat(percentage) + parseFloat(price);
            $("#output_" + id).val(output);
          }
  
    </script>
    <script type="text/javascript">
      
    </script>

    </tbody>
  </table>
</div>
