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
	$UpdateQuery = "UPDATE `controller` SET `ControllerID`='$_POST[controllerid]', CarID='$_POST[carid]' ,Name='$_POST[name]', `Supplier`='$_POST[supplier]' WHERE `ControllerID`='$_POST[hidden]'";  
    mysql_query($UpdateQuery, $con);
};

//delete
if (isset($_POST['delete'])) {
	$DeleteQuery = "DELETE FROM `controller` WHERE `ControllerID`='$_POST[hidden]'";
    mysql_query($DeleteQuery, $con);
};

//add
if (isset($_POST['add'])) {
	$AddQuery = "INSERT INTO `controller` (`ControllerID`, CarID, Name, `Supplier`) VALUES ('$_POST[ucontrollerid]', '$_POST[ucarid]', '$_POST[uname]', '$_POST[usupplier]')";
    mysql_query($AddQuery, $con);
};

$sql = "select * from `controller`";
$myData = mysql_query($sql, $con);

echo "<h3>Controller Table</h3>";
echo "<table class='table table-hover'>
<tr>
<th>ControllerID</th>
<th>CarID</th>
<th>Name</th>
<th>Supplier</th>
</tr>";
while($record = mysql_fetch_array($myData)) {
	echo "<form action=table6.php method=post>";
	echo "<tr>";
	echo "<td>" . "<input type=text class='form-control' name=controllerid value=" . $record['ControllerID'] . " </td>";
	echo "<td>" . "<input type=text class='form-control' name=carid value=" . $record['CarID'] . " </td>";
	echo "<td>" . "<input type=text class='form-control' name=name value=" . $record['Name'] . " </td>"; 
	echo "<td>" . "<input type=text class='form-control' name=supplier value=" . $record['Supplier'] . " </td>";
	echo "<td>" . "<input type=hidden class='form-control' name=hidden value=" . $record['ControllerID'] . " </td>";
	//echo "<td>" . "<input type=submit name=update value=update" . " </td>";
	//echo "<td>" . "<input type=submit name=delete value=delete" . " </td>";
	echo "<td>" . "<button type=submit name=update value=update class='btn btn-primary'>update</button>" . " </td>";
	echo "<td>" . "<button type=submit name=delete value=delete class='btn btn-danger'>delete</button>" . " </td>";
	echo "</tr>";
	echo "</form>";
}
echo "<form action=table6.php method=post>";
echo "<tr>";
echo "<td><input type=text class='form-control' name=ucontrollerid></td>";
echo "<td><input type=text class='form-control' name=ucarid></td>";
echo "<td><input type=text class='form-control' name=uname></td>";
echo "<td><input type=text class='form-control' name=usupplier></td>";
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
	<button class='btn btn-success btn-lg' id="goback" type="submit" name="table6">Go Back</button>
</form>
</body>

</html>
