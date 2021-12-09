
<h1 class="page-header">
   All Products
</h1>
<h3 class="bg-success"><?php display_message(); ?></h3>
<table id="reports_id" class="table table-striped table-bordered">
    <thead>
      <tr>
           <th>Id</th>
           <th>Supplier</th>
           <th>Delivery Id</th>
           <th>Product title</th>
           <th>Quantity</th>
           <th>Date Ordered</th>
           <th>Time Ordered</th>  
           <th>Total Price</th>   
      </tr>
    </thead>
    <tbody>
      <?php get_reports();?>
    </tbody>
     <script>
      $(document).ready(function() {
        $("[id*='reports_id']").DataTable(
          {
            dom: 'lBfrtip',
            buttons: [
                 'copy', 'csv', 'excel', 'pdf', 'print'
            ]
          });
      });
      </script>
 
</table>
</div>
