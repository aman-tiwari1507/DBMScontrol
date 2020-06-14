<?php
$name = $_POST['username'];
$pass = $_POST['password'];
$option = $_POST['sql'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

if($option == 'INSERT'){
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }


  $sql = "INSERT INTO qwerty (name,passwd) VALUES ('$name', '$pass')";

  if ($conn->query($sql) === TRUE) {
    echo "<h1>$option</h1>";
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}

if($option == 'SELECT'){
  $sql = "SELECT name,passwd FROM qwerty";
    // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    if($row["name"] === $name){
    echo "<h1>$option</h1>"; 
    echo "Name : " . $row["name"]. " - Password: " . $row["passwd"]."<br>";
        }
      }
    } else {
  echo "0 results";
  }
  $conn->close();
}

if ($option == 'DELETE'){
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // sql to delete a record
  $sql = "DELETE FROM qwerty WHERE name='$name'";

  if ($conn->query($sql) === TRUE) {
    echo "<h1>$option</h1>"; 
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $conn->error;
  }

  $conn->close();
}
?> 



