<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "headeradmin.php") ?>
<link rel='stylesheet' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
<link rel="stylesheet" href="css/style.css">

    <div class="container">
        <header>
            <h1 class="text-center" style="color: white;">Admin Login</h1>
            <h2 class="text-center"> <?php display_message(); ?></h2>
            <div class="col-sm-4"> 
            </div>     
            <div class="col-sm-4" style="padding-left: 65px;padding-right: 65px;">         
                <form class="" action="" method="post" enctype="multipart/form-data">        
                <?php login_user_admin(); ?>
                    <div class="form-group"><label for="" style="width: 250px;">
                    <input type="text" name="username" class="form-control" placeholder="Username"></label>
                    </div>
                    <div class="form-group"><label for="password" style="width: 250px;">
                    <input type="password" name="password" class="form-control" placeholder="Password"></label>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" style="width: 250px;">
                    </div>
                </form>   
            </div>  
            <div class="col-sm-4">   
            </div>
        </header>
    </div>

