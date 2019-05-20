<?php
header("Content-Type: application/json; charset=UTF-8");
$bookdata = json_decode($_POST["b"], false);//convert into object

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

$book = 'INSERT INTO `books`(`author`, `title`, `genre`, `price`) VALUES("'  .$bookdta->author . '", "'
																             .$bookdata->title . '" ,"'
  																             .$bookdata->genreselect . '" ,"'
																             .$bookdata->price) . '")';

$msg1 = "The book has been stored successfully in the database.";
$msg2 = "Error! The book wasn't stored successfully."; 

//Check if the insert happened successfully
if(mysqli_query($conn, $book)){
	echo json_encode($msg1);//return as JSON
}else{
	echo json_encode($msg2);//return as JSON
}

//Close connection
mysqli_close($conn);

/*sources: https://www.w3schools.com (php), php.net*/
?>

