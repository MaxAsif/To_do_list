<?php
echo '<div class="well">Welcome <strong>'.$_SESSION['username'].'</strong></div>';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "to_do_list";
$name = $_SESSION['username'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 
$sql = "CREATE TABLE to_do_list.$name(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,taskname VARCHAR(30) NOT NULL)";
if($conn->query($sql) === TRUE )
	echo 'To do List has been created';

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$taskname = $_POST['task'];
	$sql1 = "INSERT INTO $name (taskname)
	VALUES ('$taskname')";

	if ($conn->query($sql1) === TRUE) {
		echo '<div class="well">Task : <strong>'.$taskname.'</strong>  has been added.</div>';
	} else {
		echo '<div class="well">Error : <strong>'.$sql1.'<br>'.$conn->error;
		//echo "Error: " . $sql1 . "<br>" . $conn->error;
	}
}
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
	$taskname_d = @$_GET['task_d'];
	$sql2 = "DELETE FROM $name WHERE taskname='$taskname_d'";
	if($taskname_d !="")
	{
		if ($conn->query($sql2) === TRUE) {
			echo '<div class="well">Task : <strong>'.$taskname_d.'</strong>  has been deleted.</div>';
			//echo 'Task: '.$taskname_d.' Deleted';
		} else {
			echo '<div class="well">Error : <strong>'.$sql2.'<br>'.$conn->error;
			//echo "Error: " . $sql2 . "<br>" . $conn->error;
		}
	}
}
?>