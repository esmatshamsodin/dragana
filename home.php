
        <?php
         ob_start();
         session_start();

         require_once 'db_connect.php';

         // if session is not set this will redirect to login page
         if( !isset($_SESSION['user']) ) {
          header("Location: index.php");
          exit;
         }

         // select logged-in users detail
         $res=mysqli_query($conn, "SELECT * FROM users WHERE userId=".$_SESSION['user']);
         $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
        ?>
            
<!DOCTYPE html>

<html>
<head>
<title>Homeowners</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    <div class="fl_left">
      <ul class="nospace">
        <li><i class="fa fa-phone"></i> +436889600112</li>
        <li><i class="fa fa-envelope-o"></i>admin@admin.com</li>
      </ul>
    </div>
    <div class="fl_right">
      <ul class="nospace">
        <li><a href="#"><i class="fa fa-lg fa-home"></i></a></li>
        <li><a href="#">Hauses</a></li>
        <li><a href="#">Owners</a></li>
        <li><a href="#">Renters</a></li>
        <li><a href="#">Admins</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">About</a></li>
      </ul>
    </div>
    
  </div>
</div>
<div class="bgded overlay" style="background-image:url('images/image1.jpg');"> 
  <div class="wrapper row1">
    <header id="header" class="hoc clear"> 
      <div id="logo" class="fl_left">
        <h1><a href="index.html">Homeowners</a></h1>
        <p></p>
      </div>
      </header>
  <div id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <article>
      <p class="heading">WellCome <?php echo $userRow['userName']; ?></p>
      <footer>
        <ul class="nospace inline pushright">
          <li><a class="btn btn-primary btn-md" href="logout.php?logout">Sign Out</a></li>
        </ul>
      </footer>
    </article>
  </div>
</div>
</div>


   
      
        <br>
        <div class="col-md-12">
          <?php require_once 'actions/db_connect.php'; ?>
          <p>Houses<p>
          <a href="create.php"><button class="btn-success" type="button">Add Table</button></a>
          <table class="table" style="background-color: lightgray;">
                    <thead >
                        <tr>
                           <th>id</th>
                            <th>address</th>
                            <th>hausnumber</th>
                            <th>size</th>
                            <th>image</th>
                            <th>Action</th>
                        </tr>

                    </thead>

               <tbody>


              <?php

              $sql = "SELECT house.hause_id,house.image, grundbuch.address,grundbuch.hausnumber,grundbuch.size FROM house LEFT JOIN grundbuch ON house.hause_id = grundbuch.id ORDER BY grundbuch.id;"
;

              $result = $connect->query($sql);

   
              if($result->num_rows > 0) {

                  while($row = $result->fetch_assoc()) {

                      echo "<tr>

                          <td>".$row['hause_id']."</td>
                          <td>".$row['address']."</td>

                          <td>".$row['hausnumber']."</td>
                          <td>".$row['size']."</td>                          
                          <td><img style='width:50px; heigh:50px;' src='".$row['image']."' </td>
                          
                          <td><a  href='update.php?hause_id=".$row['hause_id']."'><button style='width:100px;' class='btn btn-warning' type='button'>Edit</button></a>

                              <a  href='delete.php?hause_id=".$row['hause_id']."'><button style='width:100px;' class='btn btn-danger' type='button'>Delete</button></a>
                          </td>

                      </tr>";

                  }

              } else {

                  echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";

              }

              ?>
            </tbody>
        </table>


        <br>
        <hr>
        <div class="col-md-12">
          <?php require_once 'actions/db_connect.php'; ?>
          <p>Owners<p>
          <a href="create.php"><button class="btn-success" type="button">Add Table</button></a>
          <table class="table" style="background-color: lightgray;">
                    <thead >
                        <tr>
                           <th>Id</th>
                            <th>Name</th>
                            <th>Lastname</th>
                            <th>Birthdate</th>
                            <th>Phonenumber</th>
                            <th>Address</th>
                            <th>Number Of Friend's</th>
                            <th>can-vot</th>
                            <th>can-comment</th>
                            <th>Action</th>
                        </tr>

                    </thead>

               <tbody>


              <?php

              $sql = "SELECT * FROM owners where id>0;"
;

              $result = $connect->query($sql);

   
              if($result->num_rows > 0) {

                  while($row = $result->fetch_assoc()) {

                      echo "<tr>

                          <td>".$row['id']."</td>
                          <td>".$row['name']."</td>

                          <td>".$row['lastname']."</td>
                          <td>".$row['birthdate']."</td>  
                          <td>".$row['phone']."</td>      
                          <td>".$row['address']."</td>
                          <td>".$row['number-of-rel']."</td>
                          <td>".$row['can-vot']."</td>
                          <td>".$row['can-comment']."</td>

                          
                          <td><a  href='update.php?id=".$row['id']."'><button style='width:100px;' class='btn btn-warning' type='button'>Edit</button></a>

                              <a  href='delete.php?id=".$row['id']."'><button style='width:100px;' class='btn btn-danger' type='button'>Delete</button></a>
                          </td>

                      </tr>";

                  }

              } else {

                  echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";

              }

              ?>
            </tbody>
        </table>
         

        <br>
        <hr>
        <div class="col-md-12">
          <?php require_once 'actions/db_connect.php'; ?>
          <p>Renters<p>
          <a href="create.php"><button class="btn-success" type="button">Add Table</button></a>
          <table class="table" style="background-color: lightgray;">
                    <thead >
                        <tr>
                           <th>Id</th>
                            <th>Name</th>
                            <th>Lastname</th>
                            <th>Birthdate</th>
                            <th>Phonenumber</th>
                            <th>Address</th>
                            <th>can-vot</th>
                            <th>can-comment</th>
                            <th>Action</th>
                        </tr>

                    </thead>

               <tbody>


              <?php

              $sql = "SELECT * FROM renters where id>0;"
;

              $result = $connect->query($sql);

   
              if($result->num_rows > 0) {

                  while($row = $result->fetch_assoc()) {

                      echo "<tr>

                          <td>".$row['id']."</td>
                          <td>".$row['name']."</td>

                          <td>".$row['lastname']."</td>
                          <td>".$row['birthdate']."</td>  
                          <td>".$row['phone']."</td>      
                          <td>".$row['address']."</td>
                          <td>".$row['can-vot']."</td>
                          <td>".$row['can-comment']."</td>
                          
                          <td><a  href='update.php?id=".$row['id']."'><button style='width:100px;' class='btn btn-warning' type='button'>Edit</button></a>

                              <a  href='delete.php?id=".$row['id']."'><button style='width:100px;' class='btn btn-danger' type='button'>Delete</button></a>
                          </td>

                      </tr>";

                  }

              } else {

                  echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";

              }

              ?>
            </tbody>
        </table>





  
  
</body>
</html>

<?php ob_end_flush(); ?>

