<!DOCTYPE html>
<html>
<body>

<?php include 'design.php'; ?>

<h2> Injury Page </h2>

<h3> Filter Player by Current Status </h3>

<form action="search_injury.php" method="POST">
    Status:  
    <select name="injury" id="current_status">
        <option value="IN">IN</option>
        <option value="OUT">OUT</option>
        <option value="OTHER">OTHER</option>
    </select>
    <input type="submit">
</form>




<!-- lists all the teams -->
<h2> List of all current injuries:</h2>
<?php include 'injury_list.php'; ?>



</body>
</html>