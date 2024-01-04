<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MySQL-PHP</title>
</head>
<style>
	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
	}

	body {
		width: 100%;
		background-color: #131313;
		color: #fafafa;
		font-family: Poppins, sans-serif;
		/* text-align: center; */
	}

	h1 {
		margin-bottom: 20px;
	}

	table,
	th,
	td {
		border: 1px solid #ff7c50;
		border-collapse: collapse;
		padding: 5px;
		margin-left: 10px;
		margin-top: 10px;
	}
</style>

<body>
	<h1>Database Connectivity</h1>
</body>

</html>

<?php

// database connection
/* 
	1. mysql	-- deprecated since PHP 8.0
	2. mysqli	-- improved mysql with procedural & object interface
	3. PDO		-- OOP based connection method
*/

$db_host	= "127.0.0.1";		// ip address of server (here localhost)
$db_name = "practice";
$db_user = "root";
$db_pass = "";
$db_port = 3306;

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// mysqli_report(MYSQLI_REPORT_OFF);
/* 
	Warning: mysqli::__construct(): (HY000/1049): Unknown database 'practicess' in D:\laragon\www\sroy\main.php on line 48
	
	
	if ($conn->connect_errno) {
		die("error: " . $conn->connect_errno);
	} else {
		echo "successfull...";
	}
*/

// Executing queries
/* 
	$stmt = $conn->prepare("SELECT name, marks FROM tab01 WHERE name = ?;");
	$stmt->bind_param('s', $name)
	$stmt->execute();
	$result = $stmt->get_result();
*/

// Fetching result

$query = "SELECT * FROM tab01";
// $query = "INSERT INTO tab01 (name, marks) VALUES (?, ?)";
// echo $_GET["name"] . " " . $_GET["marks"] . "<br>";

try {
	$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
	echo "connection successful ...";

	$stmt = $conn->prepare($query);
	// $stmt->bind_param("s", $_GET["name"]);
	// $stmt->bind_param("d", $_GET["marks"]);
	// $stmt->bind_param("sd", $_GET["name"], $_GET["marks"]);
	$stmt->execute();
	$result = $stmt->get_result();

	$num_rows = $result->num_rows;

	echo <<<TABLE
		<table>
			<thead>
				<th>ID</th>
				<th>NAME</th>
				<th>MARKS</th>
			</thead>
			<tbody>
	TABLE;

	if ($num_rows > 0) {
		// while ($num_rows > 0) {
		// 	$num_rows--;
		// 	$row = $result->fetch_assoc();
		// 	echo <<<DATA
		// 		<tr>
		// 			<td>{$row['id']}</td>
		// 			<td>{$row['name']}</td>
		// 			<td>{$row['marks']}</td>
		// 		</tr>
		// 	DATA;
		// }

		$rows = $result->fetch_all(MYSQLI_ASSOC);
		foreach ($rows as $key => $val) {
			echo <<<DATA
				<tr>
					<td>{$val['id']}</td>
					<td>{$val['name']}</td>
					<td>{$val['marks']}</td>
				</tr>
			DATA;
		}
		// echo '<pre>';
		// var_dump($rows);
		// echo '</pre>';
	} else {
		echo <<<NODATA
			<tr>
				<td colspan="3">No data found</td>
			</tr>
		NODATA;
	}
	echo <<<TABLE
			</tbody>
		</table>
	TABLE;

	// print_r($tab01);
	// echo '</pre>';
} catch (\mysqli_sql_exception $e) {
	die("ERROR: " . $e->getMessage() . " " . $e->getCode());
}
?>