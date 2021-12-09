<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>

<br>
<div class="container">
    <hr>
    <?php include(TEMPLATE_FRONT . DS . "side_nav.php") ?>
    <style type="text/css">
    /*Some CSS*/
    * {margin: 0; padding: 0;}
    .magnify {width: 380px; margin: 50px auto; position: relative; cursor: none}

    /*Lets create the magnifying glass*/
    .large {
        width: 175px; height: 175px;
        position: absolute;
        border-radius: 100%;
        cursor: crosshair;
        
        /*Multiple box shadows to achieve the glass effect*/
        box-shadow: 0 0 0 7px rgba(255, 255, 255, 0.85), 
        0 0 7px 7px rgba(0, 0, 0, 0.25), 
        inset 0 0 40px 2px rgba(0, 0, 0, 0.25);
        
        /*hide the glass by default*/
        display: none;
    }

    /*To solve overlap bug at the edges during magnification*/
    .small { display: block; } 
    </style>
      <?php
        if(isset($_GET['id'])) {
            $pr_id = $_GET['id'];
        }
        if(isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            $sql = "SELECT user_id FROM customers WHERE email = '".escape_string($email)."' ";
            $result = query($sql);
            if(row_count($result) == 1) {
            $row = fetch_array($result);
            $db_user_id = $row['user_id']; 
            }
        }
        $query = query("SELECT * FROM products WHERE product_id ='".escape_string($_GET['id']). "'");
        confirm($query);            
        while ($row = fetch_array($query)) {

        $product_quantity = $row['product_quantity'];
        $product_description = $row['product_description'];
        $order   = array("\r\n", "\n", "\r");
        $replace = '<br/>';
        $newstr = str_replace($order, $replace, $product_description);

        $product_id = $row['product_id'];  
        $supplier_id = $row['supplier_id'];
        $image = escape_string(display_image($row['product_image']));
      ?>
      <div class="col-md-9">
        <div class="row">
          <div class="col-md-7">
            <!-- Lets make a simple image magnifier -->
            <div class="magnify">
                <!-- This is the magnifying glass which will contain the original/large version -->
                <div class="large"></div>
                <!-- This is the small image -->
                <img class="small" src="../resources/<?php echo $image; ?>" style="max-height: 300px"/>
            </div>
          </div>
          <br>
                    <br>
                              <br>
          <div class="col-md-5">
                <div class="thumbnail">
                    <div class="caption-full">
                        <h3><a href="#" style="color: #ff7941"><?php echo $row['product_title'];?></a> </h3>
                        <hr>
                        <h4 class=""><?php echo "&#8369;" . $row['total_price']?></h4>

<!--                     <div class="ratings">
                        <p>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            4.0 stars
                        </p>
                    </div> -->
      
                    <p><?php echo $row['short_desc'];?></p>
                        <form method="post" action="item.php" >
                                  <label for="product-title">Variation</label>
                            <div class="form-group">
                                      <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
                                            <div class="form-group col-md-6" style="padding-left: 0px;">
                                                <div class="form-group">
                                                    <select name="size_name" id="size_name" class="form-control" class="form-control" style="width: 100%;">                                    
                                                    <?php 
                                                    try{
                                                    $sqlconnection = new PDO("mysql:host=127.0.0.1;dbname=test", "root", "");
                                                    }   
                                                    catch(PDOException $pe){
                                                    echo 'Cannot connect to database';
                                                    die;
                                                    }
                                                    $selid=-1;
                                                    if(isset($_POST['btnSubmit'])) {
                                                    echo 'Selected option is '.$_POST['userList'];
                                                    $selid=$_POST['userList'];
                                                    }
                                                    $commandstring = "SELECT DISTINCT variation_name FROM variations WHERE product_id = ".$pr_id." AND type = 'S' order by ps_id ";
                                                    $cmd = $sqlconnection->prepare($commandstring);
                                                    $cmd->execute();
                                                    $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
                                                    foreach($result as $row) {
                                                    if($selid==$row['ps_id']) {
                                                    echo '<option value="'.$row['ps_id'].'" selected="selected">'.$row['variation_name'].'</option>';
                                                    } else {
                                                    echo '<option value="'.$row['ps_id'].'">'.$row['variation_name'].'</option>';
                                                    }                       
                                                    }
                                                    ?>
                                                    
                                                    </select>
                                                </div>
                                          </div>
                                            <div class="form-group col-md-6" style="padding-right: 0px;">
                                                <div class="form-group">
                                                    <select name="color_name" id="color_name" class="form-control" class="form-control" style="width: 100%;">                                    
                                                    <?php 
                                                    try{
                                                    $sqlconnection = new PDO("mysql:host=127.0.0.1;dbname=test", "root", "");
                                                    }   
                                                    catch(PDOException $pe){
                                                    echo 'Cannot connect to database';
                                                    die;
                                                    }
                                                    $selid=-1;
                                                    if(isset($_POST['btnSubmit'])) {
                                                    echo 'Selected option is '.$_POST['userList'];
                                                    $selid=$_POST['userList'];
                                                    }
                                                    $commandstring = "SELECT DISTINCT variation_name FROM variations WHERE product_id = ".$pr_id." AND type = 'C' order by ps_id ";
                                                    $cmd = $sqlconnection->prepare($commandstring);
                                                    $cmd->execute();
                                                    $result = $cmd->fetchAll(PDO::FETCH_ASSOC);
                                                    foreach($result as $row) {
                                                    if($selid==$row['ps_id']) {
                                                    echo '<option value="'.$row['ps_id'].'" selected="selected">'.$row['variation_name'].'</option>';
                                                    } else {
                                                    echo '<option value="'.$row['ps_id'].'">'.$row['variation_name'].'</option>';
                                                    }                       
                                                    }
                                                    ?>
                                                    
                                                    </select>
                                                </div>
                                            </div>
                                      </div>
                                    <?php
                                    if(!isset($_SESSION['email'])) {
                                    ?>
                                        <a id ="nextButton" href="../resources/cart.php?add=<?php echo $product_id;?>" class="btn btn-primary" name="add_to_cart">ADD TO CART</a>
                                    <?php
                                    } else {
                                        if($product_quantity == 0) {
                                        ?>
                                        <h4>No stocks available.</h4>
                                        <?php

                                        } else {
                                        ?>
                                        <a id ="nextButton" href="../resources/cart.php?add=<?php echo $product_id;?>&user_id=<?php echo $db_user_id;?>&supplier_id=<?php echo $supplier_id; ?>" class="btn btn-primary" name="add_to_cart">ADD TO CART</a>
                                        <?php  
                                        }
                                  }
                                  ?>
                             </div>

                        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

                        <script>
                        $(document).on('click', '#nextButton',function(event) {
                            event.preventDefault();
                        window.location.href = $(this).attr('href') + '&color_name='+$('select[name="color_name"] option:selected').text() 
                        + '&size_name='+$('select[name="size_name"] option:selected').text();
                        });
                        </script>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--Row For Image and Short Description-->
    <hr>
        <div class="row">
            <div role="tabpanel">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab" style="color: black;border-color: #d8d8d8;">Description</a></li>
                </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <h5 style="color: black" id="splitted_string"></h5>
                            <h5 style="color: black" value=""><?php echo $newstr; ?></h5>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div><!--Row for Tab Panel-->
    </div> <!--COL MD 9--> 
<?php
}
?>
<script type="text/javascript">

    //var src_str = "<?php //echo $product_description; ?>";
    // var str_spl = src_str.split("|");
    // var num;
    // var display_split_strings = "";

    // for (num=0; num < str_spl.length; num++){
    //     display_split_strings += str_spl[num] + "<BR>";
    //     }
        // document.getElementById("splitted_string").innerHTML = display_split_strings;


