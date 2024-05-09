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


$sql = "SELECT * from PLAYER ORDER BY team_name";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
  // output data of each row
  echo "<table border = 1> <tr> <td> <b> player name </td><td><b> height </td><td><b> position </td><td><b> salary </td><td><b> pts </td><td><b> rbg </td><td><b> apg </td><td><b> fg_pr </td><td><b> team_name </td></tr>";
  while($row = $result->fetch_assoc()) 
  {
    echo "<tr> <td> " .$row["player_name"]. "</td><td> "  .$row["height"]. "</td><td> " .$row["position"]. "</td><td> "  .$row["salary"]. "</td><td> " . $row["pts"]. "</td><td> "  .$row["rbg"]. "</td><td> " .$row["apg"]. "</td><td> ". $row["fg_pr"]. "</td><td> "  .$row["team_name"]. "</td></tr>";
  }
  echo "</table>";
} 

else 
{
  echo "0 results";
}

$conn->close();
?>