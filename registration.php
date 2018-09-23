<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Registration</title>
<link rel="stylesheet" type="text/css" href="../css/beerlogger.css">
</head>

<body>
<div class="header">
	<img src="../img/Shadow.png" alt="Beer Shadow" />
</div>
<div class="reg">
	<p>&nbsp;</p>
	<form id="register" action="adduser.php" method="post" autocomplete="on">
		<label>Username: <input type="text" name="user" autofocus required /></label><br />
		<br />
		<label>Password: <input type="password" name="password" required /></label><br />
		<br />
		<label>Email: <input type="email" name="email" required /></label><br />
		<br />
		<input type="submit" name="submit" value="Register" />
	</form>
	</div>
</body>
</html>