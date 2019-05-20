<?php
header("Content-Type: application/json; charset=UTF-8");
$keyword = json_decode($_GET["a"], false);//convert into object

$server = "ftp://waws-prod-sn1-131.ftp.azurewebsites.windows.net/site/wwwroot";
$username = "booksapp\$booksapp";
$password = "p1mXepXnvici83FJeGQNn88J8pgknKz3ig6J9xq5JcqgShtkfaxemAJjMprv";
$dbname = "booksappdatabase";

//Create connection 
$conn = new mysqli($server, $username, $password, $dbname);

//Check connection
if($conn->conn_error){
	die("Connection failed: " . $conn->conn_error);
}
echo("Connected successfully!");

$result = $conn->query("SELECT * FROM `books` WHERE `title` LIKE '%" .$keyword. "%'");
$data = array();
$data = $result->fetch_all(MYSQLI_ASSOC);

if($data != null){
	echo json_encode($data);
}else{
	echo ("<br>No books were found.");
}

//Close connection
mysqli_close($conn);

/*sources: https://www.w3schools.com (php), php.net*/
?>
	