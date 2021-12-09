<?php add_product(); ?>
<div class="col-md-12">
    <div class="row">
    <h1 class="page-header">Add Product</h1>
    </div>
    <h3 class="bg-danger text-center"><?php display_message(); ?></h3>
                     
      <form method="post" enctype="multipart/form-data">
          <div class="col-md-7">
              <div class="form-group">
                  <label for="product-title">Product Title </label>
                      <input type="text" name="product_title" class="form-control" required>   
              </div>
              <div class="form-group">
                     <label for="product-title">Product Description</label>
                <textarea name="product_description" id="" cols="30" rows="10" class="form-control" required></textarea>
              </div>
              <div class="form-group row">
                <div class="col-xs-3">
                  <label for="product-price">Product Price</label>
                  <input type="number" name="product_price" class="form-control" size="60" step=".01" required>
                </div>
              </div>
              <div class="form-group">
                <label for="product-title">Product Short Description</label>
                  <textarea name="short_desc" id="" cols="30" rows="3" class="form-control" required></textarea>
              </div>
          </div>

          <aside id="admin_sidebar" class="col-md-5">
              <div class="form-group">
                  <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Publish">
              </div>
              <div class="form-group">
                <label for="product-title">Product Category</label>
                  <select id="ddlViewBy" name="product_category_id"  class="form-control" onchange="getUnderCategory($(this).val());" required>   
                     <option value="">Select Category</option>
                     <?php    
                        $query = query("SELECT * FROM categories");
                        confirm($query);
                        while($row = mysqli_fetch_array($query)) {
                           $cat_id = $row['cat_id'];
                     ?>
                     <option name="cat" value="<?php echo $cat_id; ?>">
                        <?php echo $row['cat_title']; ?>
                     </option>
                     <?php } ?>
                  </select>
              </div>
              <div class="form-group">
                <label for="product-title">Under Category</label>
                  <select name="under_category" id="under_category" class="form-control">   
                    <option value="">Select Category</option>
                  </select>
              </div>
 
              <div class="form-group">
                <label for="product-title">Product Quantity</label>
                   <input type="number" name="product_quantity" class="form-control" required>
              </div>
              <div class="form-group">
                  <label for="product-title">Product Image</label>
                  <input type="file" name="file" required>
              </div>
          </aside>
      </form>



<script type="text/javascript">
   function getUnderCategory(id){
      $("#under_category").empty();
      $.get("get_category.php",
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
            