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

if(isset($_POST['injury'])) 
{
  $selected_status = $_POST['injury'];
  
  if ($selected_status === 'OTHER') 
  {
    $sql = "SELECT * FROM INJURY WHERE current_status IN ('RECOVERING', 'DAY-TO-DAY') ORDER BY injury_date DESC";
    $injury_result = $conn->query($sql);

    if ($injury_result->num_rows > 0) 
    {
    echo "<h2>QUESTIONABLE PLAYERS";
    // output data of each row
    echo "<table border = 1> <tr> <td> <b>  player name </td><td><b> muscle </td><td><b> current status </td><td><b> injury date  </td></tr>";
    while($row = $injury_result->fetch_assoc()) 
    {
      echo "<tr> <td> " .$row["player_name"] . "</td><td>" .$row["muscle"]. "</td><td> "  .$row["current_status"]. "</td><td> " .$row["injury_date"]. "</td></tr>";
    }
    echo "</table>";
    }
  }

  else if ($selected_status === 'OUT') 
  {
    $sql = "SELECT * FROM INJURY WHERE current_status = '$selected_status' ORDER BY injury_date DESC";
    $injury_result = $conn->query($sql);
    
    if ($injury_result->num_rows > 0) 
    {
    echo "<h2> OUT PLAYERS </h2>";
    echo "<table border = 1> <tr> <td> <b>  player name </td><td><b> muscle </td><td><b> current status </td><td><b> injury date  </td></tr>";
    while($row = $injury_result->fetch_assoc()) 
    {
      echo "<tr> <td> " .$row["player_name"] . "</td><td>" .$row["muscle"]. "</td><td> "  .$row["current_status"]. "</td><td> " .$row["injury_date"]. "</td></tr>";
    }
    echo "</table>";
    }
  }

  else if ($selected_status === 'IN') 
  {
    $sql = "SELECT PLAYER.* 
    FROM PLAYER LEFT JOIN INJURY 
    ON PLAYER.player_name = INJURY.player_name
    WHERE INJURY.player_name IS NULL
    ORDER BY PLAYER.team_name"; 

    $non_injury_result = $conn->query($sql);

    if ($non_injury_result->num_rows > 0) 
    {
    echo "<h2>AVAILABLE PLAYERS</h2>";
    echo "<table border = 1> <tr> <td><b> player name </td><td><b> height </td><td><b> position </td><td><b> salary </td><td><b> pts </td><td><b> rbg </td><td><b> apg </td><td><b> fg_pr </td><td><b> team name </td></tr>";
    while($row = $non_injury_result->fetch_assoc()) 
    {
     echo "<tr> <td> " .$row["player_name"]. "</td><td> "  .$row["height"]. "</td><td> " .$row["position"]. "</td><td> "  .$row["salary"]. "</td><td> " . $row["pts"]. "</td><td> "  .$row["rbg"]. "</td><td> " .$row["apg"]. "</td><td> ". $row["fg_pr"]. "</td><td> "  .$row["team_name"]. "</td></tr>";
    }
    echo "</table>";
} 

else 
{
  echo "0 results";
}


  }
 
  
}




$conn->close();
?>