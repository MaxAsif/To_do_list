<?php
$name_err = ""; $email_err =""; $pwd_err = "";
$name =""; $email =""; $pwd = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(empty($_POST['name'])) 
	{
		$name_err = "Name is required";
	}
	else
		$name = $_POST['name'];
	
	if(empty($_POST['email'])) 
	{
		$email_err = "Email is required";
	}
	else
		$email = $_POST['email'];
	
	if(empty($_POST['pwd01'])||empty($_POST['pwd02'])) 
	{
		$pwd_err = "Password is required";
	}
	else if($_POST['pwd01'] != $_POST['pwd02'])
		$pwd_err = "Password do not match";
	else
		$pwd = $_POST['pwd01'];
	
		
	if (!preg_match("/^[a-zA-Z ]*$/",$name))
		$name_err = "Only letters and white space allowed"; 
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
		$email_err = "Invalid email format"; 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db_name = "to_do_list";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $db_name);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	if($name_err=="" && $email_err=="" && $pwd_err==""){
		$query = "SELECT username FROM users";
		$result = $conn->query($query);
		if($result->num_rows > 0)
		{
			$flag = 0;
			 while($row = $result->fetch_assoc())
			  {
       			 if($row["username"] == $name)
       			 {
       			 	$msg = 'Message :';
					$msg01 = "Username has already been taken";
					$flag = 1;
       			 }
    		}
		}
		if($flag == 0){
			
			$msg = 'Message :';
				$msg01 = "Added Succesfully ";

			$sql = "INSERT INTO users (username, email, password)
					VALUES ('$name', '$email', '$pwd')"; 
	
			if ($conn->query($sql) === TRUE)
			 {
				$msg = 'Message :';
				$msg01 = 'Sign Up Succesful.<br>Click <a href="index.php">here</a> to log in';
			}
			 else {
				$msg = 'Message :';
				$msg01 = "Error: " . $sql . "<br>" . $conn->error;
			     }
			}

		
	}

	$conn->close();
}
?>