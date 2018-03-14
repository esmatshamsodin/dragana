<?php require_once 'actions/db_connect.php'; ?>

 

<!DOCTYPE html>

<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g=" crossorigin="anonymous"></script>   
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title>Event Controller</title>


 

    <style type="text/css">
    #logos{
      width: 50px;
    }
    body{
        background-color: #E8E8E8;
    }

        .manageUser {

            width: 100%;
            margin: auto;
        }

    .parallax {
    /* The image used */
    background-image: url("http://www.thememydream.com/wp-content/uploads/2017/02/Event-Manager-Birmingham.jpg");
    box-shadow: 0 5px 5px 0     rgb(144,0,0), 0 10px 10px 0 rgba(0, 0, 0, 0.2);

    /* Set a specific height */
    min-height: 550px; 
    width: 100%;
    margin-top: 10px;

    /* Create the parallax scrolling effect */
    b
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    border-radius: 5px;

}
        table {

            width: 100%;
            height: 100%;
            margin-top: 20px;
            color:grey;
            background: url("img/students_learning_platform.png");
        }

        h1 {
          text-align: center;
          color:silver;
          font-size: 30px;
          margin-bottom: 30px;
          margin-top:30px;
        }
    img {
      width: 100%;
    }

    </style>

 

</head>

<body>
  <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <ul>
            <a class="navbar-brand" href="#">Events Controller</a>
            <a class="btn btn-info" href="create.php" style="margin-top: 7px;">Add Event</a>

        </ul>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <a style="float: right;margin-top: 7px;"" class="btn btn-info" href="logout.php?logout">Sign Out</a>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="parallax">
</div>
 
<div class="container">
<div class="manageUser">
      <h1 class="text-danger">Events in VIENNA</h1 >
        <?php

            $sql = "SELECT image,description,dateandtime,id FROM bige";

            $result = $connect->query($sql);

 
            echo "<div class='row'>";    
            if($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {

                    echo "
                        <div class='col-md-4'>
                          <div class='thumbnail'>
                              <img src='".$row['image']."' style='width:100%;height:250px;'>
                              <div class='caption'>
                                <p>".$row['description']."</p>
                                <p>".$row['dateandtime']."</p>
                                <a href='update.php?id=".$row['id']."'><button type='button'>Edit</button></a>
                                <a href='delete.php?id=".$row['id']."'><button type='button'>Delete</button></a>
                              </div>
                          </div>
                        </div>
";

                }

            }
            echo "</div>";

            ?>
        
           
         <footer class="blog-footer text-center jumbotron">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                <h3 class="text-center">Facebook</h3>
                <img src="http://webiconspng.com/wp-content/uploads/2017/09/Facebook-PNG-Image-63654.png" id="logos">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                <h3 class="text-center">Instagram</h3>
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/76/Instagram.pn.png/240px-Instagram.pn.png" id="logos">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                <h3 class="text-center">GitHub</h3>
                <img src="https://www.shareicon.net/data/2017/03/07/880593_media_512x512.png" id="logos">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                <h3 class="text-center">Twitter</h3>
                <img src="http://pngimg.com/uploads/twitter/twitter_PNG1.png" id="logos">
            </div>
        </div>
        <br>
        <h4> &copy; Dragana Barbu - CodeFactory 2018</h4>
        <h4>
            <a href="#">Back to top</a>
        </h4>
   </footer>


             

       

   


</div>



</div>
</body>

</html>

