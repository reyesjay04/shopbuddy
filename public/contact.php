<?php require_once("../resources/config.php"); ?>

<!-- Header-->
<?php include(TEMPLATE_FRONT .  "/header.php");?>
    <!-- Contact Section -->
    <!-- Container -->
    <div class="container" style="width: 500px;">
        <div class="row">
            <div class="col-lg-12 text-center">
                <hr>
                <h2 class="section-heading">Contact Us</h2>               
                    <div class="col-lg-6 col-lg-offset-3">
                    <?php display_message(); ?>
                    </div>
            </div>
            <div class="col-lg-12 text-center">
                <p class="section-heading" style="color: #686766; font-size: 15px">Thank you for using ShopBuddy®! Please complete the form below, so we can provide quick and efficient service. if this is an urgent matter please contact Customer Support:</p>   
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form name="sentMessage" id="contactForm" method="post" >
                    <?php 

                    send_message();

                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                             <div class="form-group">
                                <input type="subject" name="subject" class="form-control" placeholder="Your Subject *" id="phone" required data-validation-required-message="Please enter your your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                             
            
                            <div class="form-group">
                                <textarea name="message" class="form-control" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."style="height: 131px;"></textarea>
                                <p class="help-block text-danger" ></p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center">
                            <div id="success"></div>
                            <button class="form-control btn btn-login" name="submit" type="submit" class="btn btn-xl">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>

    <!-- /.container -->
    <!--  footer --->
<?php include(TEMPLATE_FRONT .  "/footer.php");?>
    <!-- /.footer -->