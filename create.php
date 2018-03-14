<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <title>CodeReview14</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <!-- favicon.ico -->
  <link href="favicon.ico" rel="shortcut icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">
  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate-css/animate.min.css" rel="stylesheet">
  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
</head>


<body>
<div id="preloader"></div>
  <section id="hero">

    <div class="hero-container">
      <div class="wow fadeIn">
        <div class="hero-logo">
            <h1>Add New Events</h1>
        </div>
      </div>
    </div>
  </section>

 

<fieldset>

    <legend>Event's Table</legend>

 

    <form action="actions/a_create.php" method="post">

        <table class="table" style="border-width: 5px;border-color: black;border-style: solid;" cellspacing="0" cellpadding="0">

            <tr>
                <th>ID</th>
                <td><input class="form-control" type="text" name="id" placeholder="id" /></td>
            </tr>     
            <tr>
                <th>Name</th>
                <td><input class="form-control" type="text" name="name" placeholder="name" /></td>
            </tr>
            <tr>
                <th>description</th>
                <td><input class="form-control" type="text" name="description" placeholder="description" /></td>
            </tr>  
            <tr>
                <th>capacity</th>
                <td><input class="form-control" type="text" name="capacity" placeholder="capacity" /></td>
            </tr>
            <tr>
                <th>email</th>
                <td><input class="form-control" type="text" name="email" placeholder="email" /></td>
            </tr> 
            <tr>
                <th>phonnumber</th>
                <td><input class="form-control" type="text" name="phonnumber" placeholder="phonnumber" /></td>
            </tr>  
            <tr>
                <th>address</th>
                <td><input class="form-control" type="text" name="address" placeholder="address" /></td>
            </tr>  
            <tr>
                <th>URL</th>
                <td><input class="form-control" type="text" name="URL" placeholder="URL" /></td>
            </tr>  
            <tr>
                <th>Type</th>
                <td><input class="form-control" type="text" name="type" placeholder="type" /></td>
            </tr>  
            <tr>
                <th>image</th>
                <td><input class="form-control" type="text" name="image" placeholder="image url" /></td>
            </tr>  
            <tr>
                <th>startday</th>
                <td><input class="form-control" type="text" name="startday" placeholder="0000.00.00" /></td>
            </tr>  
            <tr>
                <th>starttime</th>
                <td><input class="form-control" type="text" name="starttime" placeholder="00.00.00" /></td>
            </tr>  
            <tr>
                <td><button class="btn-success"type="submit">Insert Table</button></td>
                <td><a  href="home.php"><button class="btn-danger" type="button">Back</button></a></td>

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