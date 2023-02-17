<!DOCTYPE html>
<html>
	<?php
		if(!isset($_GET['id'])){
			header("location:register.php");
		}
	?>
	<head>
		
		
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>OMP - Online Market Philippines</title>

	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/business-plate.css">
	<link rel="stylesheet" href="assets/css/style.css">

	
	</head>
	
	<body>
	<?php include 'template/header.php'; ?>
<div class="container" >
<br>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">
				<b class="glyphicon glyphicon-info-sign"></b>&nbsp; <b>(Step 2 of 2)</b> Account Verification 
			</h3>
		</div>
		<div class="panel-body">
					<div class="row">
						<center>
						<div class="col-xs-12 col-md-12">
						<?php if(!isset($_GET['error'])){ ?>
						<p style="color:black;">&nbsp;Enter Verification Code to verify your account.</p>
						<?php }else{?>
						<p style="color:red;">&nbsp;Verification Code didn't Match!.</p>
						<?php }?>
						</center>
						</div>
					</div>
					<div class="row">
						<form action = "control/process/verify_code.php" method = "POST">
							<div class="col-xs-3 col-md-3">
							</div>
							<div class="col-xs-4 col-md-4">
								<input type ="hidden" value ="<?PHP echo $_GET['id'] ?>" name ="id">
								<input class="form-control" style="margin-bottom: 10px;" name="code" placeholder="" type="text" required autofocus />
							</div>
							<div class="col-xs-3 col-md-3">
								 <input class="btn btn-success" style="margin-bottom: 10px;" value="Verify Account" type="submit" required />
							</div>
						</form>
					</div>
		</div>
    </div>	
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
		<?php include 'template/footer.php'; ?>
	</body>
	

	<script type='text/javascript' src='assets/js/jquery.min.js'></script>
    <script type='text/javascript' src='assets/js/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='assets/js/jquery.easing.1.3.js'></script> 
    <script src="assets/js/bootstrap.min.js"></script> 

</html>