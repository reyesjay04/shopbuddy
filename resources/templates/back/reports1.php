<?php  
 $connect = mysqli_connect("127.0.0.1", "root", "", "test");  
 $query ="SELECT * FROM products ORDER BY product_id DESC";  
 $result = mysqli_query($connect, $query);  
 ?>  

      
      <body>
  
           <br /><br />  
           <div class="container" style=" background-color: white;"> 
           <div class="col-lg-6"> 
                <h3 align="center">Datatables Jquery Plugin with Php MySql and Bootstrap</h3>  
                <br /> 
                <div class="row">
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>ID</td>  
                                    <td>Name</td>  
                                    <td>Company Name</td>  
                                    <td>Price</td>  
                                     
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["product_id"].'</td>  
                                    <td>'.$row["product_title"].'</td>  
                                    <td>'.$row["company_name"].'</td>  
                                    <td>'.$row["product_price"].'</td>  
                               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
        </div>
        </div>
      </body>  
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  