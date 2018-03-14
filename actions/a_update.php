<?php

 

require_once 'db_connect.php';

 
if($_POST) {
    $disableFkCheck = "SET GLOBAL FOREIGN_KEY_CHECKS=0;";
 if(!$connect->query($disableFkCheck)) {echo 'Erorr';}

    $hause_id = $_POST['hause_id'];
    $address = $_POST['address'];
    $hausnumer = $_POST['hausnumer'];
    $size= $_POST['size'];
    $image = $_POST['image'];
    
 

    $sql = "UPDATE events SET  address = '$address', hausnumer = '$hausnumer', size = '$size', image=' $image'  WHERE hause_id = {$hause_id}";

    if($connect->query($sql) === TRUE) {

        echo "<p>Succcessfully Updated</p>";

        echo "<a href='../update.php?hause_id=".$hause_id."'><button type='button'>Back</button></a>";

        echo "<a href='../home.php'><button type='button'>Home</button></a>";

    } else {

        echo "Erorr while updating record : ". $connect->error;

    }

 

    $connect->close();

 

}

 

?>