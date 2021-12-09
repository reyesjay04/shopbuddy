<?php add_category(); ?>
<h1 class="page-header">
  Product Categories
</h1>
<h3 class="bg-success"><?php display_message(); ?></h3>
    <div class="col-md-4">
        <form action="" method="post">
            <div class="form-group">
                <label for="category-title">Category Title</label>
                <input name="cat_title" type="text" class="form-control">
            </div>
            <div class="form-group">
                <input name="add_category" type="submit" class="btn btn-primary" value="Add Category">
            </div>     
        </form>
       


    </div>
<div class="col-md-8">
    <table id="reports_id" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>id</th>
                <th>Title</th>
                <th>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php show_categories_in_admin();?>
        </tbody>
    </table>
</div>

<script>
$(document).ready(function() {
$("[id*='reports_id']").DataTable();
});
</script>
