<?php

 

require_once 'db_connect.php';

 

if($_POST) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $capacity= $_POST['capacity'];
    $email = $_POST['email'];
    $phonnumber = $_POST['phonnumber'];
    $address = $_POST['address'];
    $URL = $_POST['URL'];
    $type = $_POST['type'];
     $image = $_POST['image'];
     $startday=$_POST['startday'];
     $starttime=$_POST['starttime'];
 

    $sql = "INSERT INTO events (id, name,description,capacity,email,phonnumber,address,URL,type,image,startday,starttime) VALUES ('$id', '$name','$description','$capacity','$email','$phonnumber','$address','$URL','$type','$image','$startday','$starttime')";

    if($connect->query($sql) === TRUE) {

        echo "<p>New Record Successfully Created</p>";

        echo "<a href='../create.php'><button type='button'>Back</button></a>";

        echo "<a href='../home.php'><button type='button'>Home</button></a>";

    } else {

        echo "Error " . $sql . ' ' . $connect->connect_error;

    }

 

    $connect->close();

}

 

?>