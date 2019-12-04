<html>

    <head>
        <title>Edgar's Karaoke Bar</title>
    </head>

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
    <div class='topnav'>
        <h1 class='pageTitle'>Edgar's Karaoke Bar Search Page</h1>
    </div>
    <div class='bg'>
    <div class='outerBox'>
    <h1>Search Songs</h1>
    <div class='formBox'>
        <form action='./result.php' method='post'>
            <label>Select a Song to Play<label>
            <?php
                $sql = "SELECT * FROM SONG;";
                $selectSong= $pdo -> query($sql);
                
                echo "<select name='songTitle'>";
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

        <form action='./result.php' method='post'>
            <label>Choose an Artist<label>
            <?php 
                        $sql = "SELECT DISTINCT bandArtist FROM SONG;";
                        $selectbandArtist = $pdo -> query($sql);

                        echo "<select name='bandArtist'>";
                                foreach ($selectbandArtist as $row){
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
        <form action='./result.php' method='post'>
            <label>Choose a Contributor<label>
            <?php
                $sql = "SELECT * FROM CONTRIBUTOR;";
                $selectContributor = $pdo -> query($sql);

                echo "<select name='contributorName'>";
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
    </div>
    </div> 
    </body>

</html>
