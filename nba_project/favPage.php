<!DOCTYPE html>
<html>
<body>
<?php include 'design.php'; ?>

<h2> Create a new user: </h2>


<form action="add_user.php" method="POST">
    username: <input type="text" name="insert_username"><br>
    dob (yyyy-mm-dd): <input type="text" name="insert_dob"><br>
    favorite player: <input type="text" name="insert_fav_pl"><br>
    favorite team: <input type="text" name="insert_fav_team"><br>
    <input type="submit">
</form>




</body>
</html>