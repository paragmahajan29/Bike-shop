<!-- This is product list page-->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="description" content="MOTOR BIKE SHOPEE"/> 
	<meta name="keywords" content="Bikes, Vechile"/> 
	<meta name="author" content="Parag Mahajan"/>
	<title>Superfast bike shopee - Products </title>
	<link href= "styles/bike-style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<?php include 'menu.php'; ?>
				<section>
					<h1 class="title"> Bikes </h1>
					<ol start="3">
						<li>
							<h2>Ducati Superbike 848 Evo Corsa SE</h2>
							<section>
								<article class="text-content-1">
									<figure>
										<img src="images/ducati_superbike_320x240.jpg" alt="Ducati Superbike 848 Evo Corsa" />
										<figcaption>Dukati 848Evo Corsa</figcaption>
									</figure>	
								</article>
								<aside class="text-content-1" >
									<table>
										<caption>Specifications</caption>
										<thead> 
											<tr>
												<th>Parts</th>
												<th>Description</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Engine</td>
												<td>849.4 cc</td>
											</tr>
											<tr>
												<td>Power (PS@rpm)</td>
												<td>140PS</td>
											</tr>
											<tr>
												<td>No Of Gears</td>
												<td>6</td>
											</tr>
											<tr>
												<td>Top Speed (KPH)</td>
												<td>200</td>
											</tr>
											<tr>
												<td>Fuel Type</td>
												<td>Petrol</td>
											</tr>
										</tbody>
									</table>
								</aside>
								
								<p class="clear">
									The Ducati 848 EVO SE stands apart the Supersport field with its growling L-Twin and namesake displacement – the largest in class.
								</p>
								<p>
									Popularity : <meter value="0.6"></meter><br/>
									<strong>Price: 10000.00 AUD </strong> 
								</p>
								<div ><a href="customer.php" class="button">Book</a></div>
								
							</section>
						</li>
					</ol>
					<a class="product-links" href="product.php"> back</a>
				</section>
			<?php include 'footer.php';?>	
</body>
</html>