<?php
/*
 Author:Parag Mahajan
 Title: vendor.php
 
 This file is for vendor information.
 */
 
session_start();
if(($_SESSION['use'] !='vendor')) // If session is not set that redirect to Login Page                            {
        header("Location:login.php");  
 
//code to filter data
 $filter_query = " ";
		if(isset($_POST['cust_id']) || isset($_POST['date']))
		{
		
			$customer_id = $_POST['cust_id'];
			$date = $_POST['date'];
			
			if(strlen($customer_id)>0 && strlen($date)>0)
			{
				$filter_query = " WHERE cust_id = '$customer_id' AND DATE_FORMAT(order_date,'%y-%m-%d') = '$date'";
			}else if(strlen($customer_id>0))
				{
					$filter_query = " WHERE cust_id = '$customer_id'";
				}else if(strlen($date)>0)
				{
					$filter_query = " WHERE DATE_FORMAT(order_date,'%y-%m-%d') = '$date'";
				}
		}		
		
		
		
		
		
		require_once ("setting.php"); //connection info 
		$conn = @mysqli_connect($host, $user, $pwd, $sql_db); 
		// Checks if connection is successful
		if (!$conn) {
			// Displays an error message, avoid using die() or exit() as this terminates the execution
			// of the PHP script
			echo "<p>Database connection failure</p>";  //Would not show in a production script 
		} else {
			$query = "SELECT order_id, cust_id, order_date, order_status , bikes, price, e_type
					FROM  orders
						";
			
			if(strlen($filter_query)>0)
				$query .= $filter_query;
				
			// execute the query and store result into the result pointer
			$result = mysqli_query($conn, $query);
			$orders [][]= array();
			while ($row = mysqli_fetch_assoc($result)){
				$order = array(); 
				$order['order_id'] = $row['order_id'];
				$order['cust_id'] = $row['cust_id'];
				$order['order_date'] = $row['order_date'];
				$order['order_status'] = $row['order_status'];
				$order['price'] = $row['price'];
				$order['bikes'] = $row['bikes'];
				$order['engine'] = $row['e_type'];
				$orders[] = $order;
			}
			// close the database connection
			mysqli_close($conn);
		}
?>



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
	<h1 class="vendor_heading">Vendor Page</h1>
	<a href ="logout.php" class="vendor_logout"><strong>LOGOUT </strong></a>

	<table id="orders_info">
		<tr> 
			<th>Order Id </th>
			<th>Customer Id</th>
			<th>Purchase Date</th>
			<th>Status</th>
			<th>Bike</th>
			<th>Price</th>
			<th>Engine</th>
			<th>-</th>
		</tr>
		<?php $count = 0;foreach($orders as $order){ if($count == 0){}else{; ?>
		<tr id="<?php echo $order['order_id']; ?>">
			<td> <?php echo $order['order_id']; ?></td>
			<td> <?php echo $order['cust_id'];?></td>
			<td> <?php echo $order['order_date']; ?></td>
			
			
			<td>    <select value="<?php echo $order['order_status']; ?>"> 
						<option value="pending"> pending </option>
						<option value="fulfilled">fulfilled </option>
						<option value="paid">paid </option>
					</select>
			
			</td>
			<td> <?php echo $order['bikes'];?></td>
			<td> <?php echo $order['price'];?></td>
			<td> <?php echo $order['engine'];?></td>
			<td> <a href="#" class="delete_" order-id="<?php echo $order['order_id']; ?>"> delete </a> </td>
		</tr>
		<?php }$count++; }?>
		
	</table>
	<p>
		<input type="button" id="save-button" value="save" />
	</p>
	</section>
	<section>
		<form action="vendor.php" method="post" id="filter-form">
			<label for="f_cust_id">Customer Id</label>
			<input type="text" name="cust_id" id="f_cust_id"/>
			<br/>
			<label for="f_date">Date of Purchase</label>
			<input type="text" name="date" id="f_date" placeholder="yy-mm-dd" />
			<br/>
			<input type="submit" value="Filter"/>
		</form>
	</section>
		
	<?php include 'footer.php';?>	
</body>
</html>