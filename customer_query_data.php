<?php 
 
 /*
 Author:Parag Mahajan
 Title: customer_query_data.php
 
 file is to get particular customer information.
 */
 
if(isset($_POST['cust_id']))
{
	$cust_id = $_POST['cust_id'];
	
	require_once ("setting.php"); //connection info 
	$conn = @mysqli_connect($host, $user, $pwd, $sql_db); 
	
	// Checks if connection is successful
	if (!$conn) {
	
		// Displays an error message, avoid using die() or exit() as this terminates the execution
		
		echo "<p>Database connection failure</p>";  //Would not show in a production script 
	} else {
	
		$query = "SELECT  order_id, order_date, bikes, price, c.fname, c.lname, e_type, order_status
						FROM orders o 
						INNER JOIN customers c ON c.cust_id = o.cust_id
						WHERE c.cust_id = '$cust_id'";
						
		$result = mysqli_query($conn, $query);
		
		$orders [][]= array();
		while ($row = mysqli_fetch_assoc($result)){
			$order = array(); 
			$order['order_id'] = $row['order_id'];
			$order['order_date'] = $row['order_date'];
			$order['price'] = $row['price'];
			$order['fname'] = $row['fname'];
			$order['lname'] = $row['lname'];
			$order['bikes'] = $row['bikes'];
			$order['engine'] = $row['e_type'];
			$order['status'] = $row['order_status'];
			$orders[] = $order;
		}
		// close the database connection
		mysqli_close($conn);
		echo json_encode(array('status' => 'success','orders'=> $orders));
		
	
	}

}

?>