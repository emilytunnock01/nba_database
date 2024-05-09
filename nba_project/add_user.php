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


$randomNumber = rand(1, 500);

$user_stmt = $conn->prepare("INSERT INTO USER_INFO (user_id, username, dob, fav_pl, fav_team) 
                             SELECT ?, ?, ?, player_name, ? 
                             FROM player 
                             WHERE player_name LIKE ?");
$user_stmt->bind_param("issss", $randomNumber, $_POST['insert_username'], $_POST['insert_dob'], $_POST['insert_fav_team'], $fav_pl);


$fav_pl = '%' . $_POST['insert_fav_pl'] . '%';

$user_stmt->execute();
$user_stmt->close();


echo "<h2>User Info</h2>"; 
//Query for user info
$user_stmt = $conn->prepare("SELECT *  FROM USER_INFO WHERE username LIKE ?");
$searchTerm = "%" . $_POST['insert_username'] . "%"; 


$user_stmt->bind_param("s", $searchTerm);
$user_stmt->execute();
$user_result = $user_stmt->get_result();


//output of injury info
echo "<h2>New user: </h2>"; 
if ($user_result->num_rows > 0) 
{
  // output data of each row
  echo "<table border = 1> <tr> <td> <b> user_id </td> <td> <b> username </td><td><b> dob </td><td><b> favorite player </td><td><b> favorite team </td> </tr> ";
  
 
  while($row = $user_result->fetch_assoc()) 
  {
    echo " <tr> <td>" .$row["user_id"]. " </td><td>".$row["username"]. "</td> <td> "  .$row["dob"]. "</td> <td> " .$row["fav_pl"]. "</td><td> "  .$row["fav_team"]. "</td><tr>";
  }
  echo "</table>";
}  

else 
{
  echo "0 results";
}


$conn->close();
?>