<html>
    <head>
        <title>Edgar's Result Page</title>
    </head>
	<body>
	<a href='http://students.cs.niu.edu/~z1858089/search.php'><font color="white">Return to Search Page</font></a></br>
	<a href='http://students.cs.niu.edu/~z1858089/dj.php'><font color="white">Go to DJ Interface</font></a>
	<style> body { 
            text-align: center; 
        } 
		h1 { 
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
        <h1 align='center'>Song Selection Page</h1>

        <?php
         try {
            $username = "z1859426";
            $password = "1997Jun10";
            $dsn = "mysql:host=courses;dbname=z1859426";
            $pdo = new PDO($dsn, $username, $password);
            }
        catch(PDOexception $e) { 
            echo "Connection to database failed: " . $e->getMessage();
            }    
        

        if (isset($_POST['bandArtist'])) {

            $bandArtist = $_POST['bandArtist'];

            $sql = "SELECT * FROM SONG WHERE bandArtist = '$bandArtist';";
            $sth = $pdo->prepare($sql);
            $sth->execute();
            //$res = $sth->fetchAll(PDO::FETCH_ASSOC);
            $sql = "SELECT * FROM SONG inner join FILES on SONG.bandArtist = '$bandArtist' AND SONG.songID = FILES.songID";
            $result = $pdo->query($sql);
            echo "<div>";
            echo "<h3>Please choose the correct version of the song you would like to put in the queue:</h3>";
            echo "<table align='center'>";
            echo "<tr>";
			echo "<th> Title </th>";
			echo "<th> Band Artist </th>";
            echo "<th> songID </th>";
            echo "<th> fileID </th>";
            echo "<th> Version </th>";
            echo "<th> Select </th>";
            echo "</tr>";
            foreach($pdo->query($sql) as $row) {
                $title= $row['title'];
                $bandArtist = $row['bandArtist'];
				$songID= $row['songID'];
				$fileID = $row['fileID'];
                $version = $row['version'];
                echo"<tr align='center'><td>".$title."</td><td>".$bandArtist."</td><td'>".$songID."</td><td>".$fileID."</td><td>".$version."</td><td>"."<input type='radio' name='fileID' value='$fileID'></td></tr>";
            }
            echo "</table>";
			echo "<p><font color='white'><b>Please enter your information to be entered into the queue</font></b></p>";
			echo "<form action='' method='post' align='center'>";
            echo "<input type='text' placeholder='Your Name' name='name'></br>
                  <input type='text' placeholder='Your Phone Number' name='phoneNum'></br>
                  <input type='text' placeholder='Amount To Pay' name='amount'></br>";
			echo "<h5> Note: if no amount is entered you will be put into the free queue</h5></br>";
            echo "<div><input type='submit' value='Submit'></div>";
            echo "</form>";
            echo "</div>";

        }
        else if(isset($_POST['title'])) {

            $title = $_POST['title'];

            $sql = "SELECT * FROM SONG inner join FILES on SONG.title = '$title' AND SONG.songID = FILES.songID";
            $result = $pdo->query($sql);
            echo "<div>";
            echo "<h3>Please choose the correct version of the song you would like to put in the queue:</h3>";
            echo "<table align='center'>";
            echo "<tr>";
			echo "<th> Title </th>";
			echo "<th> Band Artist </th>";
            echo "<th> songID </th>";
            echo "<th> fileID </th>";
            echo "<th> Version </th>";
            echo "<th> Select </th>";
            echo "</tr>";
            foreach($pdo->query($sql) as $row) {
                $title= $row['title'];
                $bandArtist = $row['bandArtist'];
				$songID= $row['songID'];
				$fileID = $row['fileID'];
                                $version = $row['version'];
                echo"<tr align='center'><td>".$title."</td><td>".$bandArtist."</td><td'>".$songID."</td><td>".$fileID."</td><td>".$version."</td><td>"."<input type='radio' name='fileID' value='$fileID'></td></tr>";

            }
            
            echo "</table>";
			echo "<p><font color='white'><b>Please enter your information to be entered into the queue</font><b></p>";
            echo "<form action='' method='post' align='center'>";
            echo "<input type='text' placeholder='Your Name' name='name'></br>
                  <input type='text' placeholder='Your Phone Number' name='phoneNum'></br>
                  <input type='text' placeholder='Amount To Pay' name='amount'></br>";
			echo "<h5> Note: if no amount is entered you will be put into the free queue</h5></br>";
            echo "<div class='tSubmit'><input type='submit' value='Submit'></div>";
            echo "</form>";
            echo "</div>";
        }
        else if(isset($_POST['contributor'])) {
            $contributor = $_POST['contributor'];
            $sql = "SELECT * 
			FROM SONG as S
			inner join TYPECONTRIBUTOR as TC
			on TC.contributorID = '$contributor' AND S.songID = TC.songID 
			inner join FILES as F 
			on S.songID = F.songID;";

            $result = $pdo->query($sql);
            echo "<div>";
            echo "<h3>Please choose the correct version of the song you would like to put in the queue:</h3>";
            echo "<table align='center'>";
            echo "<tr'>";
			echo "<th> Title </th>";
			echo "<th> Band Artist </th>";
            echo "<th> songID </th>";
            echo "<th> fileID </th>";
            echo "<th> Version </th>";
            echo "<th> Select </th>";
            echo "</tr>";
            foreach($pdo->query($sql) as $row) {
                $title= $row['title'];
                $bandArtist = $row['bandArtist'];
				$songID= $row['songID'];
				$fileID = $row['fileID'];
                $version = $row['version'];
                echo"<tr align='center'><td>".$title."</td><td>".$bandArtist."</td><td'>".$songID."</td><td>".$fileID."</td><td>".$version."</td><td>"."<input type='radio' name='fileID' value='$fileID'></td></tr>";

            }
            echo "</table>";
			echo "<p><font color='white'><b>Please enter your information to be entered into the queue</font><b></p>";
			echo "<form action='' method='post' align='center'>";
            echo "<input type='text' placeholder='Your Name' name='name'></br>
                  <input type='text' placeholder='Your Phone Number' name='phoneNum'></br>
                  <input type='text' placeholder='Amount To Pay' name='amount'></br>";
				  echo "<h5> Note: if no amount is entered you will be put into the free queue</h5></br>";
            echo "<div><input type='submit' value='Submit'></div>";
			
            echo "</form>";
            echo "</div>";
        }
        else if(isset($_POST['fileID'])) {
            $fileID = $_POST['fileID'];
            $phoneNum = $_POST['phoneNum'];
            $amount = $_POST['amount'];
            $name = $_POST['name'];


            if ( $fileID == NULL || $phoneNum == NULL || $name == NULL) {
                echo "<p><font color: #c63606>Submission Failed. Fill all fields.</font></p>";
            }
            else {
                $sql = "INSERT INTO USER(phoneNum, name) VALUES ('$phoneNum', '$name');";
                try {
                    $result = $pdo->query($sql);
                    echo "<p><font color: #c63606>Submission Successful! </font></p>";
                }
                catch (PDOexception $err) {
                    echo "Query Failed: " . $err;
                }
                $timeDate = date('m/d/y') . ' ' . date('H:i:s');
                echo "<p font color=#c63606>'$timeDate'</p>";
                $sql = "INSERT INTO SELECTS(fileID, phoneNum, timeDate, amount) VALUES ('$fileID', '$phoneNum', '$timeDate', '$amount');";
                try {
                    $result = $pdo->query($sql);
                }
                catch (PDOexception $err) {
                    echo "Query Failed: " . $err;
                }
            }
        }

        else {
            echo "<p>Submission Failed. Fill all fields.</p>";
        }

        ?>
    </body>
</html>
