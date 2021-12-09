
<div class="col-md-12">
<div class="row">
<h1 class="page-header">
   All Orders

</h1>

<h4 class ="bg-success"><?php  display_message();?></h4>
</div>

<div class="row">
<table id="reports_id" class="table table-striped table-bordered">
    <thead>

      <tr>
           <th>ID</th>
           <th>Amount</th>
           <th>Transaction</th>
           <th>Currency</th>
           <th>Status</th>
           <th>Action</th>
 
      </tr>
    </thead>
    <tbody>
       <?php display_orders(); ?>
    </tbody>
</table>
     <script>
      $(document).ready(function() {
              $("[id*='reports_id']").DataTable();
      });
      </script>
</div>


