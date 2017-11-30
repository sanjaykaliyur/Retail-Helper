<?php
 include 'header.php';
  include 'connect.php';
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <br>
    <br>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="style.css">
 </head>
 <style>
  .sameLine {display: inline;}
 </style>
 <body>
 <!-- Page Content -->
 <div class="container">
   <br>
   <br>
    <div class="row">
        <div class="col-lg-12">
            <h1 >Store
                <small>Purchase T-Shirts</small>
            </h1>
	    <br>
            <h4 class="warning" style="color: green">*Note: Each shirt is made of a different material sourced from different parts of the world. Our prices reflect the supply and availability of the material we use.</h4>
         </div>
     </div>
     <?php
       if(!(isset($_SESSION['id']))) {
           echo '<h4 class="warning">*must be logged in to add to cart</h4>';
       }
       echo '<h4 class="warning" style="color: red">*users can only buy one of each shirt color at one time</h4><br>';
       $result = oci_parse($conn, 'SELECT * FROM Products');
       oci_execute($result);
       while(($row = oci_fetch_array($result, OCI_BOTH))){  
	echo '
	  <div class="row">
              <div class="col-md-7">
                   <a href="#">
                        <img class="img-fluid rounded mb-3 mb-md-0" src="'.$row['FILEPATH'].'" height="600" width="500">
                   </a>
              </div>
              <div class="col-md-5">
                  <h3>'.$row['COLOR'].' Shirt</h3>
                  <p>'.$row['DESCRIPTION'].'</p>
                  <p>Price: $'.$row['PRICE'].'</p>
		  <p>Qty Left: '.$row['QTYAVAILABLE'].'</p>
		  <form method="post" action="added_to_cart.php">
                       <input type="hidden" name="color" value="'.$row['COLOR'].'"></input>
                       <input type="hidden" name="cost" value="'.$row['PRICE'].'"></input>
                       <input type="hidden" name="productID" value="'.$row['PRODUCTID'].'"></input>
                       <button class="btn btn-primary" type="submit">Add to Cart<i class="fa fa-angle-right"></i></button>
                  </form>
              </div>
          </div>
	<hr>';
	}
     ?>

 <!-- jQuery -->
 <script src="js/jquery.js"></script>
 <!-- Bootstrap Core JavaScript -->
 <script src="js/bootstrap.min.js"></script>
 </body>
 </html>

<?php
 include 'footer.php';
?>
