<?php

/*
 Author:Parag Mahajan
 Title: edit_orders.php
 
 file is to edit status of order.
 */
 

$orders = $_POST['orders'];
$count = 0;
foreach($orders as $order)
{

	if($count < 1)
	{}
	else
	{
		require_once ("setting.php"); //connection info 
		$conn = @mysqli_connect($host, $user, $pwd, $sql_db); 
		// Checks if connection is successful
		if (!$conn) {
			// Displays an error message, avoid using die() or exit() as this terminates the execution
			echo json_encode(array('status' => 'error'));  //Would not show in a production script 
		} else {
		
			$query = "UPDATE orders 
						SET order_status = '".$order['order_status']."'
						WHERE order_id = '".$order['order_id']."'";
			
			$result = mysqli_query($conn, $query);
			
			mysqli_close($conn);
			echo json_encode(array('status' => 'success'));
		}
	}
			
	$count++;	
}

?>