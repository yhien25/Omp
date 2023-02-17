<!DOCTYPE html>
<?php 
	include("config/database/index.php"); 
	if(!isset($_GET['category'])){
		header("location:index.php");
	}
?>
<html>
	<head>
		
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>OMP - Online Market Philippines</title>

	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/business-plate.css">
	<link rel="stylesheet" href="assets/css/style.css">
	
	<style>
		
.box {
  background:#fff;
  transition:all 0.2s ease;
  border:2px dashed #0076BE;
  margin-top: 10px;
  box-sizing: border-box;
  border-radius: 5px;
  background-clip: padding-box;
  padding:0 20px 20px 20px;

}

.box:hover {
  border:2px solid #F15A24;
}

.box span.box-title {
    color: #fff;
    font-size: 24px;
    font-weight: 300;
    text-transform: uppercase;
}

.box .box-content {
  padding: 16px;
  border-radius: 0 0 2px 2px;
  background-clip: padding-box;
  box-sizing: border-box;
}
.box .box-content p {
  color:#515c66;
  text-transform:none;
}

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
                <li class="active"><a href="#" style="text-align:center;"><text><i class="glyphicon glyphicon-menu-right"></i>&nbsp;Categories</text></a></li>
                <?php
					$sql = mysql_query("SELECT * FROM tbl_categories ORDER BY prod_category ASC");
					while($row = mysql_fetch_array($sql)){
						if(isset($_GET['category'])){
							$category = $_GET['category'];
							if($category == $row['prod_category']){
					?>
								<li class = "active"><a href="product.php?category=<?php echo $row['prod_category']; ?>"><img src = "images/icons/<?php echo $row['picture']; ?>" height ="30px;">&nbsp;<?php echo $row['prod_category']; ?></a></li>
				<?php
							}else{
				?>
								<li><a href="product.php?category=<?php echo $row['prod_category']; ?>"><img src = "images/icons/<?php echo $row['picture']; ?>" height ="30px;">&nbsp;<?php echo $row['prod_category']; ?></a></li>
				<?php
							}
						}else{
				?>
								<li><a href="product.php?category=<?php echo $row['prod_category']; ?>"><img src = "images/icons/<?php echo $row['picture']; ?>" height ="30px;">&nbsp;<?php echo $row['prod_category']; ?></a></li>
				<?php
						}			
					}
				?>

            </ul>
        </div>
		<div class="col-md-9 well">
		
			<?php
				$category = $_GET['category'];
				$id = $_GET['id'];
				$sql = mysql_query("SELECT * FROM tbl_products WHERE prod_category = '$category' AND id = '$id'  ORDER BY date_posted DESC");
				if(mysql_num_rows($sql) != 0){
					$row = mysql_fetch_array($sql);
			?>
				<h3><a style="font-size:20px;"><?php echo $row['prod_name']; ?></a></h3>
				<div class = "col-md-7">
					
					<img src ="images/products/<?php echo $row['picture1'];?>" style ="margin-bottom:5px;">
					<div class ="col-md-3">
						<?php
							if(!empty($row['picture2'])){
						?>
						<img src ="images/products/<?php echo $row['picture2'];?>">
						<?php
							}
						?>
					</div>
					<div class ="col-md-3">
						<?php
							if(!empty($row['picture3'])){
						?>
						<img src ="images/products/<?php echo $row['picture3'];?>">
						<?php
							}
						?>
					</div>
					<div class ="col-md-3">
						<?php
							if(!empty($row['picture4'])){
						?>
						<img src ="images/products/<?php echo $row['picture4'];?>">
						<?php
							}
						?>
					</div>
					<div class ="col-md-3">
						<?php
							if(!empty($row['picture5'])){
						?>
						<img src ="images/products/<?php echo $row['picture5'];?>">
						<?php
							}
						?>
					</div>
				</div>
		
				<div class="row">
				  
                <div class="col-md-5 text-center">
				 <div class="panel-heading" style="background-color:#0076BE; color:#fff;"><h3 class="panel-title"><b class="glyphicon glyphicon-info-sign"></b>&nbsp;Product Information</h3></div>
                    <div class="box">
					
                        <div class="box-content">
						<div class="row" style = "border-bottom: 1px solid #0076BE;">
							<div class="col-md-5">
								<b style="font-size:12px">Price: </b>
							</div>
							<div class="col-md-7">
								<b style="color:black; font-size:18px;">Php.<?php  echo number_format($row['price'],2,'.',','); ?></b>
							</div>
						</div>
				
						<div class="row" style = "border-bottom: 1px solid #0076BE;">
							<div class="col-md-5">
								<b style="font-size:12px">Date Posted: </b>
							</div>
							<div class="col-md-7">
								<b style="color:black; font-size:18px;"><?php  echo $row['date_posted']; ?></small></b>
							</div>
						</div>
						<div class="row" style = "border-bottom: 1px solid #0076BE;">
							<div class="col-md-5">
								<b style="font-size:12px">Condition: </b>
							</div>
							<div class="col-md-7">
								<b style="color:black; font-size:16px;"><?php  echo $row['condition']; ?></small></b>
							</div>
						</div>
						<div class="row" >
							<div class="col-md-5">
								<b style="font-size:12px">Location: </b>
							</div>
							<div class="col-md-7">
								<b style="color:black; font-size:18px;"><?php  echo $row['muni_city'] . ", " . $row['province']; ?></small></b>
							</div>
						</div>						
                        </div>
                    </div>
				</div>
			
				 <div class="col-md-5 text-center" style="margin-top:10px;">
				 <div class="panel-heading" style="background-color:#0076BE; color:#fff;"><h3 class="panel-title"><b class="glyphicon glyphicon-exclamation-sign"></b>&nbsp;Seller Information</h3></div>
                    <div class="box">
					
                        <div class="box-content">
						<div class="row" style = "border-bottom: 1px solid #0076BE;">
							<div class="col-md-5">
								<b style="font-size:12px">Name: </b>
							</div>
							<div class="col-md-7">
								<b style="color:black; font-size:18px;"><?php  echo $row['seller']; ?></b>
							</div>
						</div>
						<div class="row" style = "border-bottom: 1px solid #0076BE;">
							<div class="col-md-5">
								<b style="font-size:12px">Contact: </b>
							</div>
							<div class="col-md-7">
								<b style="color:black; font-size:18px;"><?php  echo $row['contact_number']; ?></b>
							</div>
						</div>
							
                        </div>
                    </div>
				</div>
				
				</div>
				<div class="row" >
					<div class="col-md-12">
						<h3 style="color:black;">Description</h3>
						<pre><span style="color:black; font-size:16px;"><?php echo $row['decription']; ?></span></pre>
					</div>
				</div>
				
			<?php
				}
			?>
			
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