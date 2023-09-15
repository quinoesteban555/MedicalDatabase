
<html>  
<head>
    <title>SIGN_IN </title>
</head>
<body>
<?php
$port = $_SERVER
['WEBSITE_MYSQL_PORT'];
$servername = "localhost:$port";
$username = "azure";
$password = "6#vWHD_$";
$db = "localdb";


$mysqli = new mysqli($servername,$username,$password,$db);
// Create connection
// Check connection
if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

$Firstname = $_POST["firstname"];
echo $Firstname;
$lastname = $_POST["lastname"];
$email = $_POST["email"];

$sql = "INSERT INTO helloworldd (firstname, lastname, email)
VALUES ('$Firstname','$lastname','$email')";

if ($mysqli->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $mysqli->error;
}
?> 
</body>
</html>