</script>
<script type="text/javascript">
    

    $(document).ready(function(){

    var native_width = 0;
    var native_height = 0;
  $(".large").css("background","url('" + $(".small").attr("src") + "') no-repeat");

    //Now the mousemove function
    $(".magnify").mousemove(function(e){
        //When the user hovers on the image, the script will first calculate
        //the native dimensions if they don't exist. Only after the native dimensions
        //are available, the script will show the zoomed version.
        if(!native_width && !native_height)
        {
            //This will create a new image object with the same image as that in .small
            //We cannot directly get the dimensions from .small because of the 
            //width specified to 200px in the html. To get the actual dimensions we have
            //created this image object.
            var image_object = new Image();
            image_object.src = $(".small").attr("src");
            
            //This code is wrapped in the .load function which is important.
            //width and height of the object would return 0 if accessed before 
            //the image gets loaded.
            native_width = image_object.width;
            native_height = image_object.height;
        }
        else
        {
            //x/y coordinates of the mouse
            //This is the position of .magnify with respect to the document.
            var magnify_offset = $(this).offset();
            //We will deduct the positions of .magnify from the mouse positions with
            //respect to the document to get the mouse positions with respect to the 
            //container(.magnify)
            var mx = e.pageX - magnify_offset.left;
            var my = e.pageY - magnify_offset.top;
            
            //Finally the code to fade out the glass if the mouse is outside the container
            if(mx < $(this).width() && my < $(this).height() && mx > 0 && my > 0)
            {
                $(".large").fadeIn(100);
            }
            else
            {
                $(".large").fadeOut(100);
            }
            if($(".large").is(":visible"))
            {
                //The background position of .large will be changed according to the position
                //of the mouse over the .small image. So we will get the ratio of the pixel
                //under the mouse pointer with respect to the image and use that to position the 
                //large image inside the magnifying glass
                var rx = Math.round(mx/$(".small").width()*native_width - $(".large").width()/2)*-1;
                var ry = Math.round(my/$(".small").height()*native_height - $(".large").height()/2)*-1;
                var bgp = rx + "px " + ry + "px";
                
                //Time to move the magnifying glass with the mouse
                var px = mx - $(".large").width()/2;
                var py = my - $(".large").height()/2;
                //Now the glass moves with the mouse
                //The logic is to deduct half of the glass's width and height from the 
                //mouse coordinates to place it with its center at the mouse coordinates
                
                //If you hover on the image now, you should see the magnifying glass in action
                $(".large").css({left: px, top: py, backgroundPosition: bgp});
            }
        }
    })
})
</script>
<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>