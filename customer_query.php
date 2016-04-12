<!-- This page is to show particular customer information -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="description" content="MOTOR BIKE SHOPEE"/> 
	<meta name="keywords" content="Bikes, Vechile"/> 
	<meta name="author" content="Parag Mahajan"/>
	<title>Superfast bike shopee - Home </title>
	<link href= "styles/bike-style.css" rel="stylesheet" type="text/css" />
	<script src="jquery-2.1.0.js"></script>
	<!--<script src="product.js"></script> -->
	<script src="alternative.js"></script>
</head>
<body>
	<?php include 'menu.php'; ?>
	<section>
		<h1>Purchase Information for Customers</h1>
		<p>
			<label for="req-cust-id" > Enter your customer Id</label>
			<input type="text" id="req-cust-id" name="cust_id" />
			<input type="button" value="Get History" id="history_button" />
		</p>
		<p id="result">
		</p>
	</section>
	
	<?php include 'footer.php';?>	
</body>
</html>