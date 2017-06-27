<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<div class="container-fluid">
<?php
$con = @mysql_connect("localhost", "root", "");
if(!$con) {
	die("Cannot connect: " . mysql_error());
}
echo "<center><h1>Automotive Controller Database for SER 322</h1></center> <hr />";
mysql_select_db("Cars", $con);

//update
if (isset($_POST['update'])) {
	$UpdateQuery = "UPDATE connector SET ConnectorID='$_POST[connectorid]', Controller='$_POST[controller]', Manfacturer='$_POST[manafacturer]', `Pin Number`='$_POST[pinnumber]', `Pin Type`='$_POST[pintype]' WHERE ConnectorID='$_POST[hidden]'";  
    mysql_query($UpdateQuery, $con);
};

//delete
if (isset($_POST['delete'])) {
	$DeleteQuery = "DELETE FROM connector WHERE ConnectorID='$_POST[hidden]'";
    mysql_query($DeleteQuery, $con);
};

//add
if (isset($_POST['add'])) {
	$AddQuery = "INSERT INTO connector (ConnectorID, Controller, Manfacturer, `Pin Number`, `Pin Type`) VALUES ('$_POST[uconnectorid]', '$_POST[ucontroller]', '$_POST[umanfacturer]', '$_POST[upinnumber]', '$_POST[upintype]')";
    mysql_query($AddQuery, $con);
};

$sql = "select * from connector";
$myData = mysql_query($sql, $con);

echo "<h3>Connector Table</h3>";
echo "<table class='table table-hover'>
<tr>
<th>ConnectorID</th>
<th>Controller</th>
<th>Manfacturer</th>
<th>Pin Number</th>
<th>Pin Type</th>
</tr>";
while($record = mysql_fetch_array($myData)) {
	echo "<form action=table3.php method=post>";
	echo "<tr>";
	echo "<td>" . "<input type=text class='form-control' name=connectorid value=" . $record['ConnectorID'] . " </td>";
	echo "<td>" . "<input type=text class='form-control' name=controller value=" . $record['Controller'] . " </td>"; 
	echo "<td>" . "<input type=text class='form-control' name=manafacturer value=" . $record['Manfacturer'] . " </td>"; 
	echo "<td>" . "<input type=text class='form-control' name=pinnumber value=" . $record['Pin Number'] . " </td>";
	echo "<td>" . "<input type=text class='form-control' name=pintype value=" . $record['Pin Type'] . " </td>";
	echo "<td>" . "<input type=hidden class='form-control' name=hidden value=" . $record['ConnectorID'] . " </td>";
	//echo "<td>" . "<input type=submit name=update value=update" . " </td>";
	//echo "<td>" . "<input type=submit name=delete value=delete" . " </td>";
	echo "<td>" . "<button type=submit name=update value=update class='btn btn-primary'>update</button>" . " </td>";
	echo "<td>" . "<button type=submit name=delete value=delete class='btn btn-danger'>delete</button>" . " </td>";
	echo "</tr>";
	echo "</form>";
}
echo "<form action=table3.php method=post>";
echo "<tr>";
echo "<td><input type=text class='form-control' name=uconnectorid></td>";
echo "<td><input type=text class='form-control' name=ucontroller></td>";
echo "<td><input type=text class='form-control' name=umanfacturer></td>";
echo "<td><input type=text class='form-control' name=upinnumber></td>";
echo "<td><input type=text class='form-control' name=upintype></td>";
//echo "<td>" . "<input type=submit name=add value=add" . " </td>";
echo "<td>" . "<button class='btn btn-info' type=submit name=add value=add>add</button>" . " </td>";
echo "</form>";
echo "</table>";
//end


mysql_close($con);
?>
</div>
</br>
<form action="home.php" method="post">
	<!--<input id="goback" type="submit" name="table6" value="Go Back" />-->
	<button class='btn btn-success btn-lg' id="goback" type="submit" name="table3">Go Back</button>
</form>

</body>

</html>
