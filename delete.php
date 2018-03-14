<?php

 

require_once 'actions/db_connect.php';

 

if($_GET['hause_id']) {

    $hause_id = $_GET['hause_id'];

    $sql = "SELECT house.hause_id,house.image, grundbuch.address,grundbuch.hausnumber,grundbuch.size FROM house LEFT JOIN grundbuch ON house.hause_id = grundbuch.id WHERE hause_id = $hause_id ORDER BY grundbuch.id";

    $result = $connect->query($sql);

    $data = $result->fetch_assoc();

 

    $connect->close();

?>

 

<!DOCTYPE html>

<html>

<head>

    <title>Delete User</title>

</head>

<body>

 

<h3>Do you really want to delete this user?</h3>

<form action="actions/a_delete.php" method="post">

 

    <input type="hidden" name="hause_id" value="<?php echo $data['hause_id'] ?>" />

    <button type="submit">Yes, delete it!</button>

    <a href="home.php"><button type="button">No, go back!</button></a>

</form>

 

</body>

</html>

 

<?php

}

?>