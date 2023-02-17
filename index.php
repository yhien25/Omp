<!DOCTYPE html>
<?php include("config/database/index.php"); ?>
<html>
	<head>
		
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>OMP - Online Market Philippines</title>

	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/business-plate.css">

		
	<style>
text {
     color: white;
    text-shadow: 2px 1px 3px black, 0 0 25px black, 0 0 5px black;
}

</style>
	
	</head>
	
	<body background="admin/img/escheresque.png">
	<?php include 'template/header.php'; ?>
		
	<div class="container">
    <div class="row">
	
		
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked">
                 <li class="active"><a  style="text-align:center;"><text><i class="glyphicon glyphicon-menu-right"></i>&nbsp;Categories</text></a></li>
                <?php
					$sql = mysql_query("SELECT * FROM tbl_categories ORDER BY prod_category ASC");
					while($row = mysql_fetch_array($sql)){
				?>
				
					<li><a href="product.php?category=<?php echo $row['prod_category']; ?>"><img src = "images/icons/<?php echo $row['picture']; ?>" height ="30px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['prod_category']; ?></a></li>
				<?php				
					}
				?>
					
            </ul>
			
        </div>
		<div class="col-md-9 well">
        <?php include 'slider/index.php'; ?>
        </div>
        
    </div>
</div>	

		<?php include 'template/footer.php'; ?>
	</body>
	

	<script type='text/javascript' src='assets/js/jquery.min.js'></script>
    <script type='text/javascript' src='assets/js/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='assets/js/jquery.easing.1.3.js'></script> 
    <script src="assets/js/bootstrap.min.js"></script> 

</html>