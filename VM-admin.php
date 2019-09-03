<?php
  session_start();
  if(isset($_SESSION['sess_admin'])){
   
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

    <title>Online Ordering and Sales Inventory for Ilocos Little Sweets</title>


 <link rel="stylesheet" href="css/bootstrap.min.css"> 
  <script src="js/bootstrap.min.js"></script>
   <script src="jquery.min.js"></script>
    <link href="dashboard.css" rel="stylesheet">
  </head>

<style>
div.ex1 {
    width: 100%;
    height: 200px;
    overflow: auto;
}
#myInput {
  background-position: 10px 10px;
  background-repeat: no-repeat;
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
   <a class="navbar-brand" href="index.php">Online Ordering and Sales Inventory for Ilocos Little Sweets</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
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

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="admin.php">Inventory <span class="sr-only">(current)</span></a></li>
            <li><a href="orders.php">Orders</a></li>
            <li class="active"><a href="VM-admin.php">Vending Machine</a></li>
            <li><a href="admin-products.php">Products</a></li>
          </ul>

<?php 
        include('config.php');
        $sql = "SELECT SUM(total) FROM customercart where username = '".$_SESSION['sess_admin']."'";
        $qsql = mysqli_query($con,$sql);
        while($r = mysqli_fetch_array($qsql))
        {
          $sum = $r['SUM(total)'];
        }

?>

<form method="POST" action="">  
  <center>
        
<?php 

 ?>
        <strong><h1>Php 
          <?php 
if(isset($_POST['katshing'])){
   if($_POST['change'] == null)
   {
      echo "<script>alert('Please Enter Amount Given')</script>";
   }
   elseif($_POST['change'] < $sum){
      echo "<script>alert('Amount Given Cannot be lesser than the Total')</script>";
   }
   else{
    $sukli = $_POST['change'] - $sum;
 
          echo $sukli;



           {

            $fetch = "SELECT * from customercart WHERE username ='".$_SESSION['sess_admin']."'";
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
            
             $insertq = "INSERT INTO inventory(id,username,nameofcostumer,contactnumber,address,email,productid,productname,quantity,price,total,date) VALUES ('$id','$usernameq','$nmq','$cnumq','$addq','$emq','$proidq','$proq','$quaq','$propriceq','$totsq','$dateq')";
            $insertqueryq = mysqli_query($con,$insertq);     
}
           $sql_query1="DELETE FROM customercart WHERE username ='".$_SESSION['sess_admin']."'";
            mysqli_query($con,$sql_query1);  

          echo "<script>alert('Well done!Just wait for a call for confimation of your orders!')</script>";

          echo "<META HTTP-EQUIV ='Refresh' Content ='0; URL =http://www.laoag-restau.local/VM-admin.php'>";
          
    }
  }
}
           ?></h1></strong>
        <h1 class="sub-header">Change<br></h1>
              <input type="number" class="form-control" name="change" placeholder="Enter Amount Given.....">
              <br>
              <button type="submit" class="btn btn-success" name = "katshing" data-toggle="modal" data-target="#myModal">SUBMIT</button>
    </center>

      </div>
</div>



      
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <div class="row">
      <h1 class="page-header">Vending Machine <span class="glyphicon glyphicon-print"></span> 
  <button class="btn btn-default" onclick="printContent('div1')">Print</button></h1></h1>

    <h3>Quantity</h3><input type="number" name="quantity" class="form-control" style="width: 7%;" value="0">

     <div class="ex1">   
      <table class="table table-striped" id="myTable">
            <thead>
              <tr>
                <th>Check</th>
                <th>Product Number</th>
                <th onclick="sortTable(1)">Product Name</th>
                <th>Price</th>
                <th>OPTION</th>
              </tr>
            </thead>

              <?php 
                  include('config.php');

                  $all = "SELECT * FROM products";
                  $allq = mysqli_query($con,$all);

                  while($row = mysqli_fetch_array($allq)){
              ?>

                    <tbody> 
                      <tr>
                        <td>
                            <input type="radio" name="c" value = "<?php echo $row['productid']; ?>">
                        </td>
                        <td>
                            <?php echo $row['productid']; ?>
                        </td>
                        
                        <td>
                            <?php echo $row['productname']; ?>
                        </td>
                        
                        <td>
                            <?php echo $row['price']; ?>
                        </td>
          <td>
    <button type="submit" class="btn btn-info btn-md" value = "<?php print $row['productid']; ?>" name = "idtpro"> Approve <span class="glyphicon glyphicon-ok"></span></button>
          </td>
                      </tr>
                    </tbody>
              <?php
              }
              ?>
      </table>
      </div>  
