<!DOCTYPE html>
<html>
<body>
<?php include 'design.php'; ?>
<h2> Teams Page </h2>

<!-- Ability to Search for individual team-->
<form action="search_team.php" method="POST">
    Team Name: <input type="text" name="team_name"><br>
    <input type="submit">
</form>


<!-- lists all the teams -->
<h2> List of teams:</h2>
<?php include 'team_list.php'; ?>



</body>
</html>