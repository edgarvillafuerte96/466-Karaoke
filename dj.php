	<html>
    <head>
        <title>DJ Edgar's Interface</title>
	<body>
	<a href='http://students.cs.niu.edu/~z1858089/search.php'><font color="white">Return to Search Page</font></a>
	<style> body { 
        } 
		h1 { 
            color: #ffffff;
			text-align: center;
        } 
		h2{
			color: #ffffff;
		}
		h3 { 
            color: #ffffff; 
        } 
		h5 { 
            color: #ffffff; 
        } 
		th, td {
			color: #ffffff;
		}
    </style>
    </head>
	<style>
body {
  background-image: url('http://thearenatavern.com/wp-content/uploads/2019/01/Karaoke-Mic.jpg');
  height: 100%; 
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>

﻿﻿﻿﻿<?php
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
<h1> DJ Edgar's Queue Interface</h1>
    </div>
    <form id="DJform1" method="post" action="dj.php">
        <h2>Paid Queue</h2>
        <div class="card">
            <table class="result-table">
                <tbody>
                    <?php
                    //Paid add
                    //$sql = "SELECT DISTINCT USER.firstName, SELECTS.amount, SONG.bandArtist, SONG.title, FILE.fileID,  SELECTS.timeDate FROM USER, SONG, FILE, SELECTS WHERE amount > 0 ORDER BY USER.firstName DESc ;";
                      $sql = "SELECT U.name, SN.title, SN.bandArtist, F.fileID, F.version, SL.amount, F.version
                            FROM USER AS U
                            INNER JOIN SELECTS AS SL
                            ON U.phoneNum = SL.phoneNum
                            INNER JOIN FILES AS F
                            ON SL.FILEID = F.FILEID
                            INNER JOIN SONG SN
                            ON F.SONGID = SN.SONGID
                           WHERE SL.AMOUNT > 0;";                    

                    //$sql = "SELECT userID, fileID, timeDate, amount from SELECTS where amount !=0 ORDER BY amount, timeDate; ";

                    $result = $pdo->query($sql);
                    //while ($re = $result->fetch(pdo::FETCH_BOTH))
                    echo "
                    <table border=1>";
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
                        <table border=1>";
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
                            echo '
                            <td width="70">
                                ';
                                echo $rows['amount'];
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
    <form id="DJform2" method="post" action="dj.php">
        <h2>Free Queue</h2>
        <div class="card">
            <table class="result-table">
                <tbody>
                    <?php

                    //free
					$sql = "SELECT U.name, SN.title, SN.bandArtist, F.fileID, F.version, SL.amount, F.version
					FROM USER AS U
					INNER JOIN SELECTS AS SL
					ON U.phoneNum = SL.phoneNum
					INNER JOIN FILES AS F
					ON SL.FILEID = F.FILEID
					INNER JOIN SONG SN
					ON F.SONGID = SN.SONGID
				   WHERE SL.AMOUNT = 0;"; 
                    $result = $pdo->query($sql);
					echo "
                    <table border=1>";
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
        <input type="submit" class="result-submit" value="Clear Paid Queue" form="DJform1">
        <input type="submit" class="result-submit" value="Clear Free Queue" form="DJ2form2">
    </div>
</body>
</html>
