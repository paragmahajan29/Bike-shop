<?php 

 /*
 Author:Parag Mahajan
 Title: delete_order.php
 
 file is to delete particular order information.
 */
 
if(isset($_POST['order_id']))
{
	$order_id = $_POST['order_id'];
	
	require_once ("setting.php"); //connection info 
	$conn = @mysqli_connect($host, $user, $pwd, $sql_db); 
	
	// Checks if connection is successful
	if (!$conn) {
	
		// Displays an error message, avoid using die() or exit() as this terminates the execution
		
		echo "<p>Database connection failure</p>";  //Would not show in a production script 
	} else {
	
		$query = "DELETE FROM orders WHERE order_id = '$order_id'";
						
		$result = mysqli_query($conn, $query);
		
		// close the database connection
		mysqli_close($conn);
		echo json_encode(array('status' => 'Success','orders'=> $orders));
		
	
	}

}

?>