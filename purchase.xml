<!-- This is product list page-->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="description" content="MOTOR BIKE SHOPEE"/> 
	<meta name="keywords" content="Bikes, Vechile"/> 
	<meta name="author" content="Parag Mahajan"/>
	<title>Superfast bike shopee - Purchase </title>
	<link href= "styles/bike-style.css" rel="stylesheet" type="text/css" />
	<script src="jquery-2.1.0.js"></script>
	<!--<script src="product.js"></script> -->
	<script src="alternative.js"></script>
	
</head>
<body>
	<?php include 'menu.php'; ?>
				<section>
					<h2 class="title"> Purchase page </h2>
					<p>
						Customer ID : <span id="cid"> </span>
					</p>
					
					<p>
						Customer Name : <span id="cname"> </span>
					</p>
					<p>
						Bikes : <span id="cbikes"> </span>
					</p>
					<p>
						Engine Type : <span id="cengine"> </span>
					</p>
					<p>
						Price : <span id="cprice"> </span> AUD
					</p>
					
					<p>
						Customer Address :  <span id="caddr"> </span>
					</p>
					<p>
						Email : <span id="cemail"> </span>
					</p>
					<p>
						Phone : <span id="cphone"> </span>
					</p>
					<form id="page-purchase" action="add_order.php" method="post">
					<fieldset>
						<legend> Buy </legend>
						<p>
							<label for="card-type"> Card Type </label>
							<select id="card-type" name="card_type">
								<option>American Express</option>
								<option>VISA</option>
								<option>Mastercard</option>
							</select>
						</p>
						<p>
							<label for="card-name"> Name on Card</label>
							<input type="text" id="card-name" name="card-name" pattern="[a-zA-Z\s]+" maxlength="30" required="required"/>
						</p>
						<p>
							<label for="card-number">Card Number</label>
							<input type="text" id="card-number" name="card-number" pattern="[0-9]{16}" required="required" />
						</p>
						<p>
							<label> Expiry Date</label>
							<input type="text" id="exp-month" name="exp-month" pattern="[0-9][0-9]" placeholder="mm" required="required" size="2" />-
							<input type="text" id="exp-year" name="exp-year" pattern="[0-9][0-9]" placeholder="yy" required="required" size="2"/>
						</p>
						<input type="hidden" name="bikes" id="bikes_"/>
						<input type="hidden" name="price" id="price"/>
						<input type="hidden" name="cust_id" id="cust_id"/>
						<input type="hidden" name="e_type" id="e_type"/>
						
						<input type="submit" value="submit"/>
						<a href="customer.php" class="nav-button" >Customer Registration</a>
						<a href="select.php" class="nav-button" >Select Page</a>
					</fieldset>
					</form>
				</section>
			<?php include 'footer.php';?>	
	
	
</body>
</html>