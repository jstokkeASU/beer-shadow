<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>BeerShadow Home</title>
</head>
<body>
<?php
$beersearch = $_POST['searchname'];
$valid = false;
echo "Searching for: $beersearch<br>";
$servername = "localhost";
$username = "id2015090_adminbs";
$password = "password";
$dbname= "id2015090_beershadow";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, name, brewery, brew_city, city_state, beer_type, abv, ibu, img, rating, comments FROM beer WHERE name LIKE '%$beersearch%' OR brewery LIKE '%$beersearch%'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	$valid = true;
	while ($row=mysqli_fetch_assoc($result)) {
		echo "Beer: ". $row['name']. " Brewery: " . $row['brewery'] . "<br>";
	}
}
else {
	echo "Failed to find item.<br>";
}
$conn->close();
?>