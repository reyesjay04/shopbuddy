<?php add_color(); ?>
<h1 class="page-header">
  Product Categories
</h1>
<h3 class="bg-success"><?php display_message(); ?></h3>

<div class="col-md-6">
    <form action="" method="post">
        <div class="form-group">
            <label for="category-title">Color</label>
            <input name="color_name" type="text" class="form-control" style="width: 50%"> 
        </div>
        <div class="form-group">
            <input name="add_color" type="submit" class="btn btn-primary" value="Add Color">
        </div>     
    </form>
</div>
<div class="col-md-6">
    <table id="reports_id" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th width="10px">Id</th>
                <th width="50px">Title</th>
                <th width="50px">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php show_categories_in_admin_color();?>
        </tbody>
    </table>
</div>
<script>
$(document).ready(function() {
$("[id*='reports_id']").DataTable();
});
</script>