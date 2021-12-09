<?php   require_once("../resources/config.php");?>

<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

<div class="container">

        <header class="jumbotron hero-spacer">
        
        </header>
        <div class="col-md-3"></div>
        <div class="col-md-9">
        <hr>
        <?php 

        $query = query("SELECT * FROM products WHERE product_category_id = ".escape_string($_GET['id'])." AND uc_id = ".escape_string($_GET['uc_id'])." ");
        confirm($query);
    $query = query("SELECT * FROM products WHERE active = 1");

    confirm($query);

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $no_of_records_per_page = 8;
    $offset = ($page-1) * $no_of_records_per_page;

    $total_pages_sql = "SELECT COUNT(*) FROM products WHERE product_category_id = ".escape_string($_GET['id'])." AND uc_id = ".escape_string($_GET['uc_id'])."";
    $result = mysqli_query($connection,$total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);

    $sql = "SELECT * FROM products WHERE product_category_id = ".escape_string($_GET['id'])." AND uc_id = ".escape_string($_GET['uc_id'])." LIMIT $offset, $no_of_records_per_page";
    $res_data = query($sql);
    while($row = mysqli_fetch_array($res_data)) {
        $product_image = display_image($row['product_image']);
        $supplier_id = $row['supplier_id'];

    $product_image = display_image($row['product_image']);
    
$product = <<<DELIMETER
<div class="col-sm-3 col-lg-3 col-md-3" style="padding-left: 5px;padding-right: 5px;">
                                <div class="thumbnail" style="height: 335px;">
                                    <a href="item.php?id={$row['product_id']}"><img style="max-height: 200px;" src="../resources/{$product_image}" alt=""></a>
                                        <div style="height: 140px"class="caption">
                                            <p style="color: black;font-size: 13px;font-weight: 600; height:30px;" class="text-center">{$row['product_title']}</p>
                                            <h4 style="color: #f57224;margin-bottom: 0px; font-size: 12px">&#8369;{$row['total_price']}</h4>
                                            <p style="color: #9e9e9e;font-size: 14px;margin-top: 0px;margin-bottom: 5px; font-size: 12px; height: 30px;">Description: {$row['short_desc']}</p>
                                            <h4 style="color: #9e9e9e;font-size: 14px;margin-top: 0px;margin-bottom: 5px; font-size: 12px">{$row['product_quantity']} products</h4>
                                            <h4 style="color: #1f1919; font-size: 14px; font-size: 12px">{$row['company_name']}</h4>
                                            </h4>
                                        </div>
                                </div>
                            </div>   
DELIMETER;
echo $product;
        }


        ?>
        </form>
                </div> 
                        <link rel="stylesheet" type="text/css" href="css/page.css">
                <div class="pagination pull-right">
                    <a href="<?php echo "index.php?page=".$page = 1; ?>" class="page">FIRST</a>
                        <?php
                        for ($page=1;$page<=$total_pages;$page++) {
                          echo '<a href="index.php?page=' . $page . '" class="page">' . $page . '</a>';
                        }
                        ?>
                    <a href="<?php echo "index.php?page=".$total_pages; ?>" class="page">LAST</a>

                </div>  
</div>
</div>