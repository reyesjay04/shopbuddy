<?php require_once("../resources/config.php"); ?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>
	
<div class="container">
	<div class="col-lg-3 col-md-3 col-xs-3">

	</div>
	<div class="col-lg-6 col-md-6 col-xs-6">
		<div class="jumbotron">
			<h1 class="text-center"><?php activate_user(); ?></h1>
				<div class="panel panel-login">
					<div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									<form method="get">
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="2" class="form-control" placeholder="Email" required>
									</div>
									<div class="form-group">
										<input type="text" name="validation" id="validation" tabindex="2" class="form-control" placeholder="Code" required>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Submit">
											</div>
										</div>
									</div>
									
									
									
									</form>
								</div>
							</div>
					</div>
				</div>	
	</div>

	</div>
	<div class="col-lg-3 col-md-3 col-xs-3">

	</div>


<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>