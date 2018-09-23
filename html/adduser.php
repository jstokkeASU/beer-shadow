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
$sql = "INSERT INTO users (username, password, email)
VALUES ('$_POST[user]', '$_POST[password]', '$_POST[email]')";
header('Location: http://beer-shadow.com/html/member.php');
$conn->close();
?>