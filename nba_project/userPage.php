<!DOCTYPE html>
<html>
<body>

<h2> Profiles </h2>

<!-- Ability to Search for individual team-->
<form action="user_search.php" method="POST">
    username: <input type="text" name="username_name"><br>
    <input type="submit">
</form>


<!-- lists all the teams -->
<h2> List of all registered users</h2>
<?php include 'user_list.php'; ?>



</body>
</html>