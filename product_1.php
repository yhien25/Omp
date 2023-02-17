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



	
	</head>
	
	<body>
	<?php include 'template/header.php'; ?>
		
	<div class="container">
    <div class="row">
	
		
        <div class="col-md-3">
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#" style="text-align:center;"><i class="glyphicon glyphicon-menu-right"></i>&nbsp;Categories</a></li>
                <?php
					$sql = mysql_query("SELECT * FROM tbl_categories ORDER BY prod_category ASC");
					while($row = mysql_fetch_array($sql)){
						if(isset($_GET['category'])){
							$category = $_GET['category'];
							if($category == $row['prod_category']){
				?>
								<li class = "active"><a href="product.php?category=<?php echo $row['prod_category']; ?>"><i class="glyphicon glyphicon-asterisk"></i>&nbsp;<?php echo $row['prod_category']; ?></a></li>
				<?php
							}else{
				?>
								<li><a href="product.php?category=<?php echo $row['prod_category']; ?>"><i class="glyphicon glyphicon-asterisk"></i>&nbsp;<?php echo $row['prod_category']; ?></a></li>
				<?php
							}
						}else{
				?>
								<li><a href="product.php?category=<?php echo $row['prod_category']; ?>"><i class="glyphicon glyphicon-asterisk"></i>&nbsp;<?php echo $row['prod_category']; ?></a></li>
				<?php
						}			
					}
				?>

            </ul>
        </div>
		<div class="col-md-9 well">
			<?php
			
			$per_page = 6;         // number of results to show per page
$result = mysql_query("SELECT * FROM tbl_products WHERE prod_category = '$category' and status='Approved' ORDER BY date_posted DESC");
$total_results = mysql_num_rows($result);
$total_pages = ceil($total_results / $per_page);//total pages we going to have

//-------------if page is setcheck------------------//
if (isset($_GET['page'])) {
    $show_page = $_GET['page'];             //it will telles the current page
    if ($show_page > 0 && $show_page <= $total_pages) {
        $start = ($show_page - 1) * $per_page;
        $end = $start + $per_page;
    } else {
        // error - show first set of results
        $start = 0;              
        $end = $per_page;
    }
} else {
    // if page isn't set, show first set of results
    $start = 0;
    $end = $per_page;
}
// display pagination
if(!isset($_GET['page']))
{
	$_GET['page'] = 0;
	$show_page = 0;
}
$page = intval($_GET['page']);

$tpages=$total_pages;
if ($page <= 0)
    $page = 1;
			?>
			
		   
						
           
					
                  
					<?php
				
                    $reload = "product.php?category=" .$category . "&tpages=" . $tpages;
                    // loop through results of database query, displaying them in the table 
                    for ($i = $start; $i < $end; $i++) {
                        // make sure that PHP doesn't try to show results that don't exist
                        if ($i == $total_results) {
                            break;
                        }
                      ?>
					  	
						<div class=  "col-md-4" id ="prod">
								<figure>
									<div style = "" id = "prod_image">
									<img src = "images/products/<?php echo mysql_result($result, $i, 'picture1'); ?>" height ="100%">
									</div>
									<figcaption>
										<h4>
											<a href = "product_info.php?&category=<?php echo $category; ?>&id=<?php echo mysql_result($result, $i, 'id'); ?>">
												<?php echo mb_strimwidth(mysql_result($result, $i, 'prod_name'), 0, 50); ?>
											</a>
										</h4>
										<b style="color:maroon;">Php.<?php echo number_format(mysql_result($result, $i, 'price'),2,'.',','); ?></b> <br>
										<b>Location:</b> <?php echo mysql_result($result, $i, 'muni_city'); ?>, <?php echo mysql_result($result, $i, 'province'); ?>
									</figcaption>
								</figure>
						</div>
						
						<?php
                    }

					
                    // close table>
               
                  
				//include of paginat page
            // pagination
            ?>
          	<div class=  "col-md-8">
				
					
					<?php 
					include ('paginate.php'); 
						if ($total_pages > 1) {
                        echo  paginate($reload, $show_page, $total_pages);
						
                    }
					if($i==0){
						echo "No Record Found";
					}
					
					?>
			
			</div>
      
   

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