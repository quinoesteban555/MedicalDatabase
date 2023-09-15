<html>

<body>
Welcome
<? php
$port = $_SERVER
['WEBSITE_MYSQL_PORT'];
$servername = "localhost:$port";
$username = "azure";
$password = "6#vWHD_$";
$db = "localdb";
echo $_POST("fisrtname");
$firstname = $_POST("firstname");
$lastname = "Doe";
$email = "hello@gmail.com";

$mysqli = new mysqli($servername,$username,$password,$db);
// Create connection
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO helloworld (firstname, lastname, email)
VALUES ($firstname, $lastname, $email)";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
?>

</body>
</html> 

