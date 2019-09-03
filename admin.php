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
    height: 500px;
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
            <li class="active"><a href="#">Inventory <span class="sr-only">(current)</span></a></li>
            <li><a href="orders.php">Orders</a></li>
            <li><a href="VM-admin.php">Vending Machine</a></li>
            <li><a href="admin-products.php">Products</a></li>
          </ul>




<?php 
        include('config.php');
        $sql = "SELECT SUM(total) FROM inventory";
        $qsql = mysqli_query($con,$sql);
        while($r = mysqli_fetch_array($qsql))
        {
          $sum = $r['SUM(total)'];
        }

?>
    <center>
        <strong><h1>Php<?php echo $sum;?></h1></strong>
        <h1 class="sub-header">BUSINESS<br>PROFIT</h1>    </center>
      </div>



        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Sells Inventory</h1>

<div class="input-group input-group-md">
  <span class="input-group-addon" id="sizing-addon1"><span class="glyphicon glyphicon-search"></span></span>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name" class="form-control" aria-describedby="sizing-addon1">
</div>

          <div class="table-responsive">
 <div class="ex1">               
            <table class="table table-striped" id="myTable">
              <thead>
               <tr>
                  <th>Product ID</th>
                  <th onclick="sortTable(1)">Customer</th>
                  <th>Product Purchased</th>
                  <th>Quatity</th>
                  <th>Price</th>
                  <th  onclick="sortTable(0)">Date Purchased</th>
                  <th>Total(Php)</th>
                  <th>Option</th>
                </tr>
              </thead>
              <tbody>
              
  <?php 
      include('config.php');
      $fetch = "SELECT * FROM inventory";
      $qfetch = mysqli_query($con,$fetch);

      while($row = mysqli_fetch_array($qfetch)){
  ?>
      <tr>
        <td>
          <?php echo $row['productid']; ?>
        </td>
     
        <td>
          <?php echo $row['nameofcostumer']; ?>
        </td>
     
        <td>
          <?php echo $row['productname']; ?>
        </td>
      
        <td>
          <?php echo $row['quantity']; ?>
        </td>
      
        <td>
          <?php echo $row['price']; ?>
        </td>
     
        <td>
          <?php echo $row['date']; ?>
        </td> 
        <td>
          <?php echo $row['total']; ?>
        </td>
      
        <td>

        <a href='javascript:delw(<?php print $row['id']; ?>)'>   
          <button type="button" class="btn btn-danger btn-md" value = "<?php print $row['id']; ?>" name = "idtpro">
            Remove <span class="glyphicon glyphicon-remove"></span>
          </button>

        </a>
        </td>
      </tr>


  <?php  
      }
  ?>
<?php

    if(isset($_GET['delw']))
          {  
                    


          $sql_query="DELETE FROM inventory WHERE id =".$_GET['delw'];
          mysqli_query($con,$sql_query);       
          echo "<script>alert('Data has been removed!')</script>";
          echo "<META HTTP-EQUIV ='Refresh' Content ='0; URL =http://localhost/Laoag-Restau/admin.php'>";
                    
        }                   

?>

<script type="text/javascript">
function delw(id)
{
  if(confirm('Sure To Remove This Record ?'))
  {
    window.location.href='admin.php?delw='+id;
  }
}
</script>
              </tbody>
            </table>
            </div>
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
       <center>ENTER PASSWORD TO WIDTHDRAW <input class = "form-control" type="password" name="confirm"></center>
        </h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No, I accindentaly pressed it</button>
        <button type="button" class="btn btn-primary">Withdraw</button>
      </div>
    </div>
  </div>
</div>



      </div>
    </div>



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