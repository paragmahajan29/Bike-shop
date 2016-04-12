<?php  

session_start(); // session starts with the help of this function 


if(isset($_SESSION['use']))   // Checking whether the session is already there or not if 
                              // true that header redirect it to the home page directly 
 {
    header("Location:vendor.php"); 
 }
 
 $error = false;
if(isset($_POST['username']))   // it checks whether the user clicked login button or not 
{
    $username = $_POST['username'];
    $pass = $_POST['pass'];
	
    if( $username == 'vendor' && $pass =='1234')   
	{                                 
		$_SESSION['use'] = $username;
		echo '<script type="text/javascript"> window.open("vendor.php","_self");</script>';            //  On Successful Login redirects to home.php
	}
	else
	{
		$error = true;        
    }
}

 

				
	
 ?>
<!DOCTYPE html>  
<html>
<head>

<title> Login Page   </title>
<link href= "styles/bike-style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php include 'menu.php';

if($error)
{
	echo'<p> Invalid Username or Password </p>';
}

?>
	

	<form action="login.php" method="post">
		<fieldset class="login_form">
			<legend>login</legend>
			
			<article>
				<label for="lusername">Username</label>
				<input type="text" name="username" id="lusername"/>
			</article>
			<article>
				<label for="lpassword">Password </label>
				<input type="password" name="pass" id="lpassword"/>
			</article>	
			<article>
				<input type="submit" name="login" value="LOGIN"/>
			</article>	
		</fieldset>
	</form>
<?php include 'footer.php';?>	
</body>
</html>