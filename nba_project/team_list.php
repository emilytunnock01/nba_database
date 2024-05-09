<?php
$servername = "localhost";
$username = "root";
$password = "secret23";
$dbname = "NBA";

include 'design.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) 
{
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * from TEAM";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
  // output data of each row
  echo "<table border = 1> <tr> <td> <b> name </td><td><b> location </td><td><b> picks </td><td><b> coach </td> </tr> ";
  
 
  while($row = $result->fetch_assoc()) 
  {
    echo " <tr> <td>" .$row["name"]. "</td> <td> "  .$row["location"]. "</td> <td> " .$row["picks"]. "</td><td> "  .$row["coach"]. "</td><tr>";
  }
  echo "</table>";
} 

else 
{
  echo "0 results";
}

$conn->close();
?>