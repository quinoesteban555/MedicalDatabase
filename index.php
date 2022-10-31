 <?php
$port = $_SERVER['WEBSITE_MYSQL_PORT'];
$servername = "localhost:$port";
$username = "azure";
$password = "6#vWHD_$";
$db = "localdb";

$mysqli = new mysqli($servername,$username,$password,$db);
// Create connection

// Check connection
if ($mysqli->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT message FROM helloworld";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "message: " . $row["message"]. "<br>";
  }
} else {
  echo "0 results";
}
$mysqli->close();
?>
