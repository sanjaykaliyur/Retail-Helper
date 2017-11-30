
<!DOCTYPE html>
<html lang="en">
    <br>
    <br>
    <br>
    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <center><h1 class="page-header">Payment confirmed</h1></center>
            </div>
        </div>
        <!-- /.row -->
        <h3> Recent Purchases: </h3>
        <?php
	include 'header.php';
        include 'connect.php';
        $result = oci_parse($conn,"SELECT * FROM cartTemp WHERE Userid = '$id'");
        oci_execute($result);
	while($row = oci_fetch_array($result, OCI_BOTH))
        {
	   // deduce if this product id already exists for this user
	   // else add a new row
	   // update the qty in product
	  
           $result2 = oci_parse($conn, "select case when exists (SELECT * FROM userPurchases where userid = '$id' AND PRODUCTID = '".$row['PRODUCTID']."') then 'Y' else 'N' end as R from dual");
           oci_execute($result2);
	   $row2 = oci_fetch_array($result2, OCI_BOTH);
	       
	       if($row2[0] == 'Y'){
	           $result3 = oci_parse($conn, "UPDATE userPurchases SET qty = qty + 1, dateordered = (CURRENT_TIMESTAMP) where userid = '$id' AND PRODUCTID = '".$row['PRODUCTID']."'");
	           oci_execute($result3);
		   echo "<center><p>You just bought another ".$row['COLOR']." shirt</p></center>";
                   echo "<br>";
 	       
	       }
	  
	   else
	   {
               $result4 = oci_parse($conn, "INSERT INTO userPurchases VALUES('$id','".$row['PRODUCTID']."',1,(CURRENT_TIMESTAMP))");
	       //echo "INSERT INTO userPurchases VALUES('$id','".$row['PRODUCTID']."',1,(CURRENT_TIMESTAMP))";
	       oci_execute($result4);
               echo "<center><p>You just bought your first ".$row['COLOR']." shirt</p></center>";
	       echo "<br>";
           }
	   $result5 = oci_parse($conn, "UPDATE PRODUCTS SET qtyAvailable = qtyAvailable - 1 where PRODUCTID = '".$row['PRODUCTID']."'");
	   oci_execute($result5);
        }
	$result6 = oci_parse($conn, "DELETE FROM CARTTEMP WHERE USERID = '$id'");
        oci_execute($result6);
        ?>
        <!-- Content Row -->
        <div class="row">
            <center><div class="col-lg-12">
                <p> Your payment was confirmed. Thank you for doing business with us. You will receive an email receipt detailing your purchases.</p>
                <p>To register for camps, click <a href="register.php">here</a>.</p>
                <p>To purchase camp accessories, click <a href="catalog.php">here</a>.</p>
                <p>To return to the home page, click <a href="index.php">here</a>.</p>
            </div></center>
        </div>
        <hr>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

<?php include 'footer.php'; ?>
