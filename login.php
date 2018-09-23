<?php
session_start();
$usrnm = $_POST['user'];
$pswd = $_POST['pwd'];
$valid = false;
echo "Username: $usrnm Password: $pswd <br>";
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
$sql = "SELECT id, username, password, email FROM users";
$result = $conn->query($sql);
while ($row=mysqli_fetch_assoc($result)) {
	echo "User: ". $row["username"]. "Password: ". $row["password"]. "<br>";
	if ($usrnm == $row["username"] && $pswd == $row["password"]) {
		$_SESSION["userid"] = $row["id"];
		$valid = true;
	}
}
if ($valid == true) {
	header('Location: http://www.beer-shadow.com/member.php');
}
else {
	header('Location: http://www.beer-shadow.com/?id=Invalid Login: $usrnm$pswdHere');
}
$conn->close();
?>
