
<h1 class="page-header">
    All Products

</h1>

<table id="reports_id" class="table table-striped table-bordered">
<h3 class="bg-success"><?php display_message(); ?></h3>

    <thead>
      <tr>
           <th>Id</th>
           <th>Action</th>
           <th>Title</th>
           <th>Category</th>
           <th>Price</th>
           <th>Total Price</th>
           <th>Quantity</th>
           <th>Supplier</th>    
      </tr>
    </thead>
    <tbody>
    <?php get_products_in_admin() ; ?>
  </tbody>
</table>


<script>
      $(document).ready(function() {
              $("[id*='reports_id']").DataTable();
      });
      </script>
</div>


     