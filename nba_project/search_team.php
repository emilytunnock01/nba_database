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

//Query for team info
$team_stmt = $conn->prepare("SELECT * FROM TEAM WHERE name LIKE ?");
$searchTerm = "%" . $_POST['team_name'] . "%"; 


$team_stmt->bind_param("s", $searchTerm);
$team_stmt->execute();
$team_result = $team_stmt->get_result();


//output of team info
echo "<h2>Team Info</h2>"; 
if ($team_result->num_rows > 0) 
{
  // output data of each row
  echo "<table border = 1> <tr> <td><b> name </td><td><b> location </td><td><b> picks </td><td><b> coach </td> </tr> ";
  
 
  while($row = $team_result->fetch_assoc()) 
  {
    echo " <tr> <td>" .$row["name"]. "</td> <td> "  .$row["location"]. "</td> <td> " .$row["picks"]. "</td><td> "  .$row["coach"]. "</td><tr>";
  }
  echo "</table>";
}  

else 
{
  echo "0 results";
}


//query for players / roster
$player_stmt = $conn->prepare("SELECT * FROM PLAYER WHERE team_name LIKE ?");
$searchTerm = "%" . $_POST['team_name'] . "%"; 


$player_stmt->bind_param("s", $searchTerm);
$player_stmt->execute();
$player_result = $player_stmt->get_result();

echo "<br> <h2>Roster</h2>"; 


if ($player_result->num_rows > 0) 
{
  // output data of each row
  echo "<table border = 1> <tr> <td> <b> player_name </td><td><b> height </td><td><b> position </td><td><b> salary </td><td><b> pts </td><td><b> rbg </td><td><b> apg </td><td><b> fg_pr </td><td><b> team_name </td></tr>";
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

$conn->close();
?>