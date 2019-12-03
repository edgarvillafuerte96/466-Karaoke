<html>
	<head style> <title> Karoake Group Project </title> </head>

	<h1 style = "font-family: Comic Sans MS;" align="center"> Karoake Signup Page </h1>

	<h3 style = "font-family: Comic Sans MS;" align="center"> Enter Term to Search By </h3>
	<body>
	<form align="center" method="POST" action="searchResults.php">
		<select name="searchType">
			<option value="Title"> Title </option>
			<option value="Artist"> Artist </option>
			<option value="Contributer"> Contributer </option>
		</select>
		<input type="text" name="searchTerm" size=30>
		<input type="submit" name="submit">
	</form>
	</body>
</html>

