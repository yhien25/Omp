<!DOCTYPE html>
<html>
	<head>
		
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>OMP - Online Market Philippines</title>

	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/business-plate.css">
	<link rel="stylesheet" href="assets/css/style.css">

	
	</head>
	
		<body background="admin/img/escheresque.png">
	<?php include 'template/header.php'; ?>
		
<div class="container" >
    <div class="row">
		<div class="col-md-3 ">
		</div>
        <div class="col-md-6  well">
			
            <legend><a href=""><i class="glyphicon glyphicon-off"></i></a> 
				
				Log in
				<?php
					if(isset($_GET['success'])){
						echo "<span style = 'color:green'>Verification Success Please Login your account!</span>";
					}else if(isset($_GET['ERR'])){
						echo "<small style = 'color:red;font-size:14px;'>Invalid email or password</small>";
					}else if(isset($_GET['ACTIVE'])){
						echo "<small style = 'color:red;font-size:14px;'>Your Account is Active! Your account might login to other device</small>";
					}
				?>
			</legend>
            <form action="control/process/authenticate_visitor.php" method="post" class="form" role="form">
			
            <input class="form-control" style="margin-bottom: 10px;" name="youremail" placeholder="Email" type="email" />
			<input class="form-control" style="margin-bottom: 10px;" name="password" placeholder="Password" type="password" />
         
            <label class="radio-inline">
                <input type="checkbox" name="remem" id="inlineCheckbox2" value="check" />
                Remember me?
            </label>
            <br />
            <br />
            <button class="btn btn-lg btn-primary btn-block" type="submit">
               <b class="glyphicon glyphicon-ok"></b>&nbsp;Log in</button>
            </form>
		
        </div>
    </div>
</div>
<br>


		<?php include 'template/footer.php'; ?>
	</body>
	

	<script type='text/javascript' src='assets/js/jquery.min.js'></script>
    <script type='text/javascript' src='assets/js/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='assets/js/jquery.easing.1.3.js'></script> 
    <script src="assets/js/bootstrap.min.js"></script> 

</html>