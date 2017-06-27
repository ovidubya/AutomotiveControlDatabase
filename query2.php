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


$sql = "SELECT DISTINCT Controller.Name AS Controller, `CAN Signals`.Address AS SignalAddress, `CAN Signals`.Name AS SignalName,`CAN Signals`.`Units` AS SignalUnits
FROM `CAN Signals`, Controller 
WHERE `CAN Signals`.Controller = Controller.ControllerID";
$myData = mysql_query($sql, $con);

echo "<h3>Displays all CAN Signals as well as the name of which name of the controller that produces the signals.</h3>";
echo "<br/>";
echo "<br/>";
echo "<table class='table table-hover'>
<tr>
<th>Controller</th>
<th>SignalAddress</th>
<th>SignalName</th>
<th>SignalUnits</th>
</tr>";
while($record = mysql_fetch_array($myData)) {
	echo "<form action=query2.php method=post>";
	echo "<tr>";
	echo "<td>" . $record['Controller'] . " </td>";
	echo "<td>" . $record['SignalAddress'] . " </td>"; 
	echo "<td>" . $record['SignalName'] . " </td>";
	echo "<td>" . $record['SignalUnits'] . " </td>";
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
