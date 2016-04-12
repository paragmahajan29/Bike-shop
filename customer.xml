<!-- This is product list page-->


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="description" content="MOTOR BIKE SHOPEE"/> 
	<meta name="keywords" content="Bikes, Vechile"/> 
	<meta name="author" content="Parag Mahajan"/>
	<title>Superfast bike shopee - Customer registration </title>
	<link href= "styles/bike-style.css" rel="stylesheet" type="text/css" />
	<script src="jquery-2.1.0.js"></script>
	<!--<script src="product.js"></script> -->
	<script src="alternative.js"></script>
	
</head>
<body>
	<?php include 'menu.php'; ?>
				<section>
					<h2 class="title"> Customer Registration </h2>
					<form id="page-customer" action="add_customer.php" method="post">
						<fieldset>
							<legend> Customer Information  </legend>
								<p>
								<label for="fname"> First Name </label>
								<input type="text" id="fname" name="fname" pattern="[a-zA-Z\s]+" maxlength="20"  required="required"/><br/>
								</p>
								<p>
								<label for="lname"> Last Name </label>
								<input type="text" id="lname" name="lname" maxlength="20" pattern="[a-zA-Z\s]+" required="required"/><br/>
								</p>
								<p>
								<label for="dob"> DOB </label>
									<input type="text" id="dob" name="dob" pattern="\d{1,2}/\d{1,2}/\d{4}" /><br/>
								</p>
								<fieldset>
									<legend> Billing Address</legend>
									<p>
										<label for="bil-st-addr"> Street Address</label>
										<input type="text" id="bil-st-addr" name="bil-st-addr" maxlength="40"  required="required"/>
									</p>
									<p>
										<label for="bil-sub-addr"> Suburb/Town Address</label>
										<input type="text" id="bil-sub-addr" name="bil-sub-addr" maxlength="20"  required="required"/>
									</p>
									<p>
										<label for="bil-state"> State</label>
										<select id="bil-state" name="bil-state">
											<option>VIC</option>
											<option>NSW</option>
											<option>QLD</option>
											<option>NT</option>
											<option>WA</option>
											<option>SA</option>
											<option>TAS</option>
											<option>ACT</option>
										</select>
									</p>
									<p>
										<label for="bil-postcode">Post Code</label>
										<input type="text" id="bil-postcode" name="bil-postcode" pattern="[0-9]{4}" required="required"/>
									</p>
								</fieldset>
								<p>
									Delivery Address same as Billing Address <input type="checkbox" id="same-dilvery-addr-box" />
								</p>
								<fieldset>
									<legend> Delivery Address</legend>
									<p>
										<label for="del-st-addr"> Street Address</label>
										<input type="text" id="del-st-addr" name="del-st-addr" maxlength="40"  required="required"/>
									</p>
									<p>
										<label for="del-sub-addr"> Suburb/Town Address</label>
										<input type="text" id="del-sub-addr" name="del-sub-addr" maxlength="20"  required="required"/>
									</p>
									<p>
										<label for="del-state"> State</label>
										<select id="del-state" name="del-state">
											<option>VIC</option>
											<option>NSW</option>
											<option>QLD</option>
											<option>NT</option>
											<option>WA</option>
											<option>SA</option>
											<option>TAS</option>
											<option>ACT</option>
										</select>
									</p>
									<p>
										<label for="del-postcode">Post Code</label>
										<input type="text" id="del-postcode" name="del-postcode" pattern="[0-9]{4}" maxlength="4"  required="required"/>
									</p>
								</fieldset>
								<p>
									<label for="email"> Email </label>
									<input type="email" id="email" name="email" placeholder="xx@xxx.xxx" />
								</p>
								<p>
									<label for="phone"> Mobile </label>
									<input type="text" id="phone" name="phone" placeholder="10 digit number" />
								</p>
								<input type="submit" value="submit"/>
								<input type="reset" value="reset"/>
								
							
						</fieldset>
					</form>
				</section>
<?php include 'footer.php';?>	
</body>
</html>