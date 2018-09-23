<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Add Beer</title>
<link rel="stylesheet" type="text/css" href="../css/beerlogger.css">
</head>

<body>
<div class="header">
	<img src="../img/Shadow.png" alt="Beer Shadow" />
</div>
<div class="reg">
	<form id="addbeerform" action="addlist.php" method="post" autocomplete="on">
		<label>Name: <input type="text" name="beername" autofocus required /></label><br />
		<label>Brewery: <input type="text" name="brewery" required /></label><br />
		<label>City: <input type="text" name="city" required /></label><br />
		<label>State/County: <input type="text" name="state" required /></label><br />
		<label for="types">Beer Type: </label>
		<select name="types" id="types">
			<option value="Amber">Amber Ale</option>
			<option value="Belgian">Belgian</option>
			<option value="Brown">Brown Ale</option>
			<option value="IPA">IPA</option>
			<option value="Pale Ale">Pale Ale</option>
			<option value="Porter">Porter</option>
			<option value="Stout">Stout</option>
			<option value="Wheat">Wheat</option>
			<option value="Wild/Sour">Wild/Sour</option>
			<option value="Specialty/Seasonal">Specialty/Seasonal</option>
			<option value="Lager/Pilsner">Lager/Pilsner</option>
			<option value="Bock/Dark Lager">Bock/Dark Lager</option>
		</select><br />
		<label>ABV%: <input type="number" name="abv" min="0.1" max="100" step=".01" /></label><br />
		<label>IBU: <input type="number" name="ibu" min="1" max="1000" /></label><br />
		<label>Rating (1-10): <input type="number" name="rating" min="1" max="10" /></label><br />
		<label for "comments">Comments: </label>
		<textarea name="comments" placeholder="Optional Comments"></textarea>
		<input type="submit" value="Add Beer" />
	</form>
</div>
</body>
</html>