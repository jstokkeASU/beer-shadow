<?php

echo $_SERVER['HTTP_USER_AGENT'];
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
else {
       echo "Connected successfully";
}
$sql = "SELECT DISTINCT beer_type FROM beer ORDER by beer_type";
$result = $conn->query($sql);
		
if ($result->num_rows > 0) {
// output data of each row
         while($row = $result->fetch_assoc()) {
            echo "<br /> name: ". $row["beer_type"]. "<br />";
	}
} else {
echo "0 results";
}
$conn->close();
?> 
<?php
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

$sql = "INSERT INTO users (username, password, email)
VALUES ('testadd2', '12345', 'john1@example.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 
<?php
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
else {
       echo "Connected successfully";
}
$sql = "SELECT username, email FROM users";
$result = $conn->query($sql);
		
if ($result->num_rows > 0) {
// output data of each row
         while($row = $result->fetch_assoc()) {
            echo "<br /> Username: ". $row["username"]. " Email:  ". $row["email"]. "<br />";
	}
} else {
echo "0 results";
}
$conn->close();
?>