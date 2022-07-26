<?php  
include 'connect.php';
$numberquery = $_POST['numberquery'];

$sql = "SELECT * FROM number_record WHERE Phone_Number LIKE " . "'" . $numberquery . "'";
$result = mysqli_query($connection, $sql);
//used for checking the outputs are correct
//var_dump($resultdata);
//die();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Search Results</title>
		<meta charset="utf-8">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="numberlookup.css"/>

	</head>

	<body>

		<header>
			<nav class="navbar navbar-inverse">
				<div class="container-fluid">
    				<div class="navbar-header">
      					<a class="navbar-brand" href="index.php">LGS Fraud Phone Lookup</a>
    				</div>
    				<ul class="nav navbar-nav">
      					<li><a href="index.php">Home</a></li>
      					<li><a href="addnewnumber.php">Add New Number</a></li>
      					<li><a href="about.php">About</a></li>
    				</ul>
  				</div>
			</nav>	

		</header>
		<p>Not seeing any results? Add your number and report your expericence <a class="addnewnumber" href="addnewnumber.php">Here</a></p>

		<?php 

		

 
		


		//  FIRST ATTEMPT TO DISPLAY SEARCH RESULTS
		while ($resultdata=mysqli_fetch_assoc($result)) {
			

			if ($resultdata['Record_Origin'] == "User") {
				echo "<div class='userresult'> <dl>";
				echo "<dt>" . $resultdata['Phone_Number'] . "</dt>";
				echo "<dd> Threat_Level: " . $resultdata['Threat_Level'] . "<br  />  Comment: " . $resultdata['Number_Comment'] . "</dd>" . "<br  />";
				echo " </dl> </div>";
			}
			elseif ($resultdata['Record_Origin'] == "Scraped") {
				echo "<div class='scraperresult'> <dl>";
				echo "<dt>" . $resultdata['Phone_Number'] . "</dt>";
				echo "<dd> Threat Level: " . $resultdata['Threat_Level'] . "</dd>";
				echo "</dl> </div>";

			}

					
		}
		?>
		

	</body>

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</html>