
<?php
 ob_start();
 session_start();
 require_once 'db_connect.php';

  // it will never let you open index(login) page if session is set
 if ( isset($_SESSION['user'])!="" ) {
  header("Location: home.php");
  exit;
 }

  $error = false;

 if( isset($_POST['btn-login']) ) {

  // prevent sql injections/ clear user invalid inputs
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);

  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);

  // prevent sql injections / clear user invalid inputs

  if(empty($email)){
   $error = true;
   $emailError = "Please enter your email address.";
  } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  }

   if(empty($pass)){
   $error = true;
   $passError = "Please enter your password.";
  }

  // if there's no error, continue to login
  if (!$error) {
   $password = hash('sha256', $pass); // password hashing using SHA256
   $res=mysqli_query($conn, "SELECT userId, userName, userPass ,usertype FROM users WHERE userEmail='$email'");
   $row=mysqli_fetch_array($res, MYSQLI_ASSOC);
   $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row

   if( $count == 1 && $row['userPass']==$password && $row["usertype"]=="1" ) {
    $_SESSION['user'] = $row['userId'];
    header("Location: home.php");
   } elseif( $count == 1 && $row['userPass']==$password && $row["usertype"]=="0") {
    $_SESSION['user'] = $row['userId'];
    header("Location: home1.php");
   } else{
    $errMSG = "you are not registerd";
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
      <form style="color:black;" class="text-center" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off" >
              
             <h2>Sign In.</h2>
             <hr />
                <?php
                if ( isset($errMSG) ){
                echo $errMSG; ?>
                  <?php
                   }
                   ?>
             <input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />

             <span class="text-danger"><?php echo $emailError; ?></span>

             <input  type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
       
            <span class="text-danger"><?php echo $passError; ?></span>
             <hr />

             <button class="btn btn-block btn-primary" class="btn btn-default" type="submit" name="btn-login">Sign In</button>

             <hr />
             <a class="btn btn-block btn-primary"  href="index.php">back</a>
    </form>
    </article>
  </div>
</div>
</div>
</body>


    <div class="container" >
      <div class="row">
        <div class="col-lg-12 col-sm-6 wow fadeInLeft delay-05s">
          <div class="login-list">
             
    </div>
</div>
        
</body>
</html>

<?php ob_end_flush(); ?>

