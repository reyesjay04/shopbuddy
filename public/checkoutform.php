<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>
<?php

if(isset($_SESSION['email'])) {

} else {
    redirect("index.php");
}

?>
<style>
* {
box-sizing: border-box;
}
.row-checkout {
font-family: 'Roboto', sans-serif;
display: -ms-flexbox; /* IE10 */
display: flex;
-ms-flex-wrap: wrap; /* IE10 */
flex-wrap: wrap;
margin: 0 -16px;
margin-left: 20px;
margin-right: 20px;
"
}
.col-25 {
-ms-flex: 25%; /* IE10 */
flex: 25%;
}

.col-50 {
-ms-flex: 50%; /* IE10 */
flex: 50%;
}

.col-75 {
-ms-flex: 75%; /* IE10 */
flex: 75%;
}

.col-25,
.col-50,
.col-75 {
padding: 0 16px;
}
.container-checkout {
background-color: #f2f2f2;
padding: 5px 20px 15px 20px;
border: 1px solid lightgrey;
border-radius: 3px;
}

/*input[type=text] {
width: 100%;
margin-bottom: 20px;
padding: 12px;
border: 1px solid #ccc;
border-radius: 3px;
}*/

label {
margin-bottom: 10px;
display: block;
}

.icon-container {
margin-bottom: 20px;
padding: 7px 0;
font-size: 24px;
}
/*.btn {
background-color: #4CAF50;
color: white;
padding: 12px;
margin: 10px 0;
border: none;
width: 50%;
border-radius: 3px;
cursor: pointer;
font-size: 17px;
}*/


.btn:hover {
background-color: #45a049;
}
a {
color: #2196F3;
}

hr {
border: 1px solid lightgrey;
}

span.price {
float: right;
color: grey;
}
@media (max-width: 800px) {
.row {
flex-direction: column-reverse;
}
.col-25 {
margin-bottom: 20px;
}

}
</style>
<div class="row-checkout">
    <div class="col-75">
        <div class="container-checkout">
            <form id="checkout-form"  method="post" role="form" action="insertcheck.php.php" style="display: block;">
                <!--  -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-50">
                            <h3 style="color: black;">Billing Address</h3>
                            <div class="form-group">
                                <input type="text"id=f-name name="full_name" tabindex="2" class="form-control" placeholder="Full Name" required>
                            </div>

                            <div class="form-group">
                                <input type="text"id=email name="contact_number" tabindex="2" class="form-control" placeholder="Contact Number" required>
                            </div>
                            <div class="form-group">
                                <input type="text"id=address name="address" tabindex="2" class="form-control" placeholder="Address" required>
                            </div>
                            <div class="form-group">
                                  <select id="ddlViewBy" name="province"  class="form-control view" onchange="getUnderCategory($(this).val()); changeval(event)" required>   
                                     <option value="">Select Province</option>
                                     <?php    
                                        $query = query("SELECT * FROM province");
                                        confirm($query);
                                        while($row = mysqli_fetch_array($query)) {
                                           $add_id = $row['add_id'];
                                           $price = $row['price'];
                                     ?>
                                     <option name="cat" value="<?php echo $add_id; ?>">
                                        <?php echo $row['province']; ?>
                                     </option>
                                     <?php } ?>
                                  </select>
                            </div>
                            <div class="form-group">
                                <select name="municipality" id="under_category"  class="form-control">   
                                <option value="">Select Municipality</option>
                                </select>
                            </div>
       <!--                      <input id="myText" type="text" value="colors"> -->
