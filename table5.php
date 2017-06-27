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

//update
if (isset($_POST['update'])) {
	$UpdateQuery = "UPDATE `can signals` SET `Address`='$_POST[address]', Controller='$_POST[controller]', Name='$_POST[name]', `Units`='$_POST[units]' WHERE `Address`='$_POST[hidden]'";  
    mysql_query($UpdateQuery, $con);
};

//delete
if (isset($_POST['delete'])) {
	$DeleteQuery = "DELETE FROM `can signals` WHERE `Address`='$_POST[hidden]'";
    mysql_query($DeleteQuery, $con);
};

//add
if (isset($_POST['add'])) {
	$AddQuery = "INSERT INTO `can signals` (`Address`, Controller, Name, `Units`) VALUES ('$_POST[uaddress]','$_POST[ucontroller]', '$_POST[uname]', '$_POST[uunits]')";
    mysql_query($AddQuery, $con);
};

$sql = "select * from `can signals`";
$myData = mysql_query($sql, $con);

echo "<h3>Can Signals Table</h3>";
echo "<table class='table table-hover'>
<tr>
<th>Address</th>
<th>Controller</th>
<th>Name</th>
<th>Units</th>
</tr>";
while($record = mysql_fetch_array($myData)) {
	echo "<form action=table5.php method=post>";
	echo "<tr>";
	echo "<td>" . "<input type=text class='form-control' name=address value=" . $record['Address'] . " </td>";
	echo "<td>" . "<input type=text class='form-control' name=controller value=" . $record['Controller'] . " </td>";
	echo "<td>" . "<input type=text class='form-control' name=name value=" . $record['Name'] . " </td>"; 
	echo "<td>" . "<input type=text class='form-control' name=units value=" . $record['Units'] . " </td>";
	echo "<td>" . "<input type=hidden class='form-control' name=hidden value=" . $record['Address'] . " </td>";
	//echo "<td>" . "<input type=submit name=update value=update" . " </td>";
	//echo "<td>" . "<input type=submit name=delete value=delete" . " </td>";
	echo "<td>" . "<button type=submit name=update value=update class='btn btn-primary'>update</button>" . " </td>";
	echo "<td>" . "<button type=submit name=delete value=delete class='btn btn-danger'>delete</button>" . " </td>";
	echo "</tr>";
	echo "</form>";
}
echo "<form action=table5.php method=post>";
echo "<tr>";
echo "<td><input type=text class='form-control' name=uaddress></td>";
echo "<td><input type=text class='form-control' name=ucontroller></td>";
echo "<td><input type=text class='form-control' name=uname></td>";
echo "<td><input type=text class='form-control' name=uunits></td>";
//echo "<td>" . "<input type=submit name=add value=add" . " </td>";
echo "<td>" . "<button class='btn btn-info' type=submit name=add value=add>add</button>" . " </td>";
echo "</form>";
echo "</table>";
//end


mysql_close($con);
?>
</br>
<form action="home.php" method="post">
	<!--<input id="goback" type="submit" name="table6" value="Go Back" />-->
	<button class='btn btn-success btn-lg' id="goback" type="submit" name="table5">Go Back</button>
</form>

</body>

</html>
