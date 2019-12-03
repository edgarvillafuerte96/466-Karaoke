<html>	
	<head>
		<title>DJ List</title>
		<link rel="stylesheet" type="text/css" href="dj_que.css">

	</head>

	<body>

		<form action="update_queues.php" method="get">
			<input type="submit" name="Home" value="Home Page">
		</form>


		<h1>Priority</h1>

		<form action="update_queues.php" method="get">
			<input type="submit" name="Pop_P" value="Pop Priority">
		</form>

		<table border="1"> 
			<tr>
				<th>Amount</th>
				<th>Time</th>
				<th>Name</th>
				<th>Song</th>
				<th>Band</th>
				<th>Version</th>
				<th>k_ID</th>
			</tr>

		<?php
			include 'DSN.php'; # SQL login.php
			$sql = 'SELECT amount, times, name, title, band, version, kid
				FROM PickP, KFile, User
				where PickP.kid = KFile.id AND User.id = PickP.uid AND played = 0
				ORDER BY pid ASC;';
			$fetch_style = PDO::FETCH_NUM;
			try{
				$result = $pdo->query($sql);
				$row = $result->fetch($fetch_style);
				do{
					echo "<tr>";
					echo "<td>".$row[0]."</td>";
					echo "<td>".$row[1]."</td>";
					echo "<td>".$row[2]."</td>";
					echo "<td>".$row[3]."</td>";
					echo "<td>".$row[4]."</td>";
					echo "<td>".$row[5]."</td>";
					echo "<td>".$row[6]."</td>";
					echo "</tr>";
				}while($row = $result->fetch($fetch_style));
			}
				catch(PDOException $e){
				print("There is No: ".$e);
			}
		?>

		</table>



		<h1>Queue</h1>

		<form action="update_queues.php" method="get">
			<input type="submit" name="Pop_Q" value="Pop Queue">
		</form>


		</table>

		<table border="1"> 
			<tr>
				<th>Time</th>
				<th>Name</th>
				<th>Song</th>
				<th>Band</th>
				<th>Version</th>
				<th>k_ID</th>
			</tr>

		<?php
			include 'DSN.php';
			$sql = 'SELECT times, name, title, band, version, kid 
			       	FROM PickQ, KFile, User
				where PickQ.kid = KFile.id AND User.id = PickQ.uid AND played = 0
				ORDER BY qid ASC;'; 
			$fetch_style = PDO::FETCH_NUM;
			try{
				$result = $pdo->query($sql);
				$row = $result->fetch($fetch_style);
				do{
					echo "<tr>";
					echo "<td>".$row[0]."</td>";
					echo "<td>".$row[1]."</td>";
					echo "<td>".$row[2]."</td>";
					echo "<td>".$row[3]."</td>";
					echo "<td>".$row[4]."</td>";
					echo "<td>".$row[5]."</td>";
					echo "</tr>";
				}while($row = $result->fetch($fetch_style));
			}
				catch(PDOException $e){
				print("There is No: ".$e);
			}
		?>

	</body>

</html>