<?php
  session_start();
  if(isset($_SESSION['sess_user'])){
   
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

  <title>
    Online Ordering and Sales Inventory
  </title>


 <link rel="stylesheet" href="css/bootstrap.min.css"> 
  <script src="js/bootstrap.min.js"></script>
  <script src="js/hehe.js"></script>
   <script src="js/jquery.min.js"></script>
    <link href="dashboard.css" rel="stylesheet">
  </head>
<style>
div.ex1 {
    width: 100%;
    height: 250px;
    overflow: auto;
}
</style>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
   <a class="navbar-brand" href="index.php">Online Ordering and Sales Inventory for Ilocos Little Sweets Pastries</a>
        </div>

        <div class="collapse navbar-collapse" id="myNavbar">
       <ul class="nav navbar-nav navbar-right">
      
        <li><a href="user.php"><span class="glyphicon glyphicon-user"></span> <?=$_SESSION['sess_user'];?></a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
      </div>
    </nav>


<div class="container-fluid">
  <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="user.php">Purchase <span class="sr-only">(current)</span></a></li>
            <li  class="active"><a href="products-user.php">View Products</a></li>
          </ul>

<?php 
        include('config.php');
        $sql = "SELECT SUM(total) FROM customercart";
        $qsql = mysqli_query($con,$sql);
        while($r = mysqli_fetch_array($qsql))
        {
          $sum = $r['SUM(total)'];
        }

?>
<br><br><br><br><br>
    <center>
        <strong><h1>Php<?php echo $sum;?></h1></strong>
        <h1 class="sub-header">OVERALL<br>TOTAL<br></h1>
              <button type="button" class="btn btn-success" name = "katshing" data-toggle="modal" data-target="#myModal">SUBMIT</button>
    </center>
      </div>
        
<?php 
  include('config.php');

  $out = "SELECT * FROM members WHERE username ='".$_SESSION["sess_user"]."'";
  $qout = mysqli_query($con,$out);

      $date = mysqli_real_escape_string($con, date('Y-m-d H:i:s'));
  $row = mysqli_fetch_array($qout);
  $fname = $row['first_name'];
  $lname = $row['last_name'];
  $number = $row['phone'];
  $address = $row['address'];
  $email = $row['email'];


?><!-- Standard button -->
          
<form method = "POST" action = "">
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
  <div class="row">
    <h2 class="sub-header">PRODUCTS<span class="glyphicon glyphicon-shopping-cart"></span></h2> 
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Product Number</th>
                <th>Product Name</th>
                <th>Price</th>
              </tr>
            </thead>
<tbody>
        <?php 
          include('config.php');
          $show = "SELECT * FROM products";
          $qshow = mysqli_query($con,$show);

          while($rooow = mysqli_fetch_array($qshow)){
            
        ?>
          <tr>
            <td>
              <?php echo $rooow['productid']; ?>
            </td>
            <td>
              <?php echo $rooow['productname']; ?>
            </td>
            <td>
              <?php echo $rooow['price']; ?>
            </td>
          </tr>
                    

        <?php 
        }
        ?>

</tbody>
</table>

    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
      </div>
      <div class="modal-body">
        <h3>
        Are You Sure You Want to Submit this?
        </h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No, I Want More</button>
      
        <button type="submit" class="btn btn-primary" name="katshings">Yes</button>
 </form>       
      </div>
    </div>
  </div>
</div>
<?php 
      if(isset($_POST['katshings']))
      {

            $fetch = "SELECT * from customercart WHERE username ='".$_SESSION['sess_user']."'";
            $fetchh = mysqli_query($con,$fetch);

            while($ruw = mysqli_fetch_array($fetchh))
          {
            $id = $ruw['id'];
            $usernameq = $ruw['username'];
            $nmq = $ruw['nameofcostumer'];
            $cnumq = $ruw['contactnumber'];
            $addq = $ruw['address'];
            $emq = $ruw['email'];
            $proidq = $ruw['productid'];
            $proq = $ruw['productname'];
            $quaq = $ruw['quantity'];
            $propriceq = $ruw['price'];
            $totsq = $ruw['total'];
            $dateq = $ruw['date'];
            
             $insertq = "INSERT INTO orders(id,username,nameofcostumer,contactnumber,address,email,productid,productname,quantity,price,total,date) VALUES ('$id','$usernameq','$nmq','$cnumq','$addq','$emq','$proidq','$proq','$quaq','$propriceq','$totsq','$dateq')";
            $insertqueryq = mysqli_query($con,$insertq);     
}
           $sql_query1="DELETE FROM customercart WHERE username ='".$_SESSION['sess_user']."'";
            mysqli_query($con,$sql_query1);  

          echo "<META HTTP-EQUIV ='Refresh' Content ='0; URL =http://www.laoag-restau.local/products-user.php'>";

          echo "<script>alert('Well done!Just wait for a call for confimation of your orders!')</script>";
    }



?>



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


  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
<?php 
  }
  else {
header('Location:index.php');

  }
?>