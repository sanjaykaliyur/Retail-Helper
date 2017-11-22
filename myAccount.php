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
  $sql = "SELECT * FROM userPurchases WHERE UserId = '$id'";
  $sql1 = "SELECT * FROM USERS WHERE UserId = '$id'";
  $result = oci_parse($conn, "SELECT * FROM userPurchases WHERE UserId = '$id'");
  $result2 = oci_parse($conn, "SELECT * FROM users WHERE UserId = '$id'");
  oci_execute($result2);
  echo '<h3>My Account:</h3>';
  if(($row1 = oci_fetch_array($result2, OCI_BOTH)) != false)
  {
    if($id=='admin')
    {
      echo 'Welcome, Administrator.';
    }
    else {
      echo '<hr><p><h2>'.$row1['USERID'].'</h2></p>';
      echo '<p><b>First Name:</b> '.$row1['FIRSTNAME'].'</p>';
      echo '<p><b>Last Name:</b> '.$row1['LASTNAME'].'</p>';
      echo '<p><b>Street:</b> '.$row1['STREET'].'</p>';
      echo '<p><b>Location: </b> '.$row1['CITY'].'</p>';
      echo '<p><b>State: </b> '.$row1['STATE'].'</p>';
      echo '<p><b>ZipCode: </b> '.$row1['ZIPCODE'].'</p><hr>';
    }
  }
  if($id!='admin')
  {
    $result3 = oci_parse($conn, "SELECT * FROM userpurchases NATURAL JOIN Products WHERE UserId = '$id'");
    oci_execute($result3);
    echo '<hr><p><h2>User Purchases</h2></p>';
    if(($row2 = oci_fetch_array($result3, OCI_BOTH)) != false)
    {
      echo '<p><b>Color of T-Shirt:</b> '.$row2['COLOR'].'</p>';
      echo '<p><b>Quantity:</b> '.$row2['Quantity'].'</p>';
      echo '<p><b>Date Ordered:</b> '.$row2['dateOrdered'].'</p>';
    }
  }
  if($id=='admin')
  {
    echo '<hr><p><h2>Manufacturer Information</h2></p>';
    $results4 = oci_parse($conn, "SELECT * FROM Manufacturer NATURAL JOIN PRODUCTS");
    oci_execute($results4);
    while(($row3 = oci_fetch_array($results4, OCI_BOTH)) != false)
    {
      echo '<p><b>Manufacturer Name:</b> '.$row3['MANUFACTURERID'].'</p>';
      echo '<p><b>Location:</b> '.$row3['LOCATION'].'</p>';
      echo '<p><b>Product Manufactured:</b> '.$row3['PRODUCTID'].'<b> for</b> '.$row['COLOR'].'<b>shirts</b></p>'; 
    }
    
    echo '<hr><p><h2>Supplier Information</h2></p>';
    $results5 = oci_parse($conn, "SELECT * FROM Suppliers NATURAL JOIN PRODUCTS");
    oci_execute($results5);
    while(($row4 = oci_fetch_array($results4, OCI_BOTH)) != false)
    {
      echo '<p><b>Supplier Name:</b> '.$row4['MANUFACTURERID'].'</p>';
      echo '<p><b>Location:</b> '.$row4['LOCATION'].'</p>';
      echo '<p><b>Produces:</b> '.$row4['MATERIALPROD'].'<b> for</b> '.$row['COLOR'].'<b>shirts</b></p>'; 
    }

  }
?>
<?php
include 'visualization2.php';
include 'footer.php';
?>
