<html>
        <head>
        </head>
        <body>
                <form method="post" action="song.php">
                <?php
                if ($_POST['selected'])
                {
                        echo "<input type='hidden' name='file' value='" . $_POST['selected'] . "'>";
                        if ((isset($_POST['free']) ? $_POST['free'] : null))
                        {
                                echo "<p>Name: <input type='text' name='name'></p>";
                                echo "<input type='submit' name='free' value='Submit'>";
                        }
                        else
                        {
                                echo "<p>Name: <input type='text' name='name'></p>";
                                echo "<p>Amount: <input type='text' name='amount'></p>";
                                echo "<input type='submit' name='paid' value='Submit'>";
                        }
                }
                else
                {
                        echo "<h1>Please select a song</h1>";
                        echo "<br><a href='search.php'>Back to Search</a>";
                }
                ?>
                </form>
        </body>
</html>
