  
<div class="container">
    
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        

        <ul class="nav navbar-nav navbar-right">

            <li> 
                <a href="index.php">SHOP</a>
            </li>
                   
            <li>
                <a href="contact.php">CONTACT US</a>
            </li>

            <li>
                <a style="color: #ff7941;"href="supplierregister.php">SELL ON SHOPBUDDY</a>
            </li>

            <?php if(!logged_in()): ?>
            <li>
                <a href="login.php">LOGIN</a>
            </li>
            <?php else:?>
            <?php get_email(); ?>
            <?php endif; ?>
       
        </ul>

    </div>

</div>





