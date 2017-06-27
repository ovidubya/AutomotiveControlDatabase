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


$sql = "SELECT DISTINCT Connector.Manfacturer AS 'Connector Manufacturer', Connector.`Pin Type`, `Car Component`.Name AS 'Component Name', Controller.Name AS 'Controller Name' FROM Connector, `Car Component`, Controller WHERE Connector.`Pin Type` LIKE 'male' AND Connector.ConnectorID = `Car Component`.Connector AND `Car Component`.Controller = Controller.ControllerID";
$myData = mysql_query($sql, $con);

$result2 = mysql_query($sql) or die($sql."<br/><br/>".mysql_error());


echo "<h3>Manufacturer and PinType of all Male connectors, with component and controller</h3>";
echo "<table class='table table-hover'>
<tr>
<th>Connector Manufacturer</th>
<th>Pin Type</th>
<th>Component Name</th>
<th>Controller Name</th>
</tr>";
while($record = mysql_fetch_array($myData)) {
	echo "<form action=query1.php method=post>";
	echo "<tr>";
	echo "<td>" . $record['Connector Manufacturer'] . " </td>";
	echo "<td>" . $record['Pin Type'] . " </td>"; 
	echo "<td>" . $record['Component Name'] . " </td>";
	echo "<td>" . $record['Controller Name'] . " </td>";
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
