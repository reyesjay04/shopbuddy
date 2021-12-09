<?php require_once("../../resources/config.php") ?>

<?php include(TEMPLATE_BACK . "/header.php") ?>

<?php 
    
if(!isset($_SESSION['username'])) {
    redirect("../../public/adminlogin.php");
}
?>
        <div id="page-wrapper">
            <div class="container-fluid">
                          
                <?php 
                if ($_SERVER['REQUEST_URI'] == "/shopbuddy/public/admin/" || $_SERVER['REQUEST_URI'] == "/shopbuddy/public/admin/index.php") {
                   /*include(TEMPLATE_BACK . "/admin_content.php");*/
                }     
                if(isset($_GET['orders'])) {
                    include(TEMPLATE_BACK . "/orders.php");
                }
                if(isset($_GET['admin_indexcontent'])) {
                    include(TEMPLATE_BACK . "/admin_indexcontent.php");
                }
                if(isset($_GET['categories'])) {
                    include(TEMPLATE_BACK . "/categories.php");
                }
                if(isset($_GET['products'])) {
                    include(TEMPLATE_BACK . "/products.php");
                }
                if(isset($_GET['add_product'])) {
                    include(TEMPLATE_BACK . "/add_product.php");
                }
                if(isset($_GET['edit_product'])) {
                    include(TEMPLATE_BACK . "/edit_product.php");
                }
                if(isset($_GET['users'])) {
                    include(TEMPLATE_BACK . "/users.php");
                }
                 if(isset($_GET['add_user'])) {
                     include(TEMPLATE_BACK . "/add_user.php");
                 }
                if(isset($_GET['edit_user'])) {
                    include(TEMPLATE_BACK . "/edit_user.php");
                }
                if(isset($_GET['reports'])) {
                    include(TEMPLATE_BACK . "/reports.php");
                }
                if(isset($_GET['slides'])) {
                    include(TEMPLATE_BACK . "/slides.php");
                }
                if(isset($_GET['delete_slides_id'])) {
                    include(TEMPLATE_BACK . "/delete_slides.php");
                }
                 if(isset($_GET['product_confirm'])) {
                    include(TEMPLATE_BACK . "/product_confirm.php");
                }
                 if(isset($_GET['categories_under'])) {
                    include(TEMPLATE_BACK . "/index.php");
                }

                 if(isset($_GET['size'])) {
                    include(TEMPLATE_BACK . "/size.php");
                }
                 if(isset($_GET['color'])) {
                    include(TEMPLATE_BACK . "/color.php");
                }
                ?>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
<?php include(TEMPLATE_BACK . "/footer.php") ?>
   
