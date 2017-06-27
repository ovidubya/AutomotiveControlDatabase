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
	$UpdateQuery = "UPDATE car SET CarID='$_POST[carid]', Make='$_POST[make]', Model='$_POST[model]', Type='$_POST[type]', Year='$_POST[year]'  WHERE CarID='$_POST[hidden]'";  
    mysql_query($UpdateQuery, $con);
};

//delete
if (isset($_POST['delete'])) {
	$DeleteQuery = "DELETE FROM car WHERE CarID='$_POST[hidden]'";
    mysql_query($DeleteQuery, $con);
};

//add
if (isset($_POST['add'])) {
	$AddQuery = "INSERT INTO car (CarID, Make, Model, Type, Year) VALUES ('$_POST[ucarid]', '$_POST[umake]', '$_POST[umodel]', '$_POST[utype]', '$_POST[uyear]')";
    mysql_query($AddQuery, $con);
};

$sql = "select * from car";
$myData = mysql_query($sql, $con);

echo "<h3>Car Table</h3>";
echo "<table class='table table-hover'>
<tr>
<th>CarID</th>
<th>Make</th>
<th>Model</th>
<th>Type</th>
<th>Year</th>
</tr>";
while($record = mysql_fetch_array($myData)) {
	echo "<form action=table1.php method=post>";
	echo "<tr>";
	echo "<td>" . "<input type=text class='form-control' name=carid value=" . $record['CarID'] . " </td>";
	echo "<td>" . "<input type=text class='form-control' name=make value=" . $record['Make'] . " </td>"; 
	echo "<td>" . "<input type=text class='form-control' name=model value=" . $record['Model'] . " </td>";
	echo "<td>" . "<input type=text class='form-control' name=type value=" . $record['Type'] . " </td>";
	echo "<td>" . "<input type=text class='form-control' name=year value=" . $record['Year'] . " </td>";
	echo "<td>" . "<input type=hidden class='form-control' name=hidden value=" . $record['CarID'] . " </td>";
	//echo "<td>" . "<input type=submit name=update value=update" . " </td>";
	//echo "<td>" . "<input type=submit name=delete value=delete" . " </td>";
	echo "<td>" . "<button type=submit name=update value=update class='btn btn-primary'>update</button>" . " </td>";
	echo "<td>" . "<button type=submit name=delete value=delete class='btn btn-danger'>delete</button>" . " </td>";
	echo "</tr>";
	echo "</form>";
}
echo "<form action=table1.php method=post>";
echo "<tr>";
echo "<td><input type=text class='form-control' name=ucarid></td>";
echo "<td><input type=text class='form-control' name=umake></td>";
echo "<td><input type=text class='form-control' name=umodel></td>";
echo "<td><input type=text class='form-control' name=utype></td>";
echo "<td><input type=text class='form-control' name=uyear></td>";
//echo "<td>" . "<input type=submit name=add value=add" . " </td>";
echo "<td>" . "<button class='btn btn-info' type=submit name=add value=add>add</button>" . " </td>";
echo "</form>";
echo "</table>";
//end


mysql_close($con);
?>
</div>
</br>
<div class="container-fluid">
<form action="home.php" method="post">
	<!--<input id="goback" type="submit" name="table6" value="Go Back" />-->
	<button class='btn btn-success btn-lg' id="goback" type="submit" name="table1">Go Back</button>
</form>
</div>

</body>

</html>
