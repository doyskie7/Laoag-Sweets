
<!DOCTYPE html>
<html>
<head>
	<title>
		Online Ordering and Sales Inventory
	</title>

 <link rel="stylesheet" href="css/bootstrap.min.css"> 
  <script src="js/bootstrap.min.js"></script>
   <script src="jquery.min.js"></script>
</head>
<body>
<?php
  session_start();
  if(!isset($_SESSION['sess_user']) || !isset($_SESSION['sess_admin'])){
   
?>
   
<header>
  <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
   <a class="navbar-brand" href="index.php">Online Ordering and Sales Inventory for Ilocos Little Sweets Pastries</a>
     <div class="collapse navbar-collapse" id="myNavbar">
       <ul class="nav navbar-nav navbar-right">
        <li><a class="nav-link js-scroll-trigger" href="#top"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li><a class="nav-link js-scroll-trigger" href="#products"><span class="glyphicon glyphicon-grain"></span> Products</a></li>
        <li><a class="nav-link js-scroll-trigger" href="#About"><span class="glyphicon glyphicon-folder-open"></span> About Us</a></li>
  
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
</header>

        <?php 
             }
        ?>

        <?php
            if(isset($_SESSION['sess_user'])){ 
        ?>
</style>
<header>
  <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
     <div class="collapse navbar-collapse" id="myNavbar">
       <ul class="nav navbar-nav navbar-right">
        <li><a class="nav-link js-scroll-trigger" href="#top"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li><a class="nav-link js-scroll-trigger" href="#products"><span class="glyphicon glyphicon-grain"></span> Products</a></li>
        <li><a class="nav-link js-scroll-trigger" href="#About"><span class="glyphicon glyphicon-folder-open"></span> About Us</a></li>
        <li><a href="user.php"><span class="glyphicon glyphicon-user"></span> <?=$_SESSION['sess_user'];?></a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
</header>

<?php

}

?>


   <?php
            if(isset($_SESSION['sess_admin'])){ 
        ?>
</style>
<header>
  <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
     <div class="collapse navbar-collapse" id="myNavbar">
       <ul class="nav navbar-nav navbar-right">
        <li><a class="nav-link js-scroll-trigger" href="#top"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li><a class="nav-link js-scroll-trigger" href="#products"><span class="glyphicon glyphicon-grain"></span> Products</a></li>
        <li><a class="nav-link js-scroll-trigger" href="#About"><span class="glyphicon glyphicon-folder-open"></span> About Us</a></li>
        <li><a href="admin.php"><span class="glyphicon glyphicon-user"></span> <?=$_SESSION['sess_admin'];?></a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
</header>

<?php

}

?>





<section id = "top">
  <br><br>
 <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="img/first.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Ilocos Little Sweets Pastries</h1>
              <p>You can order through online just click the button below and sign up on page today!</p>
              <p><a class="btn btn-lg btn-primary" href="registration.php" role="button">Sign up today</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="img/second.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Know more about us and our products!</h1>
              <p><a class="nav-link js-scroll-trigger" href="#About" role="button"><button class="btn btn-lg btn-primary">Learn more</button></a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide" src="img/third.jpg" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Follow Us on Facebook.</h1>
              <p>We also have an account on facebook to reaach and to interact with you</p>
              <p><a class="btn btn-lg btn-primary" href="facebook.com" role="button">Facebook</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->
</section>


<br><br><br><br><br>



<section id = "products">
  <div class="container marketing">

    <hr class="featurette-divider">

          <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">PRODUCTS</h2>
                <h4 class="section-subheading text-muted">Experience The World class Taste of our Products</h4>
            </div>
          </div>

            <br>
            <br>
            <br>
      
    <div class="row featurette">
       <div class="col-md-7">
          <h2 class="featurette-heading">Toasted Pastillas. <span class="text-muted">It'll blow your mind.</span></h2>
          <p class="lead">Toasted pastillas is one of our best selling product nation wide, on the year 2016 we reached more than 10,000 delivery throughout nation! </p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" src="img/toast.jpg" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7 col-md-push-5">
          <h2 class="featurette-heading">Leche Flan. <span class="text-muted">Oh yeah, you read it!.</span></h2>
          <p class="lead">Try and taste our famous leche flan, this is a best gift for your family, friend and even for your neighbor! at afforadable price! .</p>
        </div>
        <div class="col-md-5 col-md-pull-7">
          <img class="featurette-image img-responsive center-block" src="img/leche.jpg" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Meringue. <span class="text-muted">Come and get it!.</span></h2>
          <p class="lead">Meriguen is also one of our popular best selling product, it is not also for gifts and a snack that you can share with your friends, it is also a best partner for a birthday party because of it's style and taste.</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" src="img/merin.jpg" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">
    </div><!-- /.container -->
</section>



<section id = "About">
  <div class="container marketing">
    <hr class="featurette-divider">

          <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">About Us</h2>
                <h4 class="section-subheading text-muted">We Deliver Nation Wide</h4>
            </div>
          </div>

            <br>
            <br>
            <br>

    <div class="row featurette">
       <div class="col-md-7">
          <h2 class="featurette-heading">Laoag Little Sweets. <span class="text-muted">humble beginnings.</span></h2>
          <p class="lead">Our journey begun on 2014, since then we consistently give our customer the best quality of our product until it grew and it is continueosly growing, now we deliver our products nationwide! </p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-circle center-block" src="img/we.jpg" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7 col-md-push-5">
          <h2 class="featurette-heading">How we deliver. <span class="text-muted">Reaching you!</span></h2>
          <p class="lead">Since facebook is well-know to this generartion, we use it as a tool to reach customers around the nation and with the help our delivery companies we were able to deliver it where ever our customer are and we are continueosly delivering it.</p>
        </div>
        <div class="col-md-5 col-md-pull-7">
          <img class="featurette-image img-circle center-block" src="img/online.jpg" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Our location. <span class="text-muted">Visit Us!.</span></h2>
          <p class="lead">Visit us at Ilocos Little Sweets Pstries, P. Acosta St, Siazon road, Brgy 14, Laoag City (bdesides Helena Felice Spa).</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-circle center-block" src="img/place.jpg" alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">
    </div><!-- /.container -->
     
      <hr class="featurette-divider">
</div>
</section>









    <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a class="nav-link js-scroll-trigger" href="#top">Back to top</a></p>
        <p>&copy; 2018 Ilocos Little Sweets, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>


  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>





