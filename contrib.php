$sql = "SELECT * FROM SONG inner join TYPECONTRIBUTOR on TYPECONTRIBUTOR.contributorID = '$typecontributor' AND SONG.songID = TYPECONTRIBUTOR.songID inner join FILES on SONG.songID = FILES.songID;";


 echo"<tr align='center'><td>".$title."</td><td>".$bandArtist."</td><td>".$fileID."</td><td>".$version."</td><td>"."<input type='radio' name='fileID' value='$fileID'></td></tr>";
