<html>
    <head>
        <title>Edgar's Karaoke Bar</title>
		   <style> body { 
            text-align: center; 
        } 
		h1 { 
            color: #c63606; 
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
    ?>
    <div>
        <h1><font face="verdana" size="48">Edgar's Karaoke Bar Search Page</font></h1>
    </div>
    <div>
	</br></br></br>
        <form action='./result.php' method='post'>
            <label><font face="verdana" color= "white"><b>Select a Song to Play<b></font><label>
			</br></br>
            <?php
                $sql = "SELECT title FROM SONG;";
                $selectSong= $pdo -> query($sql);
                
                echo "<select name='title'>";
                        foreach ($selectSong as $row){
                            echo  '<option value ="';
                            echo $row['title'];
                            echo  '" >';
                            echo $row['title'];
                            echo  '</option>';
                        }
                        echo "</select>";

            ?>

            <input type='submit' value='Pick Song'>

        </form>
		</br></br>
        <form action='./result.php' method='post'>
            <label><font face="verdana" color= "white"><b>Choose an Artist<b></font><label>
			</br></br>
            <?php 
                        $sql = "SELECT DISTINCT bandArtist FROM SONG;";
                        $selectArtist = $pdo -> query($sql);

                        echo "<select name='bandArtist'>";
                                foreach ($selectArtist as $row){
                                    echo  '<option value ="';
                                    echo $row['bandArtist'];
                                    echo  '" >';
                                    echo $row['bandArtist'];
                                    echo  '</option>';
                                }
                                echo "</select>";
            ?>
		
            <input type='submit' value='Select Artist'>

        </form>
		</br></br>
        <form action='./result.php' method='post'>
            <label><font face="verdana" color= "white"><b>Choose a Contributor</b></font><label>
			</br></br>
            <?php
                $sql = "SELECT * FROM CONTRIBUTOR;";
                $selectContributor = $pdo -> query($sql);

                echo "<select name='contributor'>";
                        foreach ($selectContributor as $row){
                            echo  '<option value ="';
                            echo $row['contributorID'];
                            echo  '" >';
                            echo $row['contributorName'];
                            echo  '</option>';
                        }
                        echo "</select>";

            ?>

            <input type='submit' value='Select Contributor'>

        </form>
    </div> 
 </body>
</html>

