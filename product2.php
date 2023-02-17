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
/*
if ($_GET["sort"]=="date_posted" && $_GET["filter"]=="desc" ) {
echo "date_posted & desc";
} else if ($_GET["sort"]=="date_posted" && $_GET["filter"]=="asc" ) {
echo "date_posted & asc";
} else if ($_GET["sort"]=="price" && $_GET["filter"]=="asc" ) {
echo "price & asc";
} else if ($_GET["sort"]=="price" && $_GET["filter"]=="desc" ) {
echo "price & desc";
} else {
echo $_GET['sort'] . " " . $_GET['filter'];
}*/
?>
<table class="table table-bordered table-hover" id="searchable-container">
		<thead>
			<tr>
				<th colspan = "8">
					<FORM NAME="nav" align ="right">

						<div class="col-xs-10">
							<div class="input-group">
								Arranged By:
<SELECT class ="btn btn-default dropdown-toggle" NAME="SelectURL" onChange=
"document.location.href=
document.nav.SelectURL.options[document.nav.SelectURL.selectedIndex].value">
<OPTION VALUE="product2.php?category=<?php echo $_GET['category'];?>&sort=date_posted&filter=desc"
<?php
if ($_GET["sort"]=="date_posted" && $_GET["filter"]=="desc" ) {
//echo "date_posted & desc";
echo "SELECTED";
}?>>
Posted Date (Descending)
<OPTION VALUE="product2.php?category=<?php echo $_GET['category'];?>&sort=date_posted&filter=asc"
<?php
if ($_GET["sort"]=="date_posted" && $_GET["filter"]=="asc" ) {
//echo "date_posted & asc";
echo "SELECTED";
}?>>
Posted Date (Ascending)
<OPTION VALUE="product2.php?category=<?php echo $_GET['category'];?>&sort=price&filter=asc"
<?php
if ($_GET["sort"]=="price" && $_GET["filter"]=="asc" ) {
//echo "price & asc";
echo "SELECTED";
}?>>
Price (Cheapest First)
<OPTION VALUE="product2.php?category=<?php echo $_GET['category'];?>&sort=price&filter=desc"
<?php
if ($_GET["sort"]=="price" && $_GET["filter"]=="desc" ) {
//echo "price & desc";
echo "SELECTED";
}?>>
Price (Most Expensive First)
</SELECT>
							</div>
						</div>
					</form>	
					
				</th>
			</tr>
			</table>

			<?php
				$category = $_GET['category'];
				$sort = $_GET['sort'];
				$filter = $_GET['filter'];
				$rec_limit = 15;
				if (empty($_GET['sort']) || empty($_GET['filter']) ) {
				$sort= 'date_posted';
				$filter= 'desc';
				}
				
				
				if (isset($_GET{'page'})) { //get the current page
					$page = $_GET{'page'};
					$offset = $rec_limit * $page;
				} else {
					// show first set of results
					$page = 0;
					$offset = 0;
				}
				if(!isset($_GET['search'])){
					
					$sql = mysql_query("SELECT * FROM tbl_products WHERE prod_category = '$category' AND status = 'Approved' ORDER BY $sort $filter LIMIT $offset, $rec_limit");

					$sql2 = mysql_query("SELECT * FROM tbl_products WHERE prod_category = '$category' AND status = 'Approved' ORDER BY $sort $filter LIMIT $offset, $rec_limit");
				}else{
					$search = $_GET['search'];
					$province = $_GET['province'];
					$muni_city = $_GET['muni_city'];
					$e_price = $_GET['e_price'];
					
if ($_GET['category']=="Any" && $_GET['search']=="" && $_GET['province']=="" && $_GET['muni_city']==""	&& $_GET['e_price']==""){
//echo "test";
//echo "prod_name like '%$["search"]' and province = $_GET["province"] and $_GET["muni_city"] and price <= $_GET["e_price"]";

}
					if(empty($e_price) || $e_price == 0){
						$s_price = 100000000;
						$p_price ="";
					}else{
						$s_price = $e_price + 500;
						$p_price =number_format($e_price,2,'.',',');
					}
					
					if($_GET['province']=="" || $_GET['province']=="Anywhere"){
						$sql = mysql_query("SELECT * FROM tbl_products WHERE prod_name like '%$search%' AND price <= '$s_price' AND status = 'Approved' ORDER BY date_posted DESC LIMIT $offset, $rec_limit");
						$sql2 = mysql_query("SELECT * FROM tbl_products WHERE prod_name like '%$search%' AND price <= '$s_price' AND status = 'Approved' ORDER BY date_posted DESC");
					}else{
						if($_GET['muni_city']=="" || $_GET['province']=="Anywhere"){
							$sql = mysql_query("SELECT * FROM tbl_products WHERE prod_name like '%$search%' AND price <= '$s_price' AND province like '%$province%' AND muni_city like '%$muni_city%' AND status = 'Approved' ORDER BY date_posted DESC LIMIT $offset, $rec_limit");
							$sql2 = mysql_query("SELECT * FROM tbl_products WHERE prod_name like '%$search%' AND price <= '$s_price' AND province like '%$province%' AND muni_city like '%$muni_city%' AND status = 'Approved' ORDER BY date_posted DESC");
						}else{
							$sql = mysql_query("SELECT * FROM tbl_products WHERE prod_name like '%$search%' AND price <= '$s_price' AND province like '%$province%' AND status = 'Approved' ORDER BY date_posted DESC LIMIT $offset, $rec_limit");
							$sql2 = mysql_query("SELECT * FROM tbl_products WHERE prod_name like '%$search%' AND price <= '$s_price' AND province like '%$province%' AND status = 'Approved' ORDER BY date_posted DESC");
						}
					}
				}
				$rec_count = mysql_num_rows($sql2);
				if(mysql_num_rows($sql) !=0){
				
			?>
			<?php if(isset($_GET['search'])){?>
			<div class ="row">
			<div class = "col-md-3">
				<h4>Key Word:<small style = "color:#f00;"> <?php echo $_GET['search']; ?></small></h4>
			</div>
			<div class = "col-md-3">
				<h4>Estimated Price:<small style = "color:#f00;"> <?php echo $p_price; ?></small></h4>
			</div>
			<div class = "col-md-3">
				<h4>Province: <small style = "color:#f00;"><?php echo $_GET['province']; ?></small></h4>
			</div>	
			<div class = "col-md-3">
				<h4>Muni/City:<small style = "color:#f00;"> <?php echo $_GET['muni_city']; ?></small></h4>
			</div>
			</div>
			<?php }?>
			<div class ="row">
				<?php while($row = mysql_fetch_array($sql)){ ?>
				<div class=  "col-md-4" id ="prod">
					<figure>
						<div style = "" id = "prod_image">
						<a href = "product_info.php?&category=<?php echo $category; ?>&id=<?php echo $row['id']; ?>">
										<img src = "images/products/<?php echo $row['picture1']; ?>" width="70%" height ="100%"> </a>
						</div>
						<figcaption>
							<h4>
								<a href = "product_info.php?&category=<?php echo $row['prod_category']; ?>&id=<?php echo $row['id']; ?>">
									<?php echo substr($row['prod_name'],0,22).".."; ?>
								</a>
							</h4>
							<b style="color:maroon;">Php.<?php echo number_format($row['price'],2,'.',','); ?></b> <br>
							<b style="color:#000;">
								Posted:
								<?php 
									//$date2=date_create(date('Y-m-d'));
									//$date1=date_create($row['date_posted']);
									$date2=date('Y-m-d');
									$date1=$row['date_posted'];
									
									$diff = abs(strtotime($date2) - strtotime($date1));
									$years = floor($diff / (365*60*60*24));
									$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
									$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
									//$diff=date_diff($date1,$date2);
									if($years > 0){
										printf("%d years, %d months, %d days", $years, $months, $days);
									}elseif($months > 0){
										printf("%d months, %d days ago", $months, $days);
									}elseif($days > 0){
										printf("%d days ago", $months, $days);
									}
									//echo $diff->format("%R%a days") . " ago";
								?>
							</b>
							<br>
							<b>Location:</b> <?php echo $row['muni_city']; ?>, <?php echo $row['province']; ?>
						</figcaption>
					</figure>
				</div>
			<?php
				}
			?>
			</div>
			<div class = "row">
				<span class = "pull-left">
					<?php
						if(($rec_count % $rec_limit) != 0){
							$total_page = floor($rec_count / $rec_limit) + 1;
						}else{
							$total_page = floor($rec_count / $rec_limit);
						}
					?>
					<h3>Page <?php echo $page + 1; ?> of <?php echo ($total_page); ?></h3>
				</span>
				<ul class="pager pull-right">
					<li>
						<?php
							if($page > 0){
								$last = $page - 1;
						?>
							<a href="product.php?category=<?php echo $category; ?>&page=<?php echo $last; ?>" aria-label="Previous">
								 <span class = "glyphicon glyphicon-chevron-left"></span> Prev 
							</a>
						<?php
							}
						?>
						
					</li>
					<li>
						<?php
							if (($rec_count / $rec_limit) > $page+1) {
								$next = $page + 1;
						?>
							<a href="product.php?category=<?php echo $category; ?>&page=<?php echo $next; ?>" aria-label="Next">
								Next <span class = "glyphicon glyphicon-chevron-right"></span>
							</a>
						<?php
							}
						?>
						
					</li>
				</ul>
			</div>
			<?php
				}else{
			?>
					<?php if(isset($_GET['search'])){?>
					<div class ="row">
					<div class = "col-md-4">
						<h4>Key Word:<small style = "color:#f00;"> <?php echo $_GET['search']; ?></small></h4>
					</div>
					<div class = "col-md-4">
						<h4>Province: <small style = "color:#f00;"><?php echo $_GET['province']; ?></small></h4>
					</div>	
					<div class = "col-md-4">
						<h4>Muni/City:<small style = "color:#f00;"> <?php echo $_GET['muni_city']; ?></small></h4>
					</div>
					</div>
					<?php }?>
			<?php
					echo "No Record Found";
				}
			?>
        </div>
    </div>
</div>	

		<?php include 'template/footer.php';?>
	</body>
	

	<script type='text/javascript' src='assets/js/jquery.min.js'></script>
    <script type='text/javascript' src='assets/js/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='assets/js/jquery.easing.1.3.js'></script> 
    <script src="assets/js/bootstrap.min.js"></script> 

</html>