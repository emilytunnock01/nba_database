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

//Query for user info
$user_stmt = $conn->prepare("SELECT *  FROM USER_INFO WHERE username LIKE ?");
$searchTerm = "%" . $_POST['username_name'] . "%"; 


$user_stmt->bind_param("s", $searchTerm);
$user_stmt->execute();
$user_result = $user_stmt->get_result();


//output of injury info
echo "<h2>User Info</h2>"; 
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