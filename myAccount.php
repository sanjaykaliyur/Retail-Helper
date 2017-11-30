<?php
  include 'header.php';
  include 'connect.php';
?>
<br>
<br>
<br>
<br>
<?php
  
  echo '<div id="accountWrapper" style="padding-left: 10px;">';
  $result2 = oci_parse($conn, "SELECT * FROM users WHERE UserId = '$id'");
  oci_execute($result2);
  $result3 = oci_parse($conn, "SELECT Products.COLOR,UserPurchases.QTY,UserPurchases.DATEORDERED FROM userpurchases NATURAL JOIN Products WHERE UserId = '$id'");
  oci_execute($result3);
  $result4 = oci_parse($conn, "SELECT * FROM Manufacturer NATURAL JOIN PRODUCTS");
  oci_execute($result4);
  $result5 = oci_parse($conn, "SELECT * FROM Supplier NATURAL JOIN PRODUCTS");
  oci_execute($result5);
  
  echo '<h3>My Account:</h3>';

  if($id != 'admin')
  {
  	if(($row1 = oci_fetch_array($result2, OCI_BOTH)) != false)
  	{
 	    echo '<hr><p><h2>'.$row1['USERID'].'</h2></p>';
      echo '<p><b>First Name:</b> '.$row1['FIRSTNAME'].'</p>';
      echo '<p><b>Last Name:</b> '.$row1['LASTNAME'].'</p>';
      echo '<p><b>Street:</b> '.$row1['STREET'].'</p>';
      echo '<p><b>Location: </b> '.$row1['CITY'].'</p>';
      echo '<p><b>State: </b> '.$row1['STATE'].'</p>';
      echo '<p><b>ZipCode: </b> '.$row1['ZIPCODE'].'</p><hr>';
  	}

    echo '<hr><p><h2>User Purchases</h2></p>';
  	while($row2 = oci_fetch_array($result3, OCI_BOTH))
  	{
  	  echo '<p><b>Color of T-Shirt:</b> '.$row2['COLOR'].'</p>';
      echo '<p><b>Quantity:</b> '.$row2['QTY'].'</p>';
      echo '<p><b>Date Ordered:</b> '.$row2['DATEORDERED'].'</p><hr>';
  	}
  }

  if($id=='admin')
  {
  	echo 'Welcome, Administrator.';
    echo '<hr><p><h2>Manufacturer Information</h2></p>';
  	while($row3 = oci_fetch_array($result4, OCI_BOTH))
    { 
      echo '<p><b>Manufacturer Name:</b> '.$row3['MANUFACTURERID'].'</p>';
      echo '<p><b>Location:</b> '.$row3['LOCATION'].'</p>';
    }

    echo '<hr><p><h2>Supplier Information</h2></p>';
    while($row4 = oci_fetch_array($result5, OCI_BOTH))
    {
      echo '<p><b>Supplier Name:</b> '.$row4['SUPPLIERID'].'</p>';
      echo '<p><b>Location:</b> '.$row4['LOCATION'].'</p>';
    }
  }
  include 'visualization.php';
  include 'footer.php';
?>
