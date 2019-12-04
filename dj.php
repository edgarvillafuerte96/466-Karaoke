﻿<?php
	$password = "1985Aug25";
    $username = "z1858089";
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
    <meta charset="UTF-8">
    <title>DJ View</title>
</head>
<body class="grey">
    <div class="top-buffer"></div>
    <div class="banner">
        <h1 class="banner-title">DJ View</h1>
    </div>
    <form id="DJ1" method="post" action="dj.php">
        <h1 class="table-header">Paid Queue</h1>
        <div class="card">
            <table class="result-table">
                <tbody>
                    <?php
                    //Paid add
                      $sql = "SELECT U.name, SN.title, SN.bandArtist, F.fileID, F.version, SL.amount, F.version
                            FROM USER AS U
                            INNER JOIN SELECTS AS SL
                            ON U.USERID = SL.USERID
                            INNER JOIN FILES AS F
                            ON SL.FILEID = F.FILEID
                            INNER JOIN SONG SN
                            ON F.SONGID = SN.SONGID
                           WHERE SL.AMOUNT > 0;";


                    $result = $pdo->query($sql);
4                       echo "
                    <table border=1>
                        ";
                        echo '
                        <td width="70">Select</td>';
                        echo '
                        <td width="70">Title</td>';
                        echo '
                        <td width="70">Version</td>';
                        echo '
                        <td width="70">Artist</td>';
                        echo '
                        <td width="70">Name</td>';
                        echo '
                        <td width="70">FileID</td>';
                        echo '
                        <td width="70">Amount</td>';
                        echo "
                        <table />";

                        foreach ($result as $rows){
                        echo "
                        <table border=1>
                            ";
                            //button to select
														echo "<tr class = 'item'>";
                            echo '
                            <td width="70">
                                ';
                                echo '<input type="radio" name="selected" ';
							echo '
                            </td>';
                            echo '
                            <td width="70">
                                ';
                                echo $rows['title'];
                                echo '
                            </td>';
                            echo '
                            <td width="70">
                                ';
                                echo $rows['version'];
                                echo '
                            </td>';
                            echo '
                            <td width="70">
                                ';
                                echo $rows['bandArtist'];
                                echo '
                            </td>';
                            echo '
                            <td width="70">
                                ';
                                echo $rows['name'];
                                echo '
                            </td>';
                            echo '
                            <td width="70">
                                ';
                                echo $rows['fileID'];
                                echo '
                            </td>';
                            echo '
                            <td width="70">
                                ';
                                echo $rows['amount'];
                                echo '
                            </td>';
                            echo "
                            <table />";
														echo "</tr>";
                            }

                            echo "
                        </table>";
                        echo "
                        <br />";
                        ?>
                </tbody>
            </table>
        </div>
    </form>
    <form id="DJ2" method="post" action="dj.php">
        <h1 class="table-header">Free Queue</h1>
        <div class="card">
            <table class="result-table">
                <tbody>
                    <?php

                    //free
					$sql = "SELECT U.name, SN.title, SN.bandArtist, F.fileID, F.version, SL.amount, F.version
					FROM USER AS U
					INNER JOIN SELECTS AS SL
					ON U.USERID = SL.USERID
					INNER JOIN FILES AS F
					ON SL.FILEID = F.FILEID
					INNER JOIN SONG SN
					ON F.SONGID = SN.SONGID
				   WHERE SL.AMOUNT = 0;";
                    $result = $pdo->query($sql);
					echo "
                    <table border=1>
                        ";
                        echo '
                        <td width="70">Select</td>';
                        echo '
                        <td width="70">Title</td>';
                        echo '
                        <td width="70">Version</td>';
                        echo '
                        <td width="70">Artist</td>';
                        echo '
                        <td width="70">Name</td>';
                        echo '
                        <td width="70">FileID</td>';
						echo "
                        <table />";

                        foreach ($result as $rows){
							echo "
							<table border=1>
								";
								//button to select
								echo '
								<td width="70">
									';
									echo '<input type="radio" name="selected" ';
		echo '
								</td>';
								echo '
								<td width="70">
									';
									echo $rows['title'];
									echo '
								</td>';
								echo '
								<td width="70">
									';
									echo $rows['version'];
									echo '
								</td>';
								echo '
								<td width="70">
									';
									echo $rows['bandArtist'];
									echo '
								</td>';
								echo '
								<td width="70">
									';
									echo $rows['name'];
									echo '
								</td>';
								echo '
								<td width="70">
									';
									echo $rows['fileID'];
									echo '
								</td>';
								echo "
								<table />";
								}
                            echo "
                        </table>";
                        echo "
                        <br />";
                        ?>
                </tbody>
            </table>
        </div>
    </form>
    <div class="bottom-buffer"></div>
    <div class="bottom-bar">
        <input type="submit" class="result-submit" value="Clear Paid Queue" form="DJ1">
        <input type="submit" class="result-submit" value="Clear Free Queue" form="DJ2">
    </div>
</body>
</html>
