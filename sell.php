<!DOCTYPE html>


<?php

$msg='';
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$recaptcha=$_POST['g-recaptcha-response'];
if(!empty($recaptcha))
{
include("getCurlData.php");
$google_url="https://www.google.com/recaptcha/api/siteverify";
$secret='6Ldbjw4TAAAAACMMe_pUAmrWoxFCJP1WPHQ9QgaQ';
$ip=$_SERVER['REMOTE_ADDR'];
$url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;
$res=getCurlData($url);
$res= json_decode($res, true);
//reCaptcha success check 
if($res['success'])
{
echo "yes";
}
else
{

include('template/post.php');

 header('Location:sell.php?success');
}

}
else
{
 header('Location:sell.php?failed');
}

}
?>
<?php include("config/database/index.php"); ?>
<html>
	<head>
		
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>OMP - Online Market Philippines</title>

	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/business-plate.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script src = "assets/js/place.js"></script>
	
	</head>
	
	<body>
	<?php include 'template/header.php'; ?>
		
<div class="container" >
    <div class="row">
		<div class="col-md-3 ">
		</div>
        <div class="col-md-6  well">
            <legend><a href="http://www.jquery2dotnet.com"><span class="badge">P</span>&nbsp;</a> Sell your item </legend>
			<?php if(isset($_GET['success'])) {?>
				<div class="alert alert-success" role="alert">
					<b class="glyphicon glyphicon-ok"></b>&nbsp;<span class='msg'><?php echo "Thank you for posting. your post is in process"; ?></span>
				</div>
			<?php }?>
				<?php if(isset($_GET['failed'])) {?>
				<div class="alert alert-danger" role="alert">
					<b class="glyphicon glyphicon-info-sign"></b>&nbsp;<span class='msg'><?php echo "Please Enter Re-Captcha!"; ?></span>
				</div>
			<?php }?>
            <form action="" method="post" enctype="multipart/form-data" class="form" role="form">

		
            <div class="row">
                <div class="col-xs-12 col-md-12">
                   <p style="color:black;">* What are you selling?<input class="form-control" name="prod_name"  type="text" required autofocus/></p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-12">
                   <p style="color:black;">* Item Category
						<select class="form-control" name="prod_category">
							<option></option>
							<?php
								$sql = mysql_query("SELECT * FROM tbl_categories ");
								while($row = mysql_fetch_array($sql)){
							?>
								<option><?php echo $row['prod_category']; ?></option>
							<?php				
								}
							?>
						</select>
				   </p>
                </div>
            </div>  
			 <div class="row">
                <div class="col-xs-12 col-md-12">
					<p style="color:black;">* Price<input class="form-control" name="price"  type="number" required /></p>
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 col-md-12">
					<p style="color:black;">* Condition
					<select class="form-control" name="condition">
							<option></option>
							<option>Brand New</option>
							<option>2nd Hand (Used)</option>
							
					</select></p>
                </div>
            </div>
			 <div class="row">
                <div class="col-xs-12 col-md-12">
                   <p style="color:black;">* Description
				   <textarea class="form-control" name="decription"  required autofocus/></textarea></p>
                </div>
            </div>
			 <div class="row">
                <div class="col-xs-12 col-md-12">
                   <p style="color:black;">Upload Photos
				   <input type="file" name="picture1" id="picture1">
				   <input type="file"  name="picture2" id="picture2" >
				   <input type="file" name="picture3" id="picture3">
				   <input type="file" name="picture4" id="picture4">
				   <input type="file"name="picture5" id="picture5" >
				   </p>
                </div>
            </div>
			 <div class="row">
                <div class="col-xs-12 col-md-12">
                   <p style="color:black;">* Mobile number +63<input class="form-control" placeholder="(9xx xxx xxxx)" name="contact_number" value = "<?php if(isset($_SESSION['ID'])){ echo $contact_no;} ?>"  type="number" maxlength="10" required /></p>
                </div>
            </div>
			 <div class="row">
                <div class="col-xs-12 col-md-12">
                   <p style="color:black;">* Email<input class="form-control" name="email"  value = "<?php if(isset($_SESSION['ID'])){ echo $email;} ?>" type="email" required /></p>
                </div>
            </div>
			<div class="row">
                <div class="col-xs-12 col-md-12">
                   <p style="color:black;">* Province
					<select class ="form-control" name = "province" id ="provi1" onclick = "prov1()" required>
						<option></option>
						<option value  = "Abra">Abra</option>
						<option value  = "Aurora">Aurora</option>
						<option value  = "Albay">Albay</option>
						<option value  = "Apayao">Apayao</option>
						<option value  = "Antique">Antique</option>
						<option value = "Bataan">Bataan</option>
						<option value  = "Batanes">Batanes</option>
						<option value  = "Batangas">Batangas</option>
						<option value  = "Benguet">Benguet</option>
						<option value  = "Biliran">Biliran</option>
						<option value  = "Bohol">Bohol</option>
						<option value  = "Bulacan">Bulacan</option>
						<option value  = "Bukidnon">Bukidnon</option>
						<option value  = "Cagayan">Cagayan</option>
						<option value = "Cavite">Cavite</option>
						<option value  = "Catanduanes">Catanduanes</option>
						<option value  = "Camiguin">Camiguin</option>
						<option value  = "Camarines Sur">Camarines Sur</option>
						<option value  = "Capiz">Capiz</option>
						<option value  = "Cebu">Cebu</option>
						<option value  = "Davao del Sur">Davao del Sur</option>
						<option value  = "Davao del Norte">Davao del Norte</option>
						<option value  = "Guimaras">Guimaras</option>
						<option value  = "Isabela">Isabela</option>
						<option value  = "Iloilo">Iloilo</option>
						<option value  = "Ilocos Norte">Ilocos Norte</option>
						<option value  = "Ilocos Sur">Ilocos Sur</option>
						<option value  = "Kalinga">Kalinga</option>
						<option value  = "Laguna">Laguna</option>
						<option value  = "La Union">La Union</option>
						<option value  = "Lanao del Norte">Lanao del Norte</option>
						<option value  = "Leyte">Leyte</option>
						<option value  = "Marinduque">Marinduque</option>
						<option value = "Metro Manila">Metro Manila</option>
						<option value  = "Misamis Oriental">Misamis Oriental</option>
						<option value  = "Misamis Occidental">Misamis Occidental</option>
						<option value  = "Nueva Vizcaya">Nueva Vizcaya</option>
						<option value  = "Negros Occidental">Negros Occidental</option>
						<option value  = "Nueva Ecija">Nueva Ecija</option>
						<option value  = "North Cotabato">North Cotabato</option>
						<option value  = "Occidental Mindoro">Occidental Mindoro</option>
						<option value  = "Pampanga">Pampanga</option>
						<option value  = "Pangasinan">Pangasinan</option>
						<option value  = "Palawan">Palawan</option>
						<option value  = "Quirino">Quirino</option>
						<option value  = "Quezon">Quezon</option>
						<option value = "Rizal">Rizal</option>
						<option value = "Surigao del Norte">Surigao del Norte</option>
						<option value  = "Sorsogon">Sorsogon</option>
						<option value  = "Southern Leyte">Southern Leyte</option>
						<option value  = "South Cotabato">South Cotabato</option>
						<option value  = "Tarlac">Tarlac</option>
						<option value  = "Zambales">Zambales</option>
					</select>
				   </p>
                </div>
            </div>
			 <div class="row">
                <div class="col-xs-12 col-md-12">
                   <p style="color:black;">* Municipality/City
					<select class ="form-control" name = "muni_city" id ="muni_city1" required>
						<option value = "">Anywhere</option>
					</select>
				   </p>
                </div>
            </div>
			
			<div class="row">
                <div class="col-xs-12 col-md-12">
                   <p style="color:black;">* Name<input class="form-control" name="seller"  type="text" value = "<?php if(isset($_SESSION['ID'])){ echo $name;} ?>" required /></p>
                </div>
            </div>
			<div class="g-recaptcha" data-sitekey="6Ldbjw4TAAAAACMMe_pUAmrWoxFCJP1WPHQ9QgaQ"></div>
            <br />
            <br />
            <input type="checkbox" name="terms&condition" value="" onclick = "prov1()" required><a >*</a > By submitting, I agree to the <a href="terms.php">Terms and Conditions</a> of Onlinemarket-ph.tk
            <br>
			<br>
			<div class="col-md-4 col-md-6">
			<input class="btn btn-lg btn-success btn-block" type="submit" value="Submit">
             </div>
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
	<script>
		function prov1(){	
		var e = document.getElementById("provi1");
		var provi = e.options[e.selectedIndex].value;
		if(provi == 'Anywhere'){
			var opt_muni =[
				"Anywhere",
				""
			];
		}
		else if(provi == 'Abra'){
			var opt_muni =[
				"Bangued",
				"Boliney",
				"Bucay",
				"Bucloc",
				"Daguioman",
				"Danglas",
				"Dolores",
				"La Paz",
				"Lacub",
				"Lagangilang",
				"Lagayan",
				"Langiden",
				"Licuan-Baay"
			];
		}else if(provi == 'Aurora'){
			var opt_muni =[
				"Baler",
				"Casiguran",
				"Dilasag",
				"Dinalungan",
				"Dingalan",
				"Dipaculao",
				"Maria Aurora",
				"San Luis"
			];
		}else if(provi == 'Albay'){
			var opt_muni =[
				"Bacacay",
				"Camalig",
				"Daraga",
				"Guinobatan",
				"Jovellar",
				"Legazpi City",
				"Libon",
				"Ligao City",
				"Malilipot",
				"Malinao",
				"Manito",
				"Oas",
				"Pio Duran",
				"Polangui",
				"Rapu-Rapu",
			];
		}
		document.getElementById('muni_city1').options.length = 0;
		var y = document.getElementById('muni_city1');
		var opt = document.createElement("option");
		opt.text = "Anywhere";
			
		y.add(opt);
		for(x=1;x<=opt_muni.length;x++){
			var y = document.getElementById('muni_city1');
			var opt = document.createElement("option");
			opt.text = opt_muni[x-1];
			
			y.add(opt);
		}
	}
	</script>
</html>