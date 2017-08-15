<!DOCTYPE html>
<html lang="en">
  <head>
  <title>TO DO LIST</title>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
    .navbar{
        margin-bottom: 50px !important;
    }
</style>
</head>

<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#">TO DO LIST</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li ><a href="profile.php">Home</a></li>
        <li class="active"><a href="list.php">List</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php"><span class="glyphicon glyphicon-user"></span>Log Out</a></li>
      </ul>
    </div>
  </div>
</nav>
<br>

<?php
session_start();
echo '<div class="well"><strong>'.$_SESSION['username'].'</strong> List :</div>';
//xecho $_SESSION['username'].' list: <br>';
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
$sql = "SELECT * FROM $name";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<a href="#" class="list-group-item">Task Name : '.$row["taskname"].'<span class="input-group-btn">
      <button class="btn btn-default" type="submit">
        <i class="glyphicon glyphicon-minus"></i>
      </button>
    </span><a>';
        //echo 'Taskame: ' . $row["taskname"].'<br>';
    }
} else {
    echo "0 results";
}
?>
<div class="list-group">
  
</div>
</body>
</html>
