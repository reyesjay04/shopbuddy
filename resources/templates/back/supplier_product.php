
<h1 class="page-header">
   Your Products

</h1>

<table id="reports_id" class="table table-striped table-bordered">
<h3 class="bg-success"><?php display_message(); ?></h3>

    <thead>

      <tr>
           <th>Id</th>
           <th>Title</th>
           <th>Category</th>
           <th>Price</th>
           <th>Quantity</th>
           <th>Action</th>
      </tr>
    </thead>
    <tbody>

      <?php get_supplier_products(); ?>


  </tbody>
</table>


<script>
      $(document).ready(function() {
              $("[id*='reports_id']").DataTable();
      });
      </script>
</div>
