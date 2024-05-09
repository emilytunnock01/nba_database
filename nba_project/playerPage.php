<!DOCTYPE html>
<html>
<body>
<?php include 'design.php'; ?>

<h2> Players Page </h2>

<!-- Ability to Search for individual player-->
<form action="search_player.php" method="POST">
    Player Name: <input type="text" name="player_name"><br>
    <input type="submit">
</form>


<!-- lists all the player -->
<h2> List of all players in the database</h2>
<?php include 'player_list.php'; ?>



</body>
</html>