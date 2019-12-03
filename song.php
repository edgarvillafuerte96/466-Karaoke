
                <h1>Submission Complete</h1>
<?php
if ((isset($_POST['paid']) ? $_POST['paid'] : null))
{
<?php
$username="z1859426"
$password="1997Jun10"
try {
        $dsn = "mysql:host=courses;dbname=z1859426";
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
        $timeDate = date('H:i:s', time());
        $sql = "INSERT INTO SELECTS(userID, fileID, timeDate, amount) VALUES(:userID, :fileID, :timeDate, :amount, false);";
        $stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stmt->execute(array(':userID' => $userID, ':fileID' => $_POST['file'], ':timeDate' => $timeDate, ':amount' => $_POST['amount']));
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
                $userID = $result['userID'];
        }
        else
        {
                $sql = "INSERT INTO User(name) VALUES(:name);";
                $stmt2 = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
                $stmt2->execute(array(':name' => $_POST['name']));
                $userID = $pdo->lastInsertId();
        }
        $timeDate = date('H:i:s', time());
        $sql = "INSERT INTO SELECTS(userID, fileID, timeDate) VALUES(:userID, :fileID, :timeDate, false);";
        $stmt = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $stmt->execute(array(':userID' => $userID, ':fileID' => $_POST['file'], ':timeDate' => $timeDate));
        echo "<br>Your song has been added to the free queue";
}
?>
        <br><a href="dj.php">DJ View</a>
        <br><a href="search.php">Back to Search</a>
        </body>
</html>

