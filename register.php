<!DOCTYPE html>
<html>

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
    <div class="row">
		<div class="col-md-2 ">
		</div>
        <div class="col-md-8  well">
            <legend><a href=""><i class="glyphicon glyphicon-plus"></i></a> Create an account!</legend>
            <form action="template/add_visitor.php" method="post" class="form" role="form">
			<div class="row">
				 <div class="col-xs-12 col-md-12">
				 <?php if(isset($_GET['failed'])) {?>
						<div class="alert alert-danger" role="alert">
							<b class="glyphicon glyphicon-remove"></b>&nbsp;<?php echo "Failed to create you account please check password"; ?>
						</div>
					<?php }?>
					<p style="color:black;">&nbsp;&nbsp;&nbsp;&nbsp;<b>(Step 1 of 2)</b> Kindly provide your mobile number and valid email address wait for your confirmation code which will be sent to you via email.
					</p>
					
					
				 </div>
			</div>
            <div class="row">
                <div class="col-xs-6 col-md-6">
                    <input class="form-control" style="margin-bottom: 10px;" name="fname" placeholder="First Name" type="text"
                        required autofocus />
                </div>
                <div class="col-xs-6 col-md-6">
                    <input class="form-control" name="lname" placeholder="Last Name" type="text" required />
                </div>
            </div>
           <div class="row">
			<div class="col-xs-5 col-md-5">
			<input class="form-control" style="margin-bottom: 10px;" name="youremail" placeholder="Your Email" type="email" required/>
			</div>
			<div class="col-xs-7 col-md-7">
				<div class="row">
					<div class="col-md-1">
					<h4>+63</h4>
					</div>
					<div class="col-md-11">
					<input class="form-control" style="margin-bottom: 10px;" name="number" placeholder="Phone Number (9xx xxx xxxx)" maxlength="10" type="number" required/>
					</div>
				</div>
			</div>
			</div>
		   <input class="form-control" style="margin-bottom: 10px;" name="password" placeholder="Password" type="password" required/>
            <input class="form-control" style="margin-bottom: 10px;" name="repass" placeholder="Re-type Password" type="password" required/>
           
            <label class="radio-inline">
                <input type="radio" name="sex" id="inlineCheckbox1" value="male" />
                Male
            </label>
            <label class="radio-inline">
                <input type="radio" name="sex" id="inlineCheckbox2" value="female" />
                Female
            </label>
            <br />
            <br />
            <button class="btn btn-lg btn-primary btn-block" type="submit">
               <b class="glyphicon glyphicon-ok"></b>&nbsp;Register</button>
            </form>
		
        </div>
    </div>
</div>
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