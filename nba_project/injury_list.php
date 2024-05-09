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


//INJURY
$sql = "SELECT * from INJURY ORDER BY injury_date DESC";
$injury_result = $conn->query($sql);


echo "<h2>Injury Information</h2>";

if ($injury_result->num_rows > 0) 
{
  // output data of each row
  echo "<table border = 1> <tr> <td> <b>  player name </td><td><b> muscle </td><td><b> current status </td><td><b> injury date  </td></tr>";
  while($row = $injury_result->fetch_assoc()) 
  {
    echo "<tr> <td> " .$row["player_name"] . "</td><td>" .$row["muscle"]. "</td><td> "  .$row["current_status"]. "</td><td> " .$row["injury_date"]. "</td></tr>";
  }
  echo "</table>";
} 

else 
{
  echo "0 results";
}

$conn->close();
?>