<?php require_once("../../resources/config.php") ?>

<?php include(TEMPLATE_BACK . "/supplier_header.php") ?>

<?php 
    
if(!isset($_SESSION['email_address'])) {
    redirect("../../public");
}
$sql = "SELECT * FROM supplier WHERE email_address = '".$_SESSION['email_address']."' ";
$result = query($sql);

while ($row = fetch_array($result)) {
    $supplier_id = $row['supplier_id'];
    $_SESSION['suppid'] = $supplier_id;
}
?>
        <div id="page-wrapper">
            <div class="container-fluid">
                          
                <?php 
                if ($_SERVER['REQUEST_URI'] == "/shopbuddy/public/admin/supplierindex.php?supplier_id=" || $_SERVER['REQUEST_URI'] == "/shopbuddy/public/admin/supplierindex.php") {
                   include(TEMPLATE_BACK . "/admin_content.php");
                }     

               /* if(isset($_GET['orders'])) {
                    include(TEMPLATE_BACK . "/orders.php");
                                }*/
                if(isset($_GET['categories'])) {
                    include(TEMPLATE_BACK . "/categories.php");
                                }
                if(isset($_GET['supplier_product'])) {
                    include(TEMPLATE_BACK . "/supplier_product.php");
                                }
                if(isset($_GET['add_product'])) {
                    include(TEMPLATE_BACK . "/add_product.php");
                }
                if(isset($_GET['edit_product'])) {
                    include(TEMPLATE_BACK . "/edit_product.php");
                }
                if(isset($_GET['pending_product'])) {
                    include(TEMPLATE_BACK . "/pending_product.php");
                }
                if(isset($_GET['reports1'])) {
                    include(TEMPLATE_BACK . "/reports1.php");
                }
                if(isset($_GET['edit_supplier_product'])) {
                    include(TEMPLATE_BACK . "/edit_supplier_product.php");
                }
                if(isset($_GET['add_size'])) {
                    include(TEMPLATE_BACK . "/add_size.php");
                }
                if(isset($_GET['add_color'])) {
                    include(TEMPLATE_BACK . "/add_color.php");
                }
                /*if(isset($_GET['add_user'])) {
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
                }*/
                ?>

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
<?php include(TEMPLATE_BACK . "/footer.php") ?>
   
