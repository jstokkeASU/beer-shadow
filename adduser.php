<?php
session_start();
$nameuser = $_POST['user'];
$passworded = $_POST['password'];
$emailed = $_POST['email'];
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
$sql = "INSERT INTO users (username, password, email)
VALUES ('$_POST[user]', '$_POST[password]', '$_POST[email]')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
<?php
//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id from users WHERE username = '$nameuser' AND password = '$passworded' AND email = '$emailed'";
$result = $conn->query($sql);
//$beerid = implode("",$result);
$row=mysqli_fetch_assoc($result);
$newid = implode("",$row);
$_SESSION["userid"] = $newid;
$conn->close();
echo $_SESSION["userid"];
$conn->close();
header('Location: http://www.beer-shadow.com');
?>
