<div class="col-md-3">
    <?php      
        $query = query("SELECT * FROM under_categories WHERE cat_id = ".escape_string($_GET['id'])." ");
        confirm($query);


    ?>

    <p class="lead">Categories</p>
    <div class="list-group">

    <?php
	    while($row = mysqli_fetch_array($query)) {

	?>

    <a href="category_under.php?uc_id=<?php echo $row['uc_id']; ?>&id=<?php echo $row['cat_id']; ?>" class='list-group-item' style='font-weight: 600;'><?php echo $row['uc_name'] ?></a>

    <?php

	};
    ?>

    </div>
</div>
