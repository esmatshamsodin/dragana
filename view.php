<?php

 

require_once 'actions/db_connect.php';

 

if($_GET['id']) {

    $id = $_GET['id'];

 

    $sql = "SELECT * FROM bige WHERE id = {$id}";

    $result = $connect->query($sql);

 

    $data = $result->fetch_assoc();

 

    $connect->close();

 

?>

 

<!DOCTYPE html>

<html>

<head>

    <title>Edit Event</title>

 

    <style type="text/css">

        fieldset {

            margin: auto;

            margin-top: 100px;

            width: 70%;

        }

 

        table tr th {

            padding-top: 20px;


        }
        table th {
            width: 60%;
            border: 1px solid black;
        }
        
    </style>

 

</head>

<body>

 

<fieldset>

    <legend>View Event</legend>

    <div class='col-md-4'>
                          <div class='thumbnail'>
                              <img src='<?php echo $data['image'] ?>' style='width:100%;height:250px;'>
                              <div class='caption'>
                                <p>Name : <?php echo $data['name'] ?></p>
                                <p>Address : <?php echo $data['address'] ?></p>
                                <p>Description : <?php echo $data['description'] ?></p>
                                <p>Date :<?php echo $data['dateandtime'] ?></p>
                                <p>Capacity : <?php echo $data['capacity'] ?></p>
                                <p>Email :<?php echo $data['contact'] ?></p>
                                <p>Phone :<?php echo $data['contact_phone'] ?></p>
                                <p>Url :<?php echo $data['URL'] ?></p>
                                <p>Type :<?php echo $data['type'] ?></p>
                              </div>
                            </a>
                          </div>
                        </div>
       

            <tr>

                <input type="hidden" name="id" value="<?php echo $data['id']?>" />
                <td><a href="home.php"><button type="button">Back</button></a></td>

            </tr>

        </table>

    </form>

 

</fieldset>

 

</body>

</html>

 

<?php

}

?>