<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>BeerShadow Home Search</title>
<link rel="stylesheet" type="text/css" href="../css/beerlogger.css">
</head>
<body onload="myAlert()">
<div class="header">
	<img src="../img/Shadow.png" alt="Beer Shadow" />
</div>

<div class="header_right">
	<form id="login" action="login.php" method="post" autocomplete="on">
		<fieldset>
			<legend>Member Login</legend>
			<br />
			<label>Username: <input type="text" name="user" required /></label><br />
			<br />
			<label>Password: <input type="password" name="pwd" required /></label><br />
			<br />
			<input type="submit" name="submit" value="Login" />
		</fieldset>
	</form>
</div>
<div class="options">
	<form id="beersearch" action="homesearch.php" method="post" autocomplete="on">
		<input type="search" name="searchname" id="searchname" autofocus>
		<input type="submit" name="search" value="Search" />
	</form>
	<br />
	<br />
</div>
<div class="beeradd">	
	<a href="registration.php">
		<img src="../img/Register.gif" alt="Register" /><br />
	</a>
</div>

<div class="table_header">
	<h2>Beer List by Rating</h2>
</div>
<div class="body_table">
	<table>
		<tr>
			<th>Image</th>
			<th>Beer Name</th>
			<th>Brewery Name</th>
			<th>Brewery City</th>
			<th>Brewery State/Country</th>
			<th>Beer Type</th>
			<th>ABV%</th>
			<th>IBU</th>
			<th>Rating</th>
		</tr>
		
		<?php
		$searchtext = $_POST['searchname'];
		$servername = "localhost";
		$username = "u793414932_admin";
		$password = "beerdb1234";
		$dbname= "u793414932_beers";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT beer.img, beer.name, beer.brewery, beer.brew_city, beer.city_state, beer.beer_type, beer.abv, beer.ibu, AVG(user_beer.rating) FROM `beer`,`user_beer` WHERE beer.id=user_beer.beer_id AND (name LIKE '%$searchtext%' OR brewery LIKE '%$searchtext%') GROUP BY user_beer.beer_id ORDER BY AVG(user_beer.rating)";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
			// output data of each row
				while ($row=mysqli_fetch_assoc($result)) {
					echo "<tr>";
						echo "<td><img src=\"../". $row["img"]. "\" alt=\"\" width=\"80\" height=\"140\"/></td>";
						echo "<td>". $row["name"]. "</td>";
						echo "<td>". $row["brewery"]. "</td>";
						echo "<td>". $row["brew_city"]. "</td>";
						echo "<td>". $row["city_state"]. "</td>";
						echo "<td>". $row["beer_type"]. "</td>";
						echo "<td>". $row["abv"]. "</td>";
						echo "<td>". $row["ibu"]. "</td>";
						echo "<td>". $row["AVG(user_beer.rating)"]. "</td>";
					echo "</tr>";
				}
			}
			else {
				echo "No results for $searchtext.";
			}
		$conn->close();
		?>
	</table>
	
</div>
</body>
</html>