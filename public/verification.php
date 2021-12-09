<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>
	 <div class="row">
        <div class="col-lg-6 col-lg-offset-3">

        <h3 class="bg-danger text-center"><?php display_message(); ?></h3>
                                
        </div>
    </div>
    <?php echo_submit(); ?>
		<div class="container">
			<div class="row">
				<div class="col-md-4 coml-md-6 col-xs-12">
					<form method="post">
						<div class="form-group">
							<label for="name">Your Name</label>
							<input type="text" maxlength="10" class="form-control" id="name" name="name" placeholder="Name" required="">	
						</div>
						<div class="form-group">
							<label for="name">Mobile Number</label>
							<input type="text" maxlength="11" class="form-control" id="number" name="number" placeholder="Name" required="">	
						</div>
							<div class="form-group">
							<label for="msg">Your message</label>
							<textarea class="form-control" rows="3" name="msg" placeholder="Message Here"  onkeyup="countChar(this)" required></textarea> 
						</div>
						<p class="text-right" id="charNum">85</p>
						<button type="submit" name="submit" class="btn btn-success">Send</button>
						
					</form>
				</div>
			</div>
			
		</div>
			<script>
			function countChar(val) {
				var len = val.value.length;
				if(len >= 85) {

					val.value = val.value.substring(0,85);

				} else {

					$('#charNum').text(85 - len);
				};
			}

		</script>