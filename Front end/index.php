<?php


?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Home</title>
		<meta charset="utf-8">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="style.css"/>

	</head>
	<body>
		<header>
			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
    				<div class="navbar-header">
      					<a class="navbar-brand" href="index.php">LGS Fraud Phone Lookup</a>
    				</div>
    				<ul class="nav navbar-nav">
      					<li class="active"><a href="index.php">Home</a></li>
      					<li><a href="addnewnumber.php">Add New Number</a></li>
      					<li><a href="about.php">About</a></li>
    				</ul>
  				</div>
			</nav>	

		</header>
		<div class="row">
			<div class="col-sm-4"></div>
			<div id="image" class="col-sm-4">
				<img src="images/sitelogo.jpg">
			</div>
			<div class="col-sm-4"></div>
		</div>
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<form method="POST" action="numberlookup.php">
					<div class="input-group">
						<input type="text" name="numberquery" maxlength="11" minlength="11" class="form-control" placeholder="Please Enter UK Phone Number">
    					<div class="input-group-btn">
      						<button class="btn btn-default" title="Search" type="submit">
    							<i class="glyphicon glyphicon-search"></i>
							<button class="btn btn-default" formaction="addnewnumber.php" title="Add New Number" type="submit"> 
								<i class="glyphicon glyphicon-plus"></i>
							</button>
      						</button>
    					</div>
  					</div>
				</form>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</body>

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</html>