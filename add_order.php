<?php
	
/*
 Author:Parag Mahajan
 Title: add_order.php
 
 file is to add order information information.
 */
 	
	if(isset($_POST['card-number']))
	{
		require_once ("setting.php"); //connection info 
		$conn = @mysqli_connect($host, $user, $pwd, $sql_db); 
		// Checks if connection is successful
		if (!$conn) {
			// Displays an error message, avoid using die() or exit() as this terminates the execution
			// of the PHP script
			echo "<p>Database connection failure</p>";  //Would not show in a production script 
		} else {
			// Upon successful connection
			echo print_r($_POST,true);
			// Get data from the customer reg form
			$card_type	= trim($_POST["card_type"]);
			$card_name	= trim($_POST["card-name"]);
			$card_number	= trim($_POST["card-number"]);
			$exp_month	= trim($_POST["exp-month"]);
			$exp_year	= trim($_POST["exp-year"]);
			
			$bikes	= trim($_POST["bikes"]);
			$price	= trim($_POST["price"]);
			$cust_id	= trim($_POST["cust_id"]);
			$e_type	= trim($_POST["e_type"]);
						
			$sql_table="orders";
			
			// check: if table does not exist, create it
			$query = "show tables like '$sql_table'";  // another alternative is to just use 'create table if not exists ...'
			$result = @mysqli_query($conn, $query);
			// checks if any tables of this name
			if(mysqli_num_rows($result)==0) {
			
			$fieldDefinition="order_id INT AUTO_INCREMENT PRIMARY KEY
							, cust_id INT(11)
							, order_date DATETIME NOT NULL 
							, cr_type VARCHAR(20) NOT NULL
							, cr_number VARCHAR(16) NOT NULL
							, cr_name VARCHAR(25) NOT NULL
							, cr_exp VARCHAR(10) NOT NULL
							, order_status VARCHAR(10) NOT NULL
							, bikes VARCHAR(25) NOT NULL
							, price FLOAT(40) NOT NULL
							, e_type VARCHAR(10) NOT NULL
							,CONSTRAINT orders_ibfk_1
							  FOREIGN KEY (cust_id)
							  REFERENCES customers (cust_id)
							  ON DELETE CASCADE
							";
							
				echo "<p>Table does not exist - create table $sql_table</p>"; // Might not show in a production script 
				$query = "create table " . $sql_table . "(" . $fieldDefinition . ")ENGINE=InnoDB";
				echo $query;
				$result2 = @mysqli_query($conn, $query);
				// checks if the table was created
				if($result2===false) {
					echo "<p class=\"wrong\">Unable to create Table $sql_table </p>"; //Would not show in a production script 
				} else {
				// display an operation successful message
				echo "<p class=\"ok\">Table $sql_table created OK</p>"; //Would not show in a production script 
				} // if successful query operation

			} else {
				// display an operation successful message
				echo "<p>Table  $sql_table already exists</p>"; //Would not show in a production script 
			} // if successful query operation
			// Set up the SQL command to add the data into the table
			$query = "insert into $sql_table (cust_id
											, order_date
											, cr_type 
											, cr_number
											, cr_name
											, cr_exp
											, order_status
											, bikes
											, price
											, e_type
											)values (
														'$cust_id'
														,  NOW()
														, '$card_type'
														, '$card_number'
														, '$card_name'
														, '$exp_month/$exp_year '
														, 'pending'
														, '$bikes'
														, '$price'
														, '$e_type'
														)";
			// execute the query
			$result = mysqli_query($conn, $query);
			// checks if the execution was successful
			if(!$result) {
				echo "<p class=\"wrong\">Something is wrong with ",	$query, "</p>";  //Would not show in a production script 
			} else {
				// display an operation successful message
				echo "<p class=\"ok\">Successfully added New member</p>";
			} // if successful query operation
					
			// close the database connection
			mysqli_close($conn);
			header("location:select.php");
		}  
	}


?>