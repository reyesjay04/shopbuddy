<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
<a class="navbar-brand" href="supplierindex.php" style="color: white;">SB Supplier</a>

</div>
<ul class="nav navbar-right top-nav">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
            <?php

            $email_address = $_SESSION['email_address'];

            $sql = "SELECT company_name FROM supplier WHERE email_address= '".escape_string($email_address)."' ";
            $result = query($sql);

            if(row_count($result) == 1) {

            $row = fetch_array($result);

            $db_company_name  = $row['company_name'];

            }
            echo $db_company_name;
            ?>
        <b class="caret"></b></a>
        <ul class="dropdown-menu">

            <li class="divider"></li>
            <li>
                <a href="supplierlogout.php"><i class="fa fa-fw fa-power-off"></i> Log Out </a>
            </li>
        </ul>
        
    </li>
</ul>