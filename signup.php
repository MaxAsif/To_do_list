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
		.navbar{
        margin-bottom: 50px !important;
   				 }
	</style>
</head>

<body>
<?php include 'updatedb.inc.php';?>
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
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php"><span class="glyphicon glyphicon-user"></span> Log in</a></li>
      </ul>
    </div>
  </div>
</nav>
<br>
<div class="container-fluid">
<form class="form-horizontal" action="signup.php" method="POST">
  <div class="form-group">
	<span class="error">* required field.</span>
    <label class="control-label col-sm-2" for="name">Username:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name" placeholder="Enter username" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {echo $_POST['name'];}?>">
      <span class="error">*<?php echo $name_err; ?></span>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {echo $_POST['email'];}?>">
      <span class="error">*<?php echo $email_err; ?></span>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password:</label>
    <div class="col-sm-10"> 
      <input type="password" class="form-control" id="pwd01" name="pwd01" placeholder="Enter password">
      <span class="error">*<?php echo $pwd_err; ?></span>
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Confirm Password:</label>
    <div class="col-sm-10"> 
      <input type="password" class="form-control" id="pwd02" name="pwd02" placeholder="Enter password">
      <span class="error">*<?php echo $pwd_err; ?></span>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="msg"><?php echo @$msg; ?></label>
    <div class="col-sm-10"> 
        <span ><?php echo @$msg01; ?></span>
    </div>
  </div>
  
</form>
</div>

</body>
</html>