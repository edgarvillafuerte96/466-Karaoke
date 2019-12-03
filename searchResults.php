<?php
try{
	$dsn = "mysql:host=courses;dbname=";
	$pdo = new PDO($dsn, "", "");
}

catch(PDOexception $e){
	echo "Connection to database failed: " . $e->getMessage();
}


if($_POST['submit'])
{
    //Get results based on title
	if($_POST['searchType'] == "Title")
	{
		$sql = $pdo->query("SELECT S.title, S.bandArtist, F.version FROM Song S, File F WHERE s.title LIKE ? AND F.songID = S.songID ORDER BY title;");
		$sql->execute($_POST['searchTerm']);

		while($row = $result->fetch())
			echo $row . "<br>";
	}
}
?>
