<?php
	
/*
 Author:Parag Mahajan
 Title: add_customers.php
 
 file is to add customer information table.
 */
 
 
 
	session_start();
	if(isset($_POST['fname']))
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
			
			// Get data from the customer reg form
			$fname	= trim($_POST["fname"]);
			$lname	= trim($_POST["lname"]);
			$dob	= trim($_POST["dob"]);
			$emailid	= trim($_POST["email"]);
			$mobileno	= trim($_POST["phone"]);
			
			$bil_st	= trim($_POST["bil-st-addr"]);
			$bil_suburb	= trim($_POST["bil-sub-addr"]);
			$bil_state	= trim($_POST["bil-state"]);
			$bil_postcode	= trim($_POST["bil-postcode"]);
			
			$del_st	= trim($_POST["del-st-addr"]);
			$del_suburb	= trim($_POST["del-sub-addr"]);
			$del_state	= trim($_POST["del-state"]);
			$del_postcode	= trim($_POST["del-postcode"]);
						
			$sql_table="customers";
			
			// check: if table does not exist, create it
			$query = "show tables like '$sql_table'";  // another alternative is to just use 'create table if not exists ...'
			$result = @mysqli_query($conn, $query);
			// checks if any tables of this name
			if(mysqli_num_rows($result)==0) {
			
				$fieldDefinition="cust_id INT AUTO_INCREMENT
								, fname VARCHAR(25) NOT NULL
								, lname VARCHAR(25) NOT NULL
								, bod DATE 
								, bil_st VARCHAR(25) NOT NULL
								, bil_suburb VARCHAR(25) NOT NULL
								, bil_state VARCHAR(25) NOT NULL
								, bil_postcode INT(10) NOT NULL
								, del_st VARCHAR(25) NOT NULL
								, del_suburb VARCHAR(25) NOT NULL
								, del_state VARCHAR(25) NOT NULL
								, del_postcode INT(10) NOT NULL
								, email VARCHAR(40) NOT NULL
								, phone VARCHAR(10) NOT NULL
								,PRIMARY KEY(cust_id)
								";
				echo "<p>Table does not exist - create table $sql_table</p>"; // Might not show in a production script 
				$query = "create table " . $sql_table . "(" . $fieldDefinition . ") ENGINE=InnoDB"; 
				
				$result2 = @mysqli_query($conn, $query);
				// checks if the table was created
				if($result2===false) {
					echo "<p class=\"wrong\">Unable to create Table $sql_table.". msqli_errno($conn) . ":". mysqli_error($conn) ." </p>"; //Would not show in a production script 
				} else {
				// display an operation successful message
				echo "<p class=\"ok\">Table $sql_table created OK</p>"; //Would not show in a production script 
				} // if successful query operation

			} else {
				// display an operation successful message
				echo "<p>Table  $sql_table already exists</p>"; //Would not show in a production script 
			} // if successful query operation
			// Set up the SQL command to add the data into the table
			$query = "insert into $sql_table values" ."(
														null
														,'$fname'
														, '$lname'
														, '$dob'
														, '$bil_st'
														, '$bil_suburb'
														, '$bil_state'
														, '$bil_postcode'
														, '$del_st'
														, '$del_suburb'
														, '$del_state'
														, '$del_postcode'
														, '$emailid'
														, '$mobileno'
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
				
			$query = "SELECT max(cust_id) as cust_id 
						FROM $sql_table 
						";
			
			// execute the query and store result into the result pointer
			$result = mysqli_query($conn, $query);
			if ($row = mysqli_fetch_assoc($result)){
			 $_SESSION['cust_id'] = $row["cust_id"];
			}
			
			// close the database connection
			mysqli_close($conn);
			
			header("location:select.php");
				

		} 
	}


?>