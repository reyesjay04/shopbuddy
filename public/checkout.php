<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>
    <!-- Page Content -->
    <div class="container">
      <?php 
      if(!isset($_SESSION['email'])) {
         redirect("login.php");
         set_message("Login First");
      } else {

      }

      ?>

<!-- /.row --> 

<div class="row">
      <h4 class="text-center bg-danger"><?php display_message(); ?></h4>
      <h1>Checkout</h1>
    
<form method="post">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="business" value="jjreyes055@gmail.com">
<input type="hidden" name="currency_code" value="PH">

    <table id="employee_data" class="table table-striped">
        <thead>
          <tr>
           <th>Product</th>
           <th>Price</th>
           <th>Quantity</th>
           <th>Sub-total</th>
           <th>Action</th>
          </tr>
        </thead>
        <tbody>
           <?php cart(); ?>
        </tbody>
    </table>
</form>



<!--  ***********CART TOTALS*************-->
<script>
$(document).ready(function() {
    $("[id*='employee_data']").DataTable({                                   
    "bLengthChange": false,
    "bFilter": true,
    "bInfo": false,
    "bAutoWidth": false,
    "pageLength": 5 
    });
});
</script>          
<div class="col-xs-4 pull-right ">
<h2>Cart Totals</h2>

<table class="table table-bordered" cellspacing="0">

<tr class="cart-subtotal">
  <th>Items:</th>
    <td><span class="amount">
      <?php 
       get_qty_sum();
      ?></span>
    </td>
</tr>

<tr class="shipping">
<th>Shipping and Handling</th>
<td><?php get_product_total_price_sum_shipping(); ?></td>
</tr>

<tr class="order-total">
<th>Order Total</th>
<td><strong><span class="amount">&#8369;<?php get_product_total_price_sum(); ?>
    </span></strong> </td>
</tr>

</table>


<?php echo show_checkout(); ?>
</div><!-- CART TOTALS-->


 </div><!--Main Content-->

</div>
                           
<script type="text/javascript">
   function getUnderCategory(id){
      $("#under_category").empty();
      $.get("get_add.php",
      {
         id:id
      },
      function(data,status) {
         if (status == "success") {
            try {
               eval(data);
            } catch (e) {
               if (e instanceof SyntaxError) {
                  console.log(e.message);
               }
            }
         }
      });
   }
</script>

        <!-- Footer -->
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
