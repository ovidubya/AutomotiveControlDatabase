<html>
<head>
</head>

<body>

<?php
$con = mysqli_connect("localhost","id2084018_ovadia","kingofpop","id2084018_cars");
echo "<center><h1>Automotive Controller Database for SER 322</h1></center> <hr />";
mysqli_select_db($con, "id2084018_cars");

echo "<h1>Database created successfully.</h1>";

$sql = "DROP TABLE IF EXISTS id2084018_cars.Connector";
mysqli_query($con, $sql);
//Create Connector Table
$sql = "CREATE TABLE `Connector` (
	ConnectorID int PRIMARY KEY NOT NULL,
	Controller int NOT NULL,
	Manfacturer varchar(255) NOT NULL,
	`Pin Number` int NOT NULL,
	`Pin Type` varchar(255) NOT NULL
)";
mysqli_query($con, $sql);
	//INSERT DATA TO TABLE
	$sql = "INSERT INTO Connector (ConnectorID, Controller, Manfacturer, `Pin Number`, `Pin Type`) VALUES (1, 1, 'Tyco',1315, 'male')";
	mysqli_query($con, $sql);
	$sql = "INSERT INTO Connector (ConnectorID, Controller, Manfacturer, `Pin Number`, `Pin Type`) VALUES (2, 1, 'Delphi',1234, 'female')";
	mysqli_query($con, $sql);
	$sql = "INSERT INTO Connector (ConnectorID, Controller, Manfacturer, `Pin Number`, `Pin Type`) VALUES (3, 1, 'Yazaki',53252, 'female')";
	mysqli_query($con, $sql);
	$sql = "INSERT INTO Connector (ConnectorID, Controller, Manfacturer, `Pin Number`, `Pin Type`) VALUES (4, 1, 'Sumitomo',36346, 'female')";
	mysqli_query($con, $sql);
	$sql = "INSERT INTO Connector (ConnectorID, Controller, Manfacturer, `Pin Number`, `Pin Type`) VALUES (5, 1, 'Tyco',6364, 'male')";
	mysqli_query($con, $sql);
	$sql = "INSERT INTO Connector (ConnectorID, Controller, Manfacturer, `Pin Number`, `Pin Type`) VALUES (6, 1, 'AMP',6346, 'male')";
	mysqli_query($con, $sql);

$sql = "DROP TABLE IF EXISTS id2084018_cars.`Car Component`";
mysqli_query($con, $sql);

//Create Car Component Table
$sql = "CREATE TABLE `Car Component` (
	ComponentID int PRIMARY KEY NOT NULL,
	Controller int NOT NULL,
	Connector int NOT NULL,
	Name varchar(255) NOT NULL
	
)";
mysqli_query($con, $sql);
	//INSERT DATA TO TABLE
	$sql = "INSERT INTO `Car Component` (ComponentID, Controller, Connector, Name) VALUES (1, 1, 1, 'WindowSwitchpack')";
	mysqli_query($con, $sql);
	$sql = "INSERT INTO `Car Component` (ComponentID, Controller, Connector, Name) VALUES (2, 1, 2, 'Transmission')";
	mysqli_query($con, $sql);
	$sql = "INSERT INTO `Car Component` (ComponentID, Controller, Connector, Name) VALUES (3, 1, 3, 'AcceleratorPedal')";
	mysqli_query($con, $sql);
	$sql = "INSERT INTO `Car Component` (ComponentID, Controller, Connector, Name) VALUES (4, 5, 5, 'BrakePedal')";
	mysqli_query($con, $sql);

$sql = "DROP TABLE IF EXISTS id2084018_cars.`Controller`";
mysqli_query($con, $sql);
//Create Controller Table
$sql = "CREATE TABLE `Controller` (
	ControllerID int PRIMARY KEY NOT NULL,
	CarID int NOT NULL,
	Name varchar(255) NOT NULL,
	Supplier varchar(255)
	
)";
mysqli_query($con, $sql);
	//INSERT DATA TO TABLE
	$sql = "INSERT INTO `Controller` (ControllerID, CarID, Name, Supplier) VALUES (1, 8, 'FrontController', 'Bosch')";
	mysqli_query($con, $sql);
	$sql = "INSERT INTO `Controller` (ControllerID, CarID, Name, Supplier) VALUES (2, 8, 'Entertainment', 'Continental')";
	mysqli_query($con, $sql);
	$sql = "INSERT INTO `Controller` (ControllerID, CarID, Name, Supplier) VALUES (3, 8, 'Powertrain', 'Delphi')";
	mysqli_query($con, $sql);
	$sql = "INSERT INTO `Controller` (ControllerID, CarID, Name, Supplier) VALUES (4, 8, 'BodyControls', 'GuysBasement')";
	mysqli_query($con, $sql);
	$sql = "INSERT INTO `Controller` (ControllerID, CarID, Name, Supplier) VALUES (5, 8, 'BrakeControlModule', 'Bosch')";
	mysqli_query($con, $sql);
	$sql = "INSERT INTO `Controller` (ControllerID, CarID, Name, Supplier) VALUES (6, 8, 'BatteryManagent', 'Continental')";
	mysqli_query($con, $sql);
	$sql = "INSERT INTO `Controller` (ControllerID, CarID, Name, Supplier) VALUES (7, 8, 'Fluids', 'Continental')";
	mysqli_query($con, $sql);
	

