<?php
session_start();
$beername = "";
$brewery = "";
$city = "";
$state = "";
$types = "";
$abv = "";
$ibu = "";
$rating = "";
$comments = "";
if ($_POST['beername']) {
	$beername = ($_POST['beername']);
}
if ($_POST['brewery']) {
	$brewery = ($_POST['brewery']);
}
if ($_POST['city']) {
	$city = ($_POST['city']);
}
if ($_POST['state']) {
	$state = ($_POST['state']);
}
if ($_POST['types']) {
	$types = ($_POST['types']);
}
if ($_POST['abv']) {
	$abv = ($_POST['abv']);
}
if ($_POST['ibu']) {
	$ibu = ($_POST['ibu']);
}
if ($_POST['rating']) {
	$rating = ($_POST['rating']);
}
if ($_POST['comments']) {
	$comments = ($_POST['comments']);
}
echo "$beername<br>$brewery<br>$city<br>$state<br>$types<br>$abv<br>$ibu<br>$rating<br>$comments<br>";

$userid = $_SESSION["userid"];
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
$sql = "INSERT INTO beer (name, brewery, brew_city, city_state, beer_type, abv, ibu)
VALUES ('$beername', '$brewery', '$city', '$state', '$types', '$abv', '$ibu')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
<?php
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id from beer WHERE name = '$beername' AND brewery = '$brewery' AND beer_type = '$types'";
$result = $conn->query($sql);
//$beerid = implode("",$result);
$row=mysqli_fetch_assoc($result);
$beerid = implode("",$row);
$conn->close();
?>
<?php
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO user_beer (user_id, beer_id, rating, comments)
VALUES ('$userid', '$beerid', '$rating', '$comments')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
header('Location: http://www.beer-shadow.com/member.php');
?> 