<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Member Beer Shadow</title>
<link rel="stylesheet" type="text/css" href="css/beerlogger.css">
</head>

<body>
<div class="header">
	<img src="../img/Shadow.png" alt="Beer Shadow" />
</div>
<div class="header_right">
	<p>&nbsp;</p>
</div>
<div class="options">
	<form id="beersearch" action="membersearch.php" method="post" autocomplete="on">
		<input type="search" name="searchname" id="searchname" autofocus>
		<input type="submit" name="search" value="Search" />
	</form>
	<br />
	<br />
	<br />
	<br />
	<form id="filter" action="filter.php" method="post">
		<table id="filters">
			<tr>
				<td id="filter_header" colspan="8">Filter Results</td>
			</tr>
			<tr>
				<th>Beer Type</th>
				<th>Brewery City</th>
				<th>Brewery State/Country</th>
				<th>Brewery Name</th>
				<th>Rating</th>
				<th>User List</th>
				<th>Sort By</th>
				<th></th>
			</tr>
			<tr>	
				<?php
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
				echo "<td>";
					echo "<select name=\"beer_type[]\" id=\"types\" multiple>";
					
					$sql = "SELECT DISTINCT beer_type FROM beer ORDER by beer_type";
					$result = $conn->query($sql);
					
					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							echo "<option value=\"". $row['beer_type']. "\">". $row["beer_type"]. "</option>";
							}
						/*while ($row = mysql_fetch_array($result)) {
							echo "<option value=\"". $row['beer_type']. "\">". $row["beer_type"]. "</option>";
						}*/
					}
					echo "</select>";
				echo "</td>";
				?>
				<?php
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
				echo "<td>";
					echo "<select name=\"city[]\" id=\"city\" multiple>";
					
					$sql = "SELECT DISTINCT brew_city FROM beer ORDER by brew_city";
					$result = $conn->query($sql);
					
					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							echo "<option value=\"". $row['brew_city']. "\">". $row["brew_city"]. "</option>";
							}
					}
					echo "</select>";
				echo "</td>";
				?>
				<?php
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
				echo "<td>";
					echo "<select name=\"location[]\" id=\"location\" multiple>";
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
				echo "<td>";
					echo "<select name=\"brewery[]\" id=\"brewery\" multiple>";
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
				?>
				<td>
					<select name="rating[]" id="rating" multiple>
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
						<option value="IS NOT NULL">All Lists</option>
						<option value="username">Your List</option>
					</select>
				</td>
				<td>
					<select name="order" id="order">
						<option value="beer.beer_type">Beer Type</option>
						<option value="beer.brew_city">City</option>
						<option value="beer.city_state">State/Country</option>
						<option value="beer.brewery">Brewery Name</option>
						<option value="AVG(user_beer.rating)">Rating</option>
					</select>
				</td>
				<td>
					<input type="submit" value="Get Results" />
				</td>
			</tr>
		</table>
	</form>
	<br />
</div>
<div class="beeradd">	
	<a href="addbeer.php">
		<img src="img/addbeer.gif" alt="Add a Beer" /><br />
	</a>
</div>
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
			<th>State/Country</th>
			<th>Beer Type</th>
			<th>ABV%</th>
			<th>IBU</th>
			<th>Rating</th>
		</tr>
		<?php
		$beer_type = "IS NOT NULL";
		$brew_city = "IS NOT NULL";
		$city_state = "IS NOT NULL";
		$brewery = "IS NOT NULL";
		$rating = "IS NOT NULL";
		$order = "rating";
		$beer_type_arr = array();
		
		if (!empty($_POST['beer_type'])){
			$beer_type = "IN ('";
			$beer_type_arr = $_POST['beer_type'];
			$beer_type .= implode("','",$beer_type_arr);
			$beer_type .= "')";
		}
		if (!empty($_POST['city'])){
			$brew_city = "IN ('";
			$city_arr = $_POST['city'];
			$brew_city .= implode("','",$city_arr);
			$brew_city .= "')";
		}
		if (!empty($_POST['location'])){
			$city_state = "IN ('";
			$city_state_arr = $_POST['location'];
			$city_state .= implode("','",$city_state_arr);
			$city_state .= "')";
		}
		if (!empty($_POST['brewery'])){
			$brewery = "IN ('";
			$brewery_arr = $_POST['brewery'];
			$brewery .= implode("','",$brewery_arr);
			$brewery .= "')";
		}
		if (!empty($_POST['rating'])){
			$rating = "IN ('";
			$rating_arr = $_POST['rating'];
			$rating .= implode("','",$rating_arr);
			$rating .= "')";
		}
		if (!empty($_POST['user'])){
			$userchoice = $_POST['user'];
		}
		if ($userchoice == "username"){
			$userchoice = "IN ('";
			$userchoice .= $_SESSION["userid"];
			$userchoice .= ")'";
		}
		if (!empty($_POST['order'])){
			$order = $_POST['order'];
		}
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
		$sql = "SELECT beer.img, beer.name, beer.brewery, beer.brew_city, beer.city_state, beer.beer_type, beer.abv, beer.ibu, AVG(user_beer.rating) 
		FROM `beer`,`user_beer` 
		WHERE beer.id=user_beer.beer_id
		AND beer.beer_type $beer_type
		AND beer.brewery $brewery AND beer.brew_city $brew_city AND beer.city_state $city_state AND beer.beer_type $beer_type 
		AND user_beer.user_id $userchoice AND user_beer.rating $rating
		GROUP BY user_beer.beer_id ORDER BY $order";
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
				echo "0 Results.";
			}
		$conn->close();
		?>
	</table>
</div>
</body>
</html>