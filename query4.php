<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<?php
$con = @mysql_connect("localhost", "root", "");
if(!$con) {
	die("Cannot connect: " . mysql_error());
}
echo "<center><h1>Automotive Controller Database for SER 322</h1></center> <hr />";
mysql_select_db("Cars", $con);


$sql = "SELECT DISTINCT Make, Model, Type, Year from Car ORDER BY Year DESC ";
$myData = mysql_query($sql, $con);

echo "<h3>Controllers by Continental and the Cars they are on</h3>";
echo "<table class='table table-hover'>
<tr>
<th>Car Make</th>
<th>Car Model</th>
<th>Car Trim</th>
<th>Car Year</th>
</tr>";
while($record = mysql_fetch_array($myData)) {
	echo "<form action=query1.php method=post>";
	echo "<tr>";
	echo "<td>" . $record['Make'] . " </td>"; 
	echo "<td>" . $record['Model'] . " </td>";
	echo "<td>" . $record['Type'] . " </td>";
	echo "<td>" . $record['Year'] . " </td>";
	echo "</tr>";
	echo "</form>";
}

echo "</form>";
echo "</table>";
//end


mysql_close($con);
?>
</br>
<form action="home.php" method="post">
	<!--<input id="goback" type="submit" name="table6" value="Go Back" />-->
	<button class='btn btn-success btn-lg' id="goback" type="submit" name="table6">Go Back</button>
</form>

</body>

</html>
