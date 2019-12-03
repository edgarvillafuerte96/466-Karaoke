<html>
<?php
$username = "z1858089";
$password = "1985Aug25";

try { // if something goes wrong, an exception is thrown
        $dsn = "mysql:host=courses;dbname=z1858089";
        $pdo = new PDO($dsn, $username, $password);
}
catch(PDOexception $e) { // handle that exception
        echo "Connection to database failed: " . $e->getMessage();
}
?>
<html>
        <head>
                <title>Edgar's Karaoke Bar</title>

        </head>
        <body bgcolor=”E1D9D7”>

                <div class="search">
                        <h1 align = "center" class="main-title">Karaoke</h1>
                        <form align = "center" method="post" action="results.php">
                                Search Song: <br> <br>

                                <input type="search" name="searchbox"> <br> <br>
                        </form>
                </div>
        </body>
</html>
