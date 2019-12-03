<?php
$username = "z1858089";
$password = "1985Aug25";
try {
        $dsn = "mysql:host=courses;dbname=z1858089";
        $pdo = new PDO($dsn, $username, $password);
}
catch(PDOexception $e) {
        echo "Connection to database failed: " . $e->getMessage();
}
?>
<html>
        <head>
        </head>
        <body>
                <h1>Submission Complete</h1>
<?php
if ((isset($_POST['paid']) ? $_POST['paid'] : null))
{
        $sql = "SELECT * FROM User WHERE name = :name;
        $stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stmt->execute(array(':name' => $_POST['name']));
        $result = $stmt->fetchAll;

        if ($result)
        {

          $userID = $result[userID];
        }
        else
        {
          $sql = "INSERT INTO User(name) VALUES(:name);";
          $stmt2 = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
          $stmt2->execute(array(':name' => $_POST['name']));
          $userID = $pdo->lastInsertId();
        }
        $time = date('H:i:s', time());
        $sql = "INSERT INTO PaidAdd(userID, fileID, time, amount, played) VALUES(:userID, :fileID, :time, :amount, false);";
        $stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stmt->execute(array(':userID' => $userID, ':fileID' => $_POST['file'], ':time' => $time, ':amount' => $_POST['amount']));
        echo "<br>Your song has been added to the paid queue";
}
else
{
        $sql = "SELECT * FROM User WHERE name = :name;";
        $stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stmt->execute(array(':name' => $_POST['name']));
        $result = $stmt->fetch(pdo::FETCH_BOTH);
        if ($result)
        {
                $uid = $result['userID'];
        }
        else
        {
                $sql = "INSERT INTO User(name) VALUES(:name);";
                $stmt2 = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $stmt2->execute(array(':name' => $_POST['name']));
                $userID = $pdo->lastInsertId();
        }
        $time = date('H:i:s', time());
        $sql = "INSERT INTO FreeAdd(userID, fileID, time, played) VALUES(:userID, :fileID, :time, false);";
        $stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stmt->execute(array(':userID' => $uid, ':fileID' => $_POST['file'], ':time' => $time));
        echo "<br>Your song has been added to the free queue";
}
?>
        <br><a href="dj.php">DJ View</a>
        <br><a href="search.php">Back to Search</a>
        </body>
</html>
