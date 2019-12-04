<html>
    <head>
        <title>Edgar's Karaoke Bar</title>
    </head>

    <div class='topnav'>
        <h1 class='pageTitle'>Edgar's Karaoke Bar</h1>
        <a href='http://students.cs.niu.edu/~z1858089/public_html/index.php'>Home</a>
    </div>

        <?php
         try {
            $username = "z1858089";
            $password = "1985Aug25";
            $dsn = "mysql:host=courses;dbname=z1858089";
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
            $res = $sth->fetchAll(PDO::FETCH_ASSOC);
            $sql = "SELECT * FROM SONG inner join FILES on SONG.bandArtist = '$artist' AND SONG.songID = FILES.songID"
            $result = $pdo->query($sql);
            echo "<div class='formHeader'>";
            echo "<h1>Choose a Song</h1>";
            echo "<div>";
            echo "<form action='' method='post'>";
            echo "<input type='text' placeholder='Your Name' name='name'>
                  <input type='text' placeholder='Your Phone Number' name='phoneNum'>
                  <input type='text' placeholder='Amount To Pay' name='amount'>";
            echo "<div>";
            echo "<table>";
            echo "<tr>";
			echo "<th> Title </th>";
			echo "<th> Band Artist </th>";
            echo "<th> songID </th>";
            echo "<th> fileID </th>";
            echo "<th> userID </th>";
            echo "<th> Name </th>";
            echo "<th> Select </th>";
            echo "</tr>";
            
            foreach($pdo->query($sql) as $row) {
                $title= $row['title'];
                $bandArtist = $row['bandArtist'];
				$songID= $row['songID'];
				$fileID = $row['fileID'];
                $userID=$row['userID'];
                $name=$row['name']
                echo"<tr align='center'><td>".$title."</td><td>".$bandArtist."</td><td'>".$songID."</td><td>".$fileID."</td><td>".$userID."</td><td'>".$name."<input type='radio' name='selection' value='$fileID'></td></tr>";
            }
            
            echo "</table>";
            echo "</div>";
            echo "<div><input type='submit' value='Submit'></div>";
            echo "</div>";
            echo "</form>";
            echo "</div>";
     
        }
        else if(isset($_POST['title'])) {

            $title = $_POST['title'];

            $sql = "SELECT * FROM SONG inner join FILES on Songs.title = '$title' AND SONG.songID = FILES.songID";
            $result = $pdo->query($sql);
            echo "<div>";
            echo "<h1>Choose a Song</h1>";
            echo "<div>";
            echo "<form action='' method='post'>";
            echo "<input type='text' placeholder='Your Name' name='name'>
                  <input type='text' placeholder='Your Phone Number' name='phoneNum'>
                  <input type='text' placeholder='Amount To Pay' name='amount'>";
            echo "<div>";
            echo "<table>";
            echo "<tr>";
			echo "<th> Title </th>";
			echo "<th> Band Artist </th>";
            echo "<th> songID </th>";
            echo "<th> fileID </th>";
            echo "<th> userID </th>";
            echo "<th> Name </th>";
            echo "<th> Select </th>";
            echo "</tr>";
            foreach($pdo->query($sql) as $row) {
                $title= $row['title'];
                $bandArtist = $row['bandArtist'];
				$songID= $row['songID'];
				$fileID = $row['fileID'];
                $userID=$row['userID'];
                $name=$row['name']
                echo"<tr align='center'><td>".$title."</td><td>".$bandArtist."</td><td'>".$songID."</td><td>".$fileID."</td><td>".$userID."</td><td'>".$name."<input type='radio' name='selection' value='$fileID'></td></tr>";
            }
            
            echo "</table>";
            echo "</div>";
            echo "<div class='tSubmit'><input type='submit' value='Submit'></div>";
            echo "</div>";
            echo "</form>";
            echo "</div>";
        }
        else if(isset($_POST['TYPECONTRIBUTOR'])) {
            $contributor = $_POST['TYPECONTRIBUTOR'];
            $sql = "SELECT * FROM SONG inner join TYPECONTRIBUTOR on TYPECONTRIBUTOR.contributorID = '$contributor' AND SONG.songID = TYPECONTRIBUTOR.songID inner join FILES on Songs.SID = FILES.SID;";

            $result = $pdo->query($sql);
            echo "<div>";
            echo "<h1>Choose a Song</h1>";
            echo "<div class='selectBox'>";
            echo "<form action='' method='post'>";
            echo "<input type='text' placeholder='Your Name' name='name'>
                  <input type='text' placeholder='Your Phone Number' name='phoneNum'>
                  <input type='text' placeholder='Amount To Pay' name='amount'>";
            echo "<div>";
            echo "<table'>";
            echo "<tr'>";
			echo "<th> Title </th>";
			echo "<th> Band Artist </th>";
            echo "<th> songID </th>";
            echo "<th> fileID </th>";
            echo "<th> userID </th>";
            echo "<th> Name </th>";
            echo "<th> Select </th>";
            echo "</tr>";
            foreach($pdo->query($sql) as $row) {
                $title= $row['title'];
                $bandArtist = $row['bandArtist'];
				$songID= $row['songID'];
				$fileID = $row['fileID'];
                $userID=$row['userID'];
                $name=$row['name']
                echo"<tr align='center'><td>".$title."</td><td>".$bandArtist."</td><td'>".$songID."</td><td>".$fileID."</td><td>".$userID."</td><td'>".$name."<input type='radio' name='selection' value='$fileID'></td></tr>";
            }
            
            echo "</table>";
            echo "</div>";
            echo "<div><input type='submit' value='Submit'></div>";
            echo "</div>";
            echo "</form>";
            echo "</div>";
        }
        else if(isset($_POST['selection'])) {
            $userID = $_POST['userID'];
            $fileID = $_POST['selection'];
            $phoneNum = $_POST['phoneNum'];
            $amount = $_POST['amount'];
            $name = $_POSR['name'];
           
          
            if ($userID == NULL || $fileID == NULL || $phoneNum == NULL) {
                echo "<p>Submission Failed. Fill all fields.</p>";
            }
            else {
                $sql = "INSERT INTO USER(phoneNum, userID) VALUES ('$phoneNum', '$userID');";
                try {
                    $result = $pdo->query($sql);
                    echo "<p> Submission Successful! </p>";
                }
                catch (PDOexception $err) {
                    echo "Query Failed: " . $err;
                }
                $dtandtm = date('m/d/y') . ' ' . date('H:i:s');
                echo "<p>'$dtandtm'</p>";
                $sql = "INSERT INTO SELECTS(fileID, phoneNum, timeDate, amount, name) VALUES ('$fileID', '$phoneNum', '$timeDate', '$amount', '$name');";
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
