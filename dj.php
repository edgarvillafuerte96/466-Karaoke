<?php
try { // if something goes wrong, an exception is thrown
    $password = "1981Aug25";
    $username = "z1858089"
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
					<thead>
						<tr>
							<th>Select</th>
							<th>Title</th>
							<th>Artist</th>
							<th>Name</th>
							<th>FileID</th>
						</tr>
					</thead>
					<tbody>
<?php
//Paid add
$sql = "SELECT P.paidAddID, T.text AS title, A.name as artist, U.name as user, F.fileID FROM Title T, File F, Artist A, User U, PaidAdd P WHERE F.fileID = P.fileID AND T.titleID = F.titleID AND A.artistID = F.artistID AND U.userID = P.userID AND P.played=0 ORDER BY P.amount DESC;";
$sql = "Select  "
$result = $pdo->query($sql);
while ($re = $result->fetch(pdo::FETCH_BOTH))
{
	echo "<tr class='item'>";
	echo "<td><label class='row-item' for='" . $re['paidAddID'] . "'><input type='radio' name='paidSelect' value='" . $re['paidAddID'] . "' id='" . $re['paidAddID'] ."'></label></td>";
	echo "<td><label class='row-item' for='" . $re['paidAddID'] . "'>" . $re['title'] . "</label></td>";
	echo "<td><label class='row-item' for='" . $re['paidAddID'] . "'>" . $re['artist'] . "</label></td>";
	echo "<td><label class='row-item' for='" . $re['paidAddID'] . "'>" . $re['user'] . "</label></td>";
	echo "<td>" . $re['fileID'] . "</td></tr>";
}
?>
					</tbody>
				</table>
			</div>
		</form>
		<form id="DJ2" method="post" action="dj.php">
			<h1 class="table-header">Free Queue</h1>
			<div class="card">
				<table class="result-table">
					<thead>
						<tr>
							<th>Select</th>
							<th>Title</th>
							<th>Artist</th>
							<th>Name</th>
							<th>FileID</th>
						</tr>
					</thead>
					<tbody>
<?php
//Free add
$sql = "SELECT FA.freeAddID, T.text AS title, A.name as artist, U.name as user, F.fileID FROM Title T, File F, Artist A, User U, FreeAdd FA WHERE F.fileID = FA.fileID AND T.titleID = F.titleID AND A.artistID = F.artistID AND U.userID = FA.userID AND FA.played=0;";
$result = $pdo->query($sql);
while ($re = $result->fetch(pdo::FETCH_BOTH))
{
	echo "<tr class='item'>";
	echo "<td><label class='row-item' for='" . $re['freeAddID'] . "'><input type='radio' name='freeSelect' value='" . $re['freeAddID'] . "' id='" . $re['freeAddID'] ."'></label></td>";
	echo "<td><label class='row-item' for='" . $re['freeAddID'] . "'>" . $re['title'] . "</label></td>";
	echo "<td><label class='row-item' for='" . $re['freeAddID'] . "'>" . $re['artist'] . "</label></td>";
	echo "<td><label class='row-item' for='" . $re['freeAddID'] . "'>" . $re['user'] . "</label></td>";
	echo "<td><label class='row-item' for='" . $re['freeAddID'] . "'>" . $re['fileID'] . "</label></td></tr>";
}
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