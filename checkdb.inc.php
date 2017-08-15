<?php

$name = $pwd = "";
$msg = "";
$msg01 = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$name = $_POST['name'];
	$pwd = $_POST['pwd'];
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "to_do_list";
	$flag = 0;
	$_SESSION['username']=$name;
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT id, username, email, password FROM users";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) 
		{
			if($row["username"] == $name && $row["password"] == $pwd)
			{
				$flag = 1;
				$msg01 = "Log in successful";
				header("location: profile.php");
			}
			
		}
		if($flag == 0)
    {
			$msg = "Message :";
      $msg01 = "Invalid Username or password";
    }
	} 
	$conn->close();
}

?>