$sql = "DROP TABLE IF EXISTS id2084018_cars.`Car`";
mysqli_query($con, $sql);
	
//Create Car Table
$sql = "CREATE TABLE `Car` (
	CarID int PRIMARY KEY NOT NULL,
	Make varchar(255) NOT NULL,
	Model varchar(255) NOT NULL,
	Type varchar(255) NOT NULL,
	Year int NOT NULL
)";
mysqli_query($con, $sql);
	//INSERT DATA TO TABLE
	$sql = "INSERT INTO `Car` (CarID, Make, Model, Type, Year) VALUES (1, 'Honda', 'Civic', 'LE', 2005)";
	mysqli_query($con, $sql);
	$sql = "INSERT INTO `Car` (CarID, Make, Model, Type, Year) VALUES (2, 'Honda', 'CR-V', 'XE', 2012)";
	mysqli_query($con, $sql);
	$sql = "INSERT INTO `Car` (CarID, Make, Model, Type, Year) VALUES (3, 'Hyndai', 'Elantra', 'n/a', 2007)";
	mysqli_query($con, $sql);
	$sql = "INSERT INTO `Car` (CarID, Make, Model, Type, Year) VALUES (4, 'Ford', 'Ranger', 'ShortCab', 2000)";
	mysqli_query($con, $sql);
	$sql = "INSERT INTO `Car` (CarID, Make, Model, Type, Year) VALUES (5, 'Toyota', 'Rav4', 'LE', 2009)";
	mysqli_query($con, $sql);
	$sql = "INSERT INTO `Car` (CarID, Make, Model, Type, Year) VALUES (6, 'Toyota', 'Camary', 'n/a', 2001)";
	mysqli_query($con, $sql);
	$sql = "INSERT INTO `Car` (CarID, Make, Model, Type, Year) VALUES (7, 'BMW', 'M3', 'n/a', 1993)";
	mysqli_query($con, $sql);
	$sql = "INSERT INTO `Car` (CarID, Make, Model, Type, Year) VALUES (8, 'Tesla', 'Model S', 'P100D', 2015)";
	mysqli_query($con, $sql);
	$sql = "INSERT INTO `Car` (CarID, Make, Model, Type, Year) VALUES (9, 'Audi', 'A3', 'n/a', 2016)";
	mysqli_query($con, $sql);

$sql = "DROP TABLE IF EXISTS id2084018_cars.`CAN Signals`";
mysqli_query($con, $sql);

//Create CAN Signals Table
$sql = "CREATE TABLE `CAN Signals` (
	`Address` varchar(25) PRIMARY KEY NOT NULL,
	Controller int NOT NULL,
	Name varchar(255) NOT NULL,
	`Units` varchar(255) NOT NULL,
	FOREIGN KEY (Controller) REFERENCES Controller(ControllerID)
)";
mysqli_query($con, $sql);
	//INSERT DATA TO TABLE
	$sql = "INSERT INTO `CAN Signals` (Address, Controller, Name, Units) VALUES ('0x010', 1, 'Accel_Pedal_Status', 'Boolean')";
	mysqli_query($con, $sql);
	$sql = "INSERT INTO `CAN Signals` (Address, Controller, Name, Units) VALUES ('0x011', 1, 'Accel_Pedal_Position', 'Radians')";
	mysqli_query($con, $sql);
	$sql = "INSERT INTO `CAN Signals` (Address, Controller, Name, Units) VALUES ('0x012', 1, 'Acceleration', 'MPH')";
	mysqli_query($con, $sql);
	$sql = "INSERT INTO `CAN Signals` (Address, Controller, Name, Units) VALUES ('0x310', 2, 'Brakes_Depressed', 'Boolean')";
	mysqli_query($con, $sql);
	$sql = "INSERT INTO `CAN Signals` (Address, Controller, Name, Units) VALUES ('0x311', 2, 'Brake_Pedal_Position', 'Radians')";
	mysqli_query($con, $sql);


echo "<p>";
echo "<form action=home.php method=post>";
echo "<input type=submit name=home value=Home />";
echo "</form>";
echo "</p>";	

mysqli_close($con);
?>

</body>

</html>