</form>   



<?php
    if(isset($_POST['idtpro'])){
      if(!isset($_POST['c']) || $_POST['quantity'] <= 0)
      {
        echo "<script>alert('Quantity cannot be zero and please check the selection product if it is set')</script>";
      }
      else{
            $fetch = "SELECT * from products WHERE productid ='".$_POST['c']."'";
            $fetchh = mysqli_query($con,$fetch); 
            while($ruw = mysqli_fetch_array($fetchh)){
            $usernameq = "admin";
            $nmq = "--Transaction--";
            $cnumq = "--Transaction--";
            $addq ="--Transaction--";
            $emq = "--Transaction--";
            $proidq = $ruw['productid'];
            $proq = $ruw['productname'];
            $propriceq = $ruw['price'];
            $dateq = mysqli_real_escape_string($con, date('Y-m-d H:i:s'));

            $quaq = $_POST['quantity'];
            @$totsq = $propriceq * $quaq;


             $insertq = "INSERT INTO customercart(username,nameofcostumer,contactnumber,address,email,productid,productname,quantity,price,total,date) VALUES ('$usernameq','$nmq','$cnumq','$addq','$emq','$proidq','$proq','$quaq','$propriceq','$totsq','$dateq')";
            $insertqueryq = mysqli_query($con,$insertq);   

          echo "<META HTTP-EQUIV ='Refresh' Content ='0; URL =http://www.laoag-restau.local/VM-admin.php'>";
          
          }
        }

     } 
?>

<script type="text/javascript">
  function printContent(e1){
    var restorepage = document.body.innerHTML;
    var princontent = document.getElementById(e1).innerHTML;
    document.body.innerHTML = princontent;
    window.print();
    document.body.innerHTML = restorepage;

  }


</script>



<div id="div1">
<!--ADMINISTRATOR'S CART FOR ACTUAL PURCHASING MY FRIEND-->
 <h1 class="page-header">Customer's Cart <span class="glyphicon glyphicon-shopping-cart"></span>


        <strong>TOTAL Php <?php echo $sum; ?></strong>
                      

      </h1>


            <div class="ex1">   
              <table class="table table-striped" id="myTable">
                    <thead>
                      <tr>
                        <th>Product Number</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total(Php)</th>
                        <th>OPTION</th>
                      </tr>
                    </thead>

                      <?php 
                          include('config.php');

                          $allq = "SELECT * FROM customercart WHERE username ='".$_SESSION['sess_admin']."'";
                          $allqq = mysqli_query($con,$allq);

                          while($row = mysqli_fetch_array($allqq)){
                      ?>

                            <tbody> 
                              <tr>
                                <td>
                                    <?php echo $row['productid']; ?>
                                </td>
                                
                                <td>
                                    <?php echo $row['productname']; ?>
                                </td>
                                
                                <td>
                                    <?php echo $row['price']; ?>
                                </td>
                                <td>
                                    <?php echo $row['quantity']; ?>
                                </td> 
                                <td>
                                    <?php echo $row['total']; ?>
                                </td>
                                  <td>

        <a href='javascript:delw(<?php print $row['id']; ?>)'>   
          <button type="button" class="btn btn-danger btn-md" value = "<?php print $row['id']; ?>" name = "idtpro">Remove <span class="glyphicon glyphicon-remove"></span>
          </button>
        </a>
                               </td>
                              </tr>
                            </tbody>
                      <?php
                      }
                      ?>
              </table>
              </div> 
  </div>            
<!--ADMINISTRATOR'S CART FOR ACTUAL PURCHASING MY FRIEND-->    
    <?php

    if(isset($_GET['delw']))
          {  
        
          $sql_query="DELETE FROM customercart WHERE id =".$_GET['delw'];
          mysqli_query($con,$sql_query);       

          echo "<script>alert('Product Item has been removed from the cart!')</script>";

          echo "<META HTTP-EQUIV ='Refresh' Content ='0; URL =http://www.laoag-restau.local/VM-admin.php'>";
          
        } 
        ?>
<script type="text/javascript">
function delw(id)
{
  if(confirm('Sure To Remove This Record ?'))
  {
    window.location.href='VM-admin.php?delw='+id;
  }
}
</script>     
             
</div>
</div>




<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>



<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>



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