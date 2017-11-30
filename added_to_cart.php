<?php
 include 'header.php';
 if(!isset($_SESSION['id'])) {
     $message = "You must be logged in!";
     echo "<script type='text/javascript'>alert('$message');</script>";
     header('Location: login.php');
 }
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <br>
 	 <br>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="style.css">
   <style>
   body {margin-top: 20px;}
   #discounts {color: #5cb85c;}

   #emptyShop {text-align: center;}
   #continueShop {float: right;}
   #continueShop2 {float: right;}
   </style>
 </head>
 <body>
   <br>
   <br>
   <?php
       $totalcost = 0;
       if(isset($_POST['color']) && isset($_POST['cost']) && isset($_POST['productID'])){
           $color = $_POST['color'];
           $price =  $_POST['cost'];
           $productID = $_POST['productID'];
           $result = oci_parse($conn,"INSERT INTO cartTemp VALUES ('".$productID."','".$price."','".$color."','".$id."')");
           oci_execute($result);
	   //echo
           
	   $result2 = oci_parse($conn, "SELECT * FROM cartTemp where userid = '".$id."'");
	   oci_execute($result2);
	   //echo 
             
            echo '<div class="container" style="width: 150%;">
                          <div class="row">
                               <div class="col-xs-8">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                             <div class="panel-title">
                                                  <div class="row">
                                                        <div class="col-xs-6">
                                                             <h5><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h5>
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <button type = "submit" id = "continueShop" class="btn btn-primary"><span class="glyphicon glyphicon-share-alt"></span>Catalog</button>
                                                            <script type="text/javascript">
                                                                document.getElementById("continueShop").onclick = function () {
                                                                    location.href = "index.php";
                                                                };
                                                            </script>
                                                        </div>
                                                    </div>
                                               </div>
                                          </div>
                                         <div class="panel-body">
                     ';
           while($row = oci_fetch_array($result2, OCI_BOTH))
           {
              $resultInner = oci_parse($conn, "SELECT filepath FROM products where productid = '".$row['PRODUCTID']."'");
                     oci_execute($resultInner);
                     $rowInner =  oci_fetch_array($resultInner, OCI_BOTH);
                     echo '<div class="row">
                               <div class="col-xs-2"><img class="img-responsive" style = "width: 100px; height: auto;" src="'.$rowInner['FILEPATH'].'">
                               </div>
                               <div class="col-xs-4">
                                   <h4 class="product-name"><strong></strong></h4><h4><small>'.$row['COLOR'].' Shirt</small></h4>
                               </div>
                               <div class="col-xs-6">
                                   <div class="col-xs-6 text-right">';
                        echo'          <h6><strong>$'.$row['PRICE'].'<span class="text-muted"></span></strong></h6>';
                        echo'
                                   </div>
                           <div class="col-xs-2">
                               <form method="POST" action="remove_cart_item.php">
                                   <input type="hidden" name= "productid"  value = "'.$row['PRODUCTID'].'"></input>
                                   <button type="submit" class="btn btn-link btn-xs">
                                       <span class="glyphicon glyphicon-trash"> </span>
                                   </button>
                               </form>
                           </div>
                        </div>
                    </div>
                    <hr>
                    ';
                    $totalcost = $totalcost + $row['PRICE'];
           }
	   echo '
                                                                <h4 class="text-right">Total: $'.$totalcost.'<strong></strong></h4>
                                                        </div>
                                                        <div class="col-xs-3">
                <form action="pay.php" method="post">
                      <input type="hidden" name="totalcost" value="'.$totalcost.'"></input>
                                                                <button type="submit" class="btn btn-success btn-block">
                                                                        Checkout
                                                                </button>
                    </form>';
       }
       else
       {
           // they are here to see what is in their cart so display all in their cart or if nothing is in there then EMPTY CART!
	   echo '<div class="container" style="width: 150%;">
                          <div class="row">
                               <div class="col-xs-8">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                             <div class="panel-title">
                                                  <div class="row">
                                                        <div class="col-xs-6">
                                                             <h5><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h5>
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <button type = "submit" id = "continueShop" class="btn btn-primary"><span class="glyphicon glyphicon-share-alt"></span>Catalog</button>
                                                            <script type="text/javascript">
                                                                document.getElementById("continueShop").onclick = function () {
                                                                    location.href = "index.php";
                                                                };
                                                            </script>
                                                        </div>
                                                    </div>
                                               </div>
                                          </div>
                                         <div class="panel-body">
           ';
           $result = oci_parse($conn, "SELECT * FROM cartTemp where userid = '".$id."'");
           oci_execute($result);
	   if(oci_fetch_array($result, OCI_BOTH)){
               while($row = oci_fetch_array($result, OCI_BOTH))
               {

		     $resultInner = oci_parse($conn, "SELECT filepath FROM products where productid = '".$row['PRODUCTID']."'");
		     oci_execute($resultInner);
		     $rowInner =  oci_fetch_array($resultInner, OCI_BOTH);
	             echo '<div class="row">
                               <div class="col-xs-2"><img class="img-responsive" style = "width: 100px; height: auto;" src="'.$rowInner['FILEPATH'].'">
                               </div>
                               <div class="col-xs-4">
                                   <h4 class="product-name"><strong></strong></h4><h4><small>'.$row['COLOR'].' Shirt</small></h4>
                               </div>
                               <div class="col-xs-6">
                                   <div class="col-xs-6 text-right">';
                        echo'          <h6><strong>$'.$row['PRICE'].'<span class="text-muted"></span></strong></h6>';
                        echo'
                                   </div>
                           <div class="col-xs-2">
                               <form method="POST" action="remove_cart_item.php">
                                   <input type="hidden" name= "productid"  value = "'.$row['PRODUCTID'].'"></input>
                                   <button type="submit" class="btn btn-link btn-xs">
                                       <span class="glyphicon glyphicon-trash"> </span>
                                   </button>
                               </form>
                           </div>
                        </div>
                    </div>
                    <hr>
                    ';
		    $totalcost = $totalcost + $row['PRICE'];
               }
           }
           else
           {
               echo '<h1 id="emptyShop"><span class="glyphicon glyphicon-shopping-cart"></span> Empty Shopping Cart!</h1>';
           }
	   echo '
                                                                <h4 class="text-right">Total: $'.$totalcost.'<strong></strong></h4>
                                                        </div>
                                                        <div class="col-xs-3">
		<form action="pay.php" method="post">
                      <input type="hidden" name="totalcost" value="'.$totalcost.'"></input>
                                                                <button type="submit" class="btn btn-success btn-block">
                                                                        Checkout
                                                                </button>
                    </form>';

       }
   ?>
</body>
</html>
