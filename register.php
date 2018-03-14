
<?php

 ob_start();
 session_start(); // start a new session or continues the previous

 if( isset($_SESSION['user'])!="" ){
  header("Location: home.php"); // redirects to home.php
 }

 include_once 'db_connect.php';

 $error = false;

 if ( isset($_POST['btn-signup']) ) {

  // sanitize user input to prevent sql injection
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);

  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);

  // basic name validation
  if (empty($name)) {
   $error = true;
   $nameError = "Please enter your full name.";
  } else if (strlen($name) < 3) {
   $error = true;
   $nameError = "Name must have at least 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
   $error = true;
   $nameError = "Name must contain letters and spaces.";
  }

   //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  } else {

   // check whether the email exist or not
   $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
   $result = mysqli_query($conn, $query);
   $count = mysqli_num_rows($result);
   if($count!=0){
    $error = true;
    $emailError = "Provided Email is already in use.";
   }
  }

  // password validation
  if (empty($pass)){
   $error = true;
   $passError = "Please enter password.";
  } else if(strlen($pass) < 6) {
   $error = true;
   $passError = "Password must have at least 6 characters.";
  }

  // password encrypt using SHA256();
  $password = hash('sha256', $pass);

  // if there's no error, continue to signup
  if( !$error ) {

   $query = "INSERT INTO users(userName,userEmail,userPass,usertype) VALUES('$name','$email','$password','1')";
   $res = mysqli_query($conn, $query);

   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
    unset($name);
    unset($email);
    unset($pass);
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later...";
    }
  }
 }

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
     <form  style="color: black" class="text-center" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
           <br>
             <h2>Sign Up</h2>
                  <?php
                    if ( isset($errMSG) ) { 
                  ?>
                   <div class="alert">

                   <?php echo $errMSG; ?>
                    </div>
                   <?php
                 }
                    ?>
    
    <input class="form-control" type="text" name="name" class="form-control" placeholder="Enter Name" maxlength="50" bakgrund-color="black" value="<?php echo $name ?>" />   
                    <span class="text-danger"><?php echo $nameError; ?></span><br>
             <input class="form-control" type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
                <span class="text-danger"><?php echo $emailError; ?></span><br>
             <input class="form-control" type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" /><br>
                <span class="text-danger"><?php echo $passError; ?></span><br>
            
             <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>  or
             <a  href="login.php">Login in Here...</a>
    </form>
        
    </article>
  </div>
</div>
</div>



    

</body>
</html>
<?php ob_end_flush(); ?>