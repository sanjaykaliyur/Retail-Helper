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
/*
   $sql = "SELECT courses_cart, items_cart FROM users WHERE Username = '$id';";
   $result = mysqli_query($conn,$sql);
   $row = mysqli_fetch_assoc($result);
   $array = str_split($row['courses_cart']);
   $array2 = str_split($row['items_cart']);
   $totalCost = $i = 0;
   $bool = $bool2 = false;
	if(($array[0] == "" && $array2[0] == "")){
    		echo '<h1 id="emptyShop"><span class="glyphicon glyphicon-shopping-cart"></span> Empty Shopping Cart!</h1>';
   	}
	else if($row['courses_cart'] == "" && $row['items_cart'] == "") {
		 echo '<h1 id="emptyShop"><span class="glyphicon glyphicon-shopping-cart"></span> Empty Shopping Cart!</h1>';
	}
		if(!($array[0] == "")) {
                  $bool = true;
                  foreach($array as $i => $item) {
		    $sqlx = "SELECT childName FROM courseTemp WHERE user = '$id' AND courseID = '$array[$i]';";
                    $resultx = mysqli_query($conn,$sqlx);
		    $rev = mysqli_fetch_assoc($resultx);
                    $c = $rev['childName'];
		    $sql2 = "SELECT courseName, courseDuration, courseCost, childName FROM courseTemp WHERE courseID = '$array[$i]' AND user = '$id' AND childName = '$c';";
                    $sqlA = "SELECT image FROM COURSES WHERE course_ID = '$array[$i]';";
                    $resultA = mysqli_query($conn,$sqlA);
                    $rowA = mysqli_fetch_assoc($resultA);
                    $result2 = mysqli_query($conn,$sql2);
                    while($row2 = mysqli_fetch_assoc($result2)){
                      $rows2[] = $row2;
                      $totalCost += $row2['courseCost'];
                    }

                  foreach($rows2 as $row4) {
                    echo'
          					<div class="row">
          						<div class="col-xs-2"><img class="img-responsive" src="./Images/Course/'.$rowA['image'].'">
          						</div>
          						<div class="col-xs-4">
          							<h4 class="product-name"><strong></strong></h4><h4><small>'.$row4['courseName'].'</small></h4>
                        <h5 class="product-name"><strong></strong></h4><h4><small>'.$row4['courseDuration'].'</small></h5>
                        <h5 class="product-name"><strong></strong></h4><h4><small>Child: '.$row4['childName'].'</small></h5>
          						</div>
          						<div class="col-xs-6">
          							<div class="col-xs-6 text-right">';
                        echo'
          								<h6><strong>$'.$row4['courseCost'].'.00<span class="text-muted"></span></strong></h6>';
                        echo'
          							</div>
          							<div class="col-xs-2">
                          <form method="POST" action="remove_cart_item.php">
                            <input type="hidden" name="courseID" value="'.$array[$i].'"></input>
                            <input type="hidden" name= "courseCost"  value = "'.$row4['courseCost'].'"></input>
                            <input type="hidden" name= "courseDuration"  value = "'.$row4['courseDuration'].'"></input>
                            <input type="hidden" name = "childName" value = "'.$row4['childName'].'"></input>
            								<button type="submit" class="btn btn-link btn-xs">
            									<span class="glyphicon glyphicon-trash"> </span>
            								</button>
                          </form>
          							</div>
          						</div>
          					</div>
          					<hr>
                    ';
                  }
                  $i++;
                  $rows2 = array();
                }
              }
                //items
                $j = 0;
                if(!($array2[0] == "")) {
                  $bool2 = true;
                  while($j < sizeof($array2)) {
                    $sql3 = "SELECT image, item_name, item_cost FROM CATALOG WHERE item_ID = '$array2[$j]';";
                    $result3 = mysqli_query($conn,$sql3);
                    $row3 = mysqli_fetch_assoc($result3);

                    echo'
          					<div class="row">
          						<div class="col-xs-2"><img class="img-responsive" src=".'.$row3['image'].'">
          						</div>
          						<div class="col-xs-4">
          							<h4 class="product-name"><strong></strong></h4><h4><small>'.$row3['item_name'].'</small></h4>
          						</div>
          						<div class="col-xs-6">
          							<div class="col-xs-6 text-right">
          								<h6><strong>$'.$row3['item_cost'].'.00<span class="text-muted"></span></strong></h6>
          							</div>
          							<div class="col-xs-2">
                        <form method="POST" action="remove_cart_item.php">
                          <input type="hidden" name="itemID" value="'.$array2[$j].'"></input>
                          <button type="submit" class="btn btn-link btn-xs">
                            <span class="glyphicon glyphicon-trash"> </span>
                          </button>
                        </form>
          							</div>
          						</div>
          					</div>
          					<hr>
                    ';
                    $totalCost += $row3['item_cost'];
                    $j++;
                  }
                }
                $sql = "SELECT Username FROM USER_CAMPS WHERE Username = '$id';";
                $result = mysqli_query($conn,$sql);

                if( mysqli_num_rows($result) > 0)
                {
                  $bool = true;
                }
                  echo'
        					<div class="row">
        						<div class="text-center">
        							<div class="col-xs-9">';
                      //check for discounts : if more than 1 child and if already signed up for course and buys catalog item
                      $discount1 = floor((0.15*$totalCost));
                      $discount2 = floor((0.10*$totalCost));
                      if($bool && $bool2) {
                        echo '<h6 class="text-right">Total without discount: $'.$totalCost.'.00</h6>';
        								echo '<h6 class="text-right">discount: - $'.floor((0.15*$totalCost)).'.00</h6>';
                      }
                      $sqly = "SELECT childName FROM courseTemp WHERE user = '$id';";
                      $res = mysqli_query($conn,$sqly);
                      $row = mysqli_fetch_assoc($res);
                      $child = $row['childName'];
                      $sqlx = "SELECT COUNT(*) FROM USER_CAMPS WHERE Username = '$id' AND childName != '$child';";
                      $sqlz = "SELECT COUNT(*) FROM USER_CAMPS WHERE Username = '$id';";

                      $res = mysqli_query($conn,$sqlx);
                      $row = mysqli_fetch_assoc($res);
                      $resz = mysqli_query($conn,$sqlz);
                      $rowz = mysqli_fetch_assoc($resz);

                      if( $row['COUNT(*)'] > 1 || $rowz['COUNT(*)'] > 1) {
        								echo '<h6 class="text-right">discount: - $'.floor((0.10*$totalCost)).'.00</h6>';
                      }
                        echo '
        							</div>
        							<!--div class="col-xs-3">
        								<button type="button" class="btn btn-default btn-sm btn-block">
        									Update cart
        								</button>
        							</div-->
        						</div>
        					</div>
        				</div>
        				<div class="panel-footer">
        					<div class="row text-center">
        						<div class="col-xs-9">';
                    if($bool && $bool2)
                    {
                      $totalCost = $totalCost - $discount1;

                    }

                    $sqlx = "SELECT COUNT(*) FROM USER_CAMPS WHERE Username = '$id' AND childName != '$child';";
                    $res = mysqli_query($conn,$sqlx);
                    $row = mysqli_fetch_assoc($res);

                    if( $row['COUNT(*)'] > 1 || $rowz['COUNT(*)'] > 1) {
                      $totalCost = $totalCost - $discount2;
                    }
                    echo'
        							<h4 class="text-right">Total: $'.$totalCost.'.00 <strong></strong></h4>
        						</div>
        						<div class="col-xs-3">
                    <form action="pay.php" method="post">
                      <input type="hidden" name="totalPrice" value="'.$totalCost.'"></input>
        							<button type="submit" class="btn btn-success btn-block">
        								Checkout
        							</button>
                    </form>
        						</div>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>';
  */    
   ?>
</body>
</html>
