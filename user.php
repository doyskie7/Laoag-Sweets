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
            <li class="active"><a href="#">Purchase <span class="sr-only">(current)</span></a></li>
            <li><a href="products-user.php">View Products</a></li>
          </ul>

<?php 
        include('config.php');
        $sql = "SELECT SUM(total) FROM customercart WHERE username ='".$_SESSION["sess_user"]."'";
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
 <h2 class="sub-header">PURCHASE PROCESS <span class="
glyphicon glyphicon-save-file"></span> </h2> 
<div class="row">
    <div class="col-xs-12 col-sm-4 col-md-4">
        <div class="form-group">
          <label for = "amount">Name</label>
            <input type="text" name="cosname" id="cosname" class="form-control" tabindex="2" required="yes" value = "<?php echo $fname; echo " "; echo $lname; ?>">
        </div>
    </div>




    <div class="col-xs-12 col-sm-4 col-md-4">
        <div class="form-group" >
         <label for = "gasname">Contact Number</label>
          <input type="text" name="connumber" id="connumber" class="form-control" tabindex="2" required="yes" value = "<?php echo $number?>">
        </div>
    </div>


    <div class="col-xs-12 col-sm-4 col-md-4">
      <div class="form-group">
          <label for = "amount">Address</label>
          <input type="text" name="address" class="form-control" tabindex="2" required="yes" value = "<?php echo $address?>">
      </div>
    </div>


        <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group" required="yes">
               <label for = "email">Email Address</label>
               <input type="email" name="email" class="form-control" tabindex="2" required="yes" value = "<?php echo $email?>">
            </div>
        </div>

    
  
                             
  <div class="col-xs-12 col-sm-3 col-md-3">
        <div class="form-group" >
          <label for = "gasname">Product to add to cart</label>
                <select class = "form-control" name = "productname">
<?php 

                        include('config.php');

                        $pro = "SELECT * from products";
                        $prod = mysqli_query($con,$pro);
                        While($row = mysqli_fetch_array($prod))
                      {
                            $s = $row['productname'];

                            echo  "<option> $s </option>";

                      } 
?>

                </select>
        </div>
    </div>
<?php 


      @$po = "SELECT * from products WHERE productname ='".$_POST['productname']."'";
      @$pop = mysqli_query($con,$po);
      @$rw = mysqli_fetch_array($pop);
      $qq = $rw['productid'];
      $qqq = $rw['price'];
      $qqqq = $rw['productname'];
      if(@$qqqq == @$_POST['productname'])
      {
         $proid = $qq;
         $proprice = $qqq;
      }


?>


    <div class="col-xs-12 col-sm-1 col-md-1">
            <div class="form-group" required="no">
               <label for = "date">Quantity</label>
               <input type="number" name="quatity" class="form-control" tabindex="2" required="yes" value="0">
            </div>
        </div>


     <div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group" required="yes">
               <label for = "date">Date Purchase</label>
               <input type="text" name="date" class="form-control " disabled="yes" tabindex="6" value = "<?php print $date; ?>" required="yes">
            </div>
        </div>

  </div>

<button type="submit" class="btn btn-default" name = "add" value="add">Add to cart  <span class="glyphicon glyphicon-shopping-cart"></span></button>
 
<?php 
    include('config.php');
      @$addd = $_POST['add'];
        if($addd == "add"){

            if($_POST['quatity'] >= 1){

            $pro = "SELECT * from products WHERE productname ='".$_POST['productname']."'";
            $prood = mysqli_query($con,$pro);

            $roow = mysqli_fetch_array($prood);

            $username = $_SESSION['sess_user'];
            $nm = mysqli_real_escape_string($con, $_POST['cosname']);
            $cnum = mysqli_real_escape_string($con, $_POST['connumber']);
            $add = mysqli_real_escape_string($con, $_POST['address']);
            $em = mysqli_real_escape_string($con, $_POST['email']);
            $pro = mysqli_real_escape_string($con, $_POST['productname']);
            $qua = mysqli_real_escape_string($con, $_POST['quatity']);


         

            @$tots = $proprice * $qua;

             $insert = "INSERT INTO customercart(username,nameofcostumer,contactnumber,address,email,productid,productname,quantity,price,total,date) VALUES ('$username','$nm','$cnum','$add','$em','$proid','$pro','$qua','$proprice','$tots','$date')";
            $insertquery = mysqli_query($con,$insert);



          echo "<META HTTP-EQUIV ='Refresh' Content ='0; URL =http://www.laoag-restau.local/user.php'>";
        }
        else{
          echo "<script>alert('Quantity cannot be zero and below');</script>";
        }
    }

?>



 <br><br>





 <h2 class="sub-header">MY CART  <span class="glyphicon glyphicon-shopping-cart"></span></h2> 
        <div class="table-responsive">
  <div class="ex1">   
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Product Number</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Date Purchase</th>
                <th>OPTION</th>
              </tr>
            </thead>         
<tbody>

<?php

    if(isset($_GET['delw']))
          {  
                    
          $sql_query="DELETE FROM customercart WHERE id =".$_GET['delw'];
          mysqli_query($con,$sql_query);       
          print "<script>alert('Successfully Deleted!')</script>";
          
          echo "<META HTTP-EQUIV ='Refresh' Content ='0; URL =http://www.laoag-restau.local/user.php'>";
          
        } 
?>

<script type="text/javascript">
function delw(id)
{
  if(confirm('Sure To Remove This Record ?'))
  {
    window.location.href='user.php?delw='+id;
  }
}
</script>


        <?php 
          include('config.php');
          $show =  "SELECT * from customercart WHERE username ='".$_SESSION['sess_user']."'";
          $qshow = mysqli_query($con,$show);

          while($rooow = mysqli_fetch_array($qshow)){
            $id2 = $rooow['id'];
        ?>
          <tr>
            <td>
              <?php echo $rooow['productid']; ?>
            </td>
            <td>
              <?php echo $rooow['productname']; ?>
            </td>
            <td>
              <?php echo $rooow['quantity']; ?>
            </td>
            <td>
             Php <?php echo $rooow['total']; ?>
            </td>   
            <td>
              <?php echo $rooow['date']; ?>
            </td>
            <td>
               <a href='javascript:delw(<?php print $id2; ?>)'> 
              <button type = "button" class = 'btn btn-danger' value = "<?php print $id2 ?>">Remove</button></a>
            </td>
          </tr>
                    

        <?php 
        }
        ?>

</tbody>
</table>
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

          echo "<META HTTP-EQUIV ='Refresh' Content ='0; URL =http://www.laoag-restau.local/user.php'>";

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