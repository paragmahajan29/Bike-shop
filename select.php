<!-- This is product list page-->

<?php 
session_start();
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="description" content="MOTOR BIKE SHOPEE"/> 
	<meta name="keywords" content="Bikes, Vechile"/> 
	<meta name="author" content="Parag Mahajan"/>
	<title>Superfast bike shopee - selection </title>
	<link href= "styles/bike-style.css" rel="stylesheet" type="text/css" />
	<script> localStorage.cust_id = <?php echo $_SESSION['cust_id']; ?>;</script>
	<script src="jquery-2.1.0.js"></script>
	<!--<script src="product.js"></script> -->
	<script src="alternative.js"></script>
	
</head>
<body>
	<?php include 'menu.php'; ?>
				<section>
					<h2 class="title"> Choose Your Bike</h2>
					<form id="page-select" action="http://mercury.ict.swin.edu.au/it000000/formtest.php" method="post">
					<fieldset>
						<legend> Selection </legend>
						<fieldset>
							<legend> Bike </legend>
							<label for="b1">Suzuki Hayabusa</label>
							<input type="checkbox" id="b1" name="bike1" value="Suzuki Hayabusa"/><br/>
							<label for="b3">BMW 1000 RR</label>
							<input type="checkbox" id="b2" name="bike2" value="BMW 1000 RR"/><br/>
							<label for="b3">Dukati 848Evo Corsa</label>
							<input type="checkbox" id="b3" name="bike3" value="Dukati Corsa"/>
						</fieldset>
						<fieldset>
							<legend>Engine type</legend>
							<label for="e1">Petrol</label>
							<input type="radio" id="e1" name="engine" value="petrol"/><br/>
							<label for="e2">Disel</label>
							<input type="radio" id="e2" name="engine" value="diesel"/><br/>
						</fieldset>
						
						<a href="customer.php"  class="nav-button" id="customer-prev">Customer</a>
						<a href="purchase.php" class="nav-button" id="select-next">Purchase</a>
					</fieldset>
					</form>
				</section>
			<?php include 'footer.php';?>	
</body>
</html>