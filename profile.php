<?php
session_start();?>
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
	.error {color: #FF0000;}
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
        <li class="active"><a href="#">Home</a></li>
        <li ><a href="list.php">List</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php"><span class="glyphicon glyphicon-user"></span>Log Out</a></li>
      </ul>
    </div>
  </div>
</nav>
<br>
<?php include 'task.inc.php'; ?>
<div class="container-fluid">
<form action="profile.php" method="POST">
  <div class="form-group">
    <label for="task">Task Name:</label>
    <input type="text" class="form-control" id="task" name="task">
  </div>
  <button type="submit" class="btn btn-success">Add Task</button>
</form>
<form action="profile.php" method="GET">
  <div class="form-group">
    <label for="task">Delete Task Name:</label>
    <input type="text" class="form-control" id="task_d" name="task_d">
  </div>
  <button type="submit" class="btn btn-danger">Delete Task</button>
</form>
</div>
</body>

</html>