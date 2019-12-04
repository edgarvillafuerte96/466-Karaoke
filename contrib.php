$sql = "SELECT * FROM SONG inner join TYPECONTRIBUTOR on TYPECONTRIBUTOR.contributorID = '$typecontributor' AND SONG.songID = TYPECONTRIBUTOR.songID inner join FILES on SONG.songID = FILES.songID;";
