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

//PLAYER
$player_stmt = $conn->prepare("SELECT * FROM PLAYER WHERE player_name LIKE ?");
$searchTerm = "%" . $_POST['player_name'] . "%"; 


$player_stmt->bind_param("s", $searchTerm);
$player_stmt->execute();
$player_result = $player_stmt->get_result();


echo "<h2>Player Information</h2>";

if ($player_result->num_rows > 0) 
{
  // output data of each row
  echo "<table border = 1> <tr> <td> <b> player name </td><td><b> height </td><td><b> position </td><td><b> salary </td><td><b> pts </td><td><b> rbg </td><td><b> apg </td><td><b> fg_pr </td><td><b> team name </td></tr>";
  while($row = $player_result->fetch_assoc()) 
  {
    echo "<tr> <td> " .$row["player_name"]. "</td><td> "  .$row["height"]. "</td><td> " .$row["position"]. "</td><td> "  .$row["salary"]. "</td><td> " . $row["pts"]. "</td><td> "  .$row["rbg"]. "</td><td> " .$row["apg"]. "</td><td> ". $row["fg_pr"]. "</td><td> "  .$row["team_name"]. "</td></tr>";
  }
  echo "</table>";
} 

else 
{
  echo "0 results";
}


//INJURY
$injury_stmt = $conn->prepare("SELECT * FROM INJURY WHERE player_name LIKE ?");
$searchTerm = "%" . $_POST['player_name'] . "%"; 


$injury_stmt->bind_param("s", $searchTerm);
$injury_stmt->execute();
$injury_result = $injury_stmt->get_result();


echo "<h2>Injury Information</h2>";

if ($injury_result->num_rows > 0) 
{
  // output data of each row
  echo "<table border = 1> <tr> <td> <b> muscle </td><td><b> current status </td><td><b> injury date </td></tr>";
  while($row = $injury_result->fetch_assoc()) 
  {
    echo "<tr> <td> " .$row["muscle"]. "</td><td> "  .$row["current_status"]. "</td><td> " .$row["injury_date"]. "</td></tr>";
  }
  echo "</table>";
} 

else 
{
  echo "<h4>Not currently injured</h4>";
}

$conn->close();
?>