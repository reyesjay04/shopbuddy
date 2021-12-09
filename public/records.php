<?php require_once("../resources/config.php"); ?>
<?php require_once(TEMPLATE_FRONT . DS . "header.php") ?>
<?php 
if(logged_in()) {

} else {
    redirect('Login.php');
}
	echo_user_id($db_user_id);
    $query = "SELECT * FROM delivery WHERE user_id = ".$db_user_id." ";  
    $result = query($query);  
?>   
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Your Orders</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="employee_data" class="table table-bordered table-striped table-hover" >
                    <thead>
                        <th>Order ID</th>
                        <th>View</th>  
                        <th>Email</th>
                        <th>Full Name</th>
                        <th>Contact Number</th>
                        <th>Date Ordered</th>
                        <th>Time Ordered</th>
                    </thead>
                    <?php  
                    while($row = mysqli_fetch_array($result))  {  

                        $delid = $row["delivery_id"];
                        $user_id = $row["user_id"];
                        $full_name = $row["full_name"];
                        $contact_number =$row["contact_number"];
                        $time =$row["time"];
                        $date =$row["date"];
                        $status = $row['active'];

                        if($status == 0) {
                            $stats = "PROCESS";
                        } elseif ($status == 1) {
                            $stats = "DISPATCH";
                        } elseif($status == 2) {
                            $stats = "CANCELED";
                        } elseif($status == 3) {
                            $stats = "DELIVERED";
                        }
                        
                        $sql = "SELECT email FROM customers WHERE user_id = ".escape_string($user_id)." ";
                        $results = query($sql);

                        if(row_count($results) == 1) {
                            $row = fetch_array($results);

                            $username = $row['email'];
                        }

                    ?>  
                    <tr>  
                        <td><?php echo $delid; ?></td>
                        <td>
                            <button type="button" name="view" value="view" id="<?php echo $delid; ?>" class="btn btn-info btn-xs view_data" style="width: 40px; margin-left: 10px ">
                            <i class="fa fa-arrow-circle-right"></i>
                            </button>
                        </td>  
                        <td><?php echo $username; ?></td>  
                        <td><?php echo $full_name; ?></td> 
                        <td><?php echo $contact_number; ?></td>
                        <td><?php echo $time; ?></td> 
                        <td><?php echo $date; ?></td>    
                       
                    </tr>  
                    
                    <?php  
                    }  
                    ?>  
                </table>  
            </div>  
        </div>
    </div>
</div>
        
 <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Order Details</h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>   
           </div>  
      </div>  
 </div>  



 <script>  
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var employee_id = $(this).attr("id");
           $.ajax({  
                url:"select.php",  
                method:"post",  
                data:{employee_id:employee_id},  
                success:function(data){  
                     $('#employee_detail').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 });  
 </script>
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
    	"pageLength": 5

   
   
    } );
} );
</script>         

    <!-- /.container -->
<?php require_once(TEMPLATE_FRONT . DS . "footer.php") ?>
