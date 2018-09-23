<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>BeerShadow Home</title>
    <link rel="stylesheet" type="text/css" href="./css/beerlogger.css">
</head>
<body>
    <script>
        function myAlert() {
            alert("If you have already registered you can use the log in, located in the upper right corner, to add beers and filter the list below.")
        }
    </script>
    <div class="header">
        <img src="../img/Shadow.png" alt="Beer Shadow" />
    </div>
    <div class="header_right">
        <form id="login" action="login.php" method="post" autocomplete="on">
            <fieldset>
                <legend>Member Login</legend>
                <br />
                <label>Username: <input type="text" name="user" required /></label><br />
                <br />
                <label>Password: <input type="password" name="pwd" required /></label><br />
                <br />
                <input type="button" value="Create Account" onclick="window.location.href='registration.php'" /> &nbsp;
                <input type="submit" name="submit" value="Login" />
            </fieldset>
        </form>
    </div>
    <div class="options">
        <form id="beersearch" action="homesearch.php" method="post" autocomplete="on">
            <input type="search" name="searchname" id="searchname" autofocus>
            <input type="submit" name="search" value="Search" />
        </form>
        <br />
        <br />
    </div>

    <div class="table_header">
        <h2>Beer List by Rating</h2>
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
            $servername = "localhost";
            $username = "u793414932_admin";
            $password = "beerdb1234";
            $dbname= "u793414932_beers";
            // Create connection
            try {
                $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $sql = 'CALL GetListAll()';
                $q = $pdo->query($sql);
                $q->setFetchMode(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("Error Occurred:" . $e->getMessage());
            }
            while ($row=$q->fetch()): {
            echo "
            <tr>
                ";
                echo "
                <td><img src=\"../". $row["img"]. "\" alt=\"\" width=\"80\" height=\"140\" /></td>";
                echo "
                <td>". $row["name"]. "</td>";
                echo "
                <td>". $row["brewery"]. "</td>";
                echo "
                <td>". $row["brew_city"]. "</td>";
                echo "
                <td>". $row["city_state"]. "</td>";
                echo "
                <td>". $row["beer_type"]. "</td>";
                echo "
                <td>". $row["abv"]. "</td>";
                echo "
                <td>". $row["ibu"]. "</td>";
                echo "
                <td>". $row["AVG(user_beer.rating)"]. "</td>";
                echo "
            </tr>";
            }
            endwhile;
            ?>
        </table>
    </div>
</body>
</html>
</html>