<!--                             <script type="text/javascript">
                                function changeval(e) {
                                    document.getElementById("myText").value = e.target.value
                                }
                            </script>
 -->

                            <div class="form-group">
                                <input type="text"id=brgy name="brgy" tabindex="2" class="form-control" placeholder="Brgy" required>
                            </div>

                            <div class="form-group">
                                <input type="text"id=landmark name="landmark" tabindex="2" class="form-control" placeholder="Land Mark" required>
                            </div>

                            <div class="form-group">
                                <input type="text"id=note name="note" tabindex="2" class="form-control" placeholder="Note">
                            </div>

                            <div class="form-group">
                                <input type="text"id=zip name="zip" tabindex="2" class="form-control" placeholder="Zip" required>
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
                            </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-25">

                                <h4>Cart<span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b><?php count_orders();?></b></span></h4>

                                <table id="employee_data" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Color</th>
                                            <th>Size</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    if(isset($_SESSION['email'])) {
                                    $email = $_SESSION['email'];
                                    }

                                    $sql = "SELECT user_id FROM customers WHERE email = '".escape_string($email)."' ";
                                    $result = query($sql);

                                    if(row_count($result) == 1) {

                                        $row = fetch_array($result);
                                        $db_user_id = $row['user_id'];
                                        $_SESSION['id'] = $db_user_id;

                                        $query = query("SELECT * FROM temporder WHERE user_id = '".escape_string($db_user_id)."' ");
                                        $result = confirm($query);

                                        $count=mysqli_num_rows($query);    

                                        while ($row = fetch_array($query)) {
                                            $product_id = $row['product_id'];
                                            $product_title =$row['product_title'];
                                            $order_id = $row['order_id'];
                                            $qty = $row['quantity'];
                                            $supplier_id = $row['supplier_id'];
                                            $color = $row['color'];
                                            $size  = $row['size'];
                                            $product_total_price = $row['product_total_price'];

                                            if($color == '') {
                                                $colname = "N/A";
                                            } else {
                                                $colname = $color;
                                            }
                                            if($size == '') {
                                                $szname = "N/A";
                                            } else {
                                                $szname = $size;
                                            }

                                            $product_image = display_image($row['product_image']); 
                                                echo '
                                                    <tr>
                                                        <td> 
                                                            <input type="hidden" name="name[]" id="name" value="'.$product_title.'">'.$product_title.'
                                                        </td>
                                                        <td> 
                                                           '.$colname.'
                                                        </td>
                                                        <td> 
                                                        '.$szname.'
                                                        </td>
                                                        <input type="hidden" name="color[]" id="id" value="'.$color.'">
                                                        <input type="hidden" name="size[]" id="id" value="'.$size.'">
                                                        <input type="hidden" name="id[]" id="id" value="'.$order_id.'">
                                                        <input type="hidden" name="prid[]" id="id" value="'.$product_id.'">
                                                        <input type="hidden" name="user" id="id" value="'.$db_user_id.'">
                                                        <input type="hidden" name="supplier_id[]" id="supplier_id" value="'.$supplier_id.'">
                                                        <input type="hidden" name="user_id[]" id="id" value="'.$db_user_id.'">
                                                        <td>
                                                            <input type="hidden" class="form-control" name="quantity[]" id="quantity" value="'.$row['quantity'].'" readonly>'.$row['quantity'].'
                                                        </td>
                                                        <td>
                                                            <input type="hidden" class="form-control" name="total_price[]" id="price" value="'.number_format($product_total_price, 2, '.', ' ').'" readonly>'.number_format($product_total_price, 2, '.', ' ').'
                                                        </td>
                                                    </tr>
                                                    ';
                                        }
                                    }
                                    ?>             
                                    </tbody>
                                </table>
                                <script>
                                $(document).ready(function() {
                                    $("[id*='employee_data']").DataTable({                                   
                                    "bLengthChange": false,
                                    "bFilter": true,
                                    "bInfo": false,
                                    "bAutoWidth": false
                                    });
                                });
                                </script>

                            <h4><p style="font-weight: 700px; font-size: 20px">Total Price:<span class="price" style="color:black"><b><input type="hidden" name="total_total_price" value="<?php get_sum(); ?>"><?php get_sum(); ?></b></span></p>   
                            <hr>
                            <strong><h3 style="color:black;">Terms And Agreement</h3></strong>
                            <div style="width:570px;font-size:15px; font-family: 'Karla', sans-serif;">

                            <p>
                                <li> 3-7 days process of delivery.</li> </p>
                            <p> <li> <strong>Cash on delivery</strong> mode of payment only. </li></p>
                            <p> <li> Change of mind is not applicable as a return reason for this product due to one or more ofthe following reason:</li></p>                
                            <p>Safety and Hygiene,Earings,Under garments,food items,customize or made to order items</p>
                            <p> <li> WARRANTY NOT AVAILABLE. </li> </p>

                            <input type="checkbox" id="myCheck" style="font-size:15px; font-family: 'Karla', sans-serif;" onclick="myFunction5()"> Agree

                            </div>
                            <input type="submit" id="text" name="Submit" Value="Continue to checkout" style="
                            background-color: #d04f21;
                            width: 100%; display:none;"> 
                           <!--  <input type="submit "id="text" name="Submit" type="submit" value="Continue to checkout" class="btn" style="
                            background-color: #d04f21;
                            width: 100%; display:none;"> -->
                            <script>
                              function myFunction5() {
                                var checkBox = document.getElementById("myCheck");
                                var text = document.getElementById("text");
                                if (checkBox.checked == true){
                                  text.style.display = "block";
                                } else {
                                  text.style.display = "none";
                                }
                              }
                            </script>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
