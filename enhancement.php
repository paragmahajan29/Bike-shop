 <!-- This is product list page-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<meta name="description" content="MOTOR BIKE SHOPEE"/> 
	<meta name="keywords" content="Bikes, Vechile"/> 
	<meta name="author" content="Parag Mahajan"/>
	<title>Superfast bike shopee - Enhancement </title>
	<link href= "styles/bike-style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<?php include 'menu.php'; ?>
				<section>
				
						<h1 class="title"> PHP Enhancements </h1>
						<span class="product-links">Following are the PHP enhancement I added in this assignment - </span>
						<ol class="enhancement">
							<li>
								I do create tables dynamically if not exists.
							</li>
							<li>
								I have added foreign key constraint between customers and orders table using cust_id column.
							</li>
							<li>
								I have made use of ajax. 
							</li>
							<li>
								Added login for vendor. Without login user cannot access vendor information page. vendor
								web site cannot be entered directly using a URL.
							</li>
							<li>
								Added logout feature.Vendor web site cannot be entered directly using a URL after logging out.
							</li>
							<li>
								I have added product price information and storing order price in database.
							</li>
						</ol>
						
						<h1 class="title">HTML Enhancements </h1>
							<span class="product-links">Following are the enhancement I added to my page - </span>
							<ol class="enhancement">
								<li>
									I learn to add audio file to pages as follows.<br/>
									<object height="50" width="100" data="videos/tune.mp3"></object>
								</li>
								<li>I learn to add videos to pages as follows <br/>
									<video width="320" height="240" controls>
										<source src="videos/Madagascar3.ogv" type="video/ogg" />
									</video>
								</li>
								<li>Make use of meter tag to show popularity.<br/>
									<a href="product.html">Meter tag</a>
								</li>
								<li>Made use of content editable propery in list so that user can edit the list <br/>
									<a href="index.html"> Contenteditable </a>
								</li>
								<li>Use button type css in product Booikng and Navigation Menu<br/>
									<a href="product.html"> Book Button</a>
								</li>
								<li>
									Learn use of canvas. Addeed space for canvas as following<br/>
									<canvas id="myCanvas" width="200" height="100" style="border:1px solid #c3c3c3;">
									</canvas>
								</li>
								<li>
									References: <ul>
													<li>www.w3schools.com</li>
													<li>www.stackoverflow.com</li>
													<li>www.html5hub.com</li>
												</ul>
								</li>
							</ol>
				</section>
			<?php include 'footer.php';?>	
</body>
</html>