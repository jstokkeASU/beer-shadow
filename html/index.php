<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>BeerShadow Home</title>
<link rel="stylesheet" type="text/css" href="../css/beerlogger.css">
</head>

<body onload="myAlert()">
<!-- comment out for load purpose
<script>
function myAlert(){
	alert("To login, enter your username and password in the upper right corner.")
}
</script>
<div class="header">
	<img src="../img/Shadow.png" alt="Beer Shadow" />
</div>
-->
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
<!-- comment out for load
<div class="options">
	<form id="beersearch" action="member.html" method="get" autocomplete="on">
		<input type="search" name="searchname" id="searchname" autofocus>
		<input type="submit" name="search" value="Search" />
	</form>
	<br />
	<br />
	<form id="filter" action="/action_page.php" method="get">
		<table id="filters">
			<tr>
				<td id="filter_header" colspan="7">Filter Results</td>
			</tr>
			<tr>
				<th>Beer Type</th>
				<th>Brewery Location</th>
				<th>Brewery Name</th>
				<th>Rating</th>
				<th>User List</th>
				<th>Sort By</th>
				<th></th>
			</tr> 
			-->
			 <?php
					/* COMMENT
				
                                         $servername = "mysql.hostinger.com";
                                        $username = "u793414932_admin";
                                           $password = "QAk4f58KwOc4";
                                          $dbname= "u793414932_beers";
					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);
					// Check connection
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}
			echo "<tr>";
				echo "<td>";
					echo "<select name=\"beer_type\" id=\"types\" multiple>";
					
					$sql = "SELECT DISTINCT beer_type FROM beer ORDER by beer_type";
					$result = $conn->query($sql);
					
					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							echo "<option value=\"". $row['beer_type']. "\">". $row["beer_type"]. "</option>";
							}
						}
					}
					echo "</select>";
				echo "</td>";
				
				?>
				<?php
				$servername = "mysql.hostinger.com";
                                        $username = "u793414932_admin";
                                           $password = "QAk4f58KwOc4";
                                          $dbname= "u793414932_beers";
				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
				echo "<td>";
					echo "<select name=\"location\" id=\"location\" multiple>";
					$sql = "SELECT DISTINCT city_state FROM beer ORDER by city_state";
					$result = $conn->query($sql);
					
					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							echo "<option value=\"". $row['city_state']. "\">". $row["city_state"]. "</option>";
						}
					}
					echo "</select>";
				echo "</td>";
				?>
				<?php
					$servername = "mysql.hostinger.com";
                                        $username = "u793414932_admin";
                                           $password = "QAk4f58KwOc4";
                                          $dbname= "u793414932_beers";
					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);
					// Check connection
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}
				echo "<td>";
					echo "<select name=\"brewery\" id=\"brewery\" multiple>";
						$sql = "SELECT DISTINCT brewery FROM beer ORDER by brewery";
					$result = $conn->query($sql);
					
					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							echo "<option value=\"". $row['brewery']. "\">". $row["brewery"]. "</option>";
						}
					}
					echo "</select>";
				echo "</td>";
				*/?> 
				<!--
				<td>
					<select name="rating" id="rating" multiple>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
					</select>
				</td>
				<td>
					<select name="user" id="user">
						<option value="username">Your List</option>
						<option value="*">All Lists</option>
					</select>
				</td>
				<td>
					<select name="order" id="order">
						<option value="types">Beer Type</option>
						<option value="location">Brewery Location</option>
						<option value="brewery">Brewery Name</option>
						<option value="rating">Rating</option>
					</select>
				</td>
				<td>
					<input type="submit" name="submit" value="Get Results" />
				</td>
			</tr>
		</table>
	</form>
	<br />
</div>
<div class="beeradd">	
	<a href="registration.php">
		<img src="../img/Register.gif" alt="Register" /><br />
	</a>
</div>
-->
<div class="table_header">
	<h2>List of Beers</h2>
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
		$servername = "mysql.hostinger.com";
                                        $username = "u793414932_admin";
                                           $password = "QAk4f58KwOc4";
                                          $dbname= "u793414932_beers";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT img,name,brewery,brew_city,city_state,beer_type,abv,ibu,rating FROM beer ORDER BY rating DESC, brewery ASC";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		// output data of each row
			while($row = $result->fetch_assoc()) {
			echo "<tr>";
				echo "<td><img src=\"../". $row["img"]. "\" alt=\"\" width=\"80\" height=\"140\"/></td>";
				echo "<td>". $row["name"]. "</td>";
				echo "<td>". $row["brewery"]. "</td>";
				echo "<td>". $row["brew_city"]. "</td>";
				echo "<td>". $row["city_state"]. "</td>";
				echo "<td>". $row["beer_type"]. "</td>";
				echo "<td>". $row["abv"]. "</td>";
				echo "<td>". $row["ibu"]. "</td>";
				echo "<td>". $row["rating"]. "</td>";
			echo "</tr>";
			}
		}
		$conn->close();
		?> 
	</table>
</div>
</body>
</html>