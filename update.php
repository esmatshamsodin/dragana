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
      <p class="heading">WellCome</p>
      <h2 class="heading">To Our WebPage</h2>
      <p>Please LogIn And If You Are New Please SignUp Now</p>
      <footer>
        <ul class="nospace inline pushright">
          <li><a class="btn" href="Login.php">LogIn</a></li>
          <li><a class="btn inverse" href="register.php">SignUp</a></li>
        </ul>
      </footer>
    </article>
  </div>
</div>
</div>

 

<fieldset>

    <legend>Update</legend>

 

    <form action="actions/a_update.php" method="post">

        <table class="table" style="border-width: 5px;border-color: black;border-style: solid;" cellspacing="0" cellpadding="0">

            <tr>

                <th>id</th>

                <td><input class="form-control" type="text" name="id" placeholder="id" value="<?php echo $data['hause_id'] ?>" /></td>

            </tr>     

            <tr>

                <th>address</th>

                <td><input class="form-control" type="text" name="address" placeholder="address" value="<?php echo $data['address'] ?>" /></td>

            </tr>

            <tr>

                <th>hausnumber</th>

                <td><input class="form-control" type="text" name="hausnumber" placeholder="hausnumber" value="<?php echo $data['hausnumber'] ?>" /></td>

            </tr>
            <tr>

                <th>size</th>

                <td><input class="form-control" type="text" name="size" placeholder="capacity" value="<?php echo $data['size'] ?>" /></td>

            </tr> 
             
            <tr>

                <th>image</th>

                <td><input class="form-control" type="text" name="image" placeholder="image" value="<?php echo $data['image'] ?>" /></td>

            </tr> 
            <tr>

                <input class="form-control" type="hidden" name="id" value="<?php echo $data['hause_id']?>" />

                <td><button type="submit">Save Changes</button></td>

                <td><a href="home.php"><button type="button">Back</button></a></td>

            </tr>

        </table>

    </form>

 

</fieldset>

 <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="copyright">
            &copy; Copyright <strong>Esmat's Empire</strong>. All Rights Reserved
          </div>
          
        </div>
      </div>
    </div>
  </footer>
  <!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- Required JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/morphext/morphext.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/stickyjs/sticky.js"></script>
  <script src="lib/easing/easing.js"></script>

  <!-- Template Specisifc Custom Javascript File -->
  <script src="js/custom.js"></script>

  <script src="contactform/contactform.js"></script>
 

</body>

</html>
 

<?php

}

?>