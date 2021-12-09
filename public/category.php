<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>
    <!-- Page Content -->
    <?php
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        if($id == '') { 
            redirect("index.php");
        } else {
        }
    } else {
        $id = "";
    }
    ?>
    <div class="container">
        <header class="jumbotron hero-spacer">
        
        </header>
        <hr>
        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-center" style="color: black; font-weight: bold;">Latest Products</h2>
            </div>
        </div>
        <?php include(TEMPLATE_FRONT . DS . "side_nav_under.php") ?>
        <div class="col-md-9">
        <div class="row text-center">

            <?php get_products_in_cat_page($id);?>
            
        </div>
        </div>
    </div>
   <?php include(TEMPLATE_FRONT . DS . "footer.php") ?>
