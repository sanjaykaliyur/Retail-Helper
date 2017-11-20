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
  echo '<h3>My Info:</h3>';
  if(($row = oci_fetch_array($result2, OCI_BOTH)) != false)
  {
    echo '<hr><p><h2>'.$row['USERID'].'</h2></p>';
    echo '<p><b>First Name:</b> '.$row['FIRSTNAME'].'</p>';
    echo '<p><b>Last Name:</b> '.$row['LASTNAME'].'</p>';
    echo '<p><b>Street:</b> '.$row['STREET'].'</p>';
    echo '<p><b>Location: </b> '.$row['CITY'].'</p>';
    echo '<p><b>State: </b> '.$row['STATE'].'</p>';
    echo '<p><b>ZipCode: </b> '.$row['ZIPCODE'].'</p><hr>';
  }
  $result3 = oci_parse($conn, "SELECT * FROM userpurchases WHERE UserId = '$id'");
  oci_execute($result3);
  echo '<hr><p><h2>User Purchases</h2></p>';
  if(($row = oci_fetch_array($result3, OCI_BOTH)) != false)
  {
    echo '<p><b>Color of T-Shirt:</b> '.$row['FIRSTNAME'].'</p>';
    echo '<p><b>Quantity:</b> '.$row['LASTNAME'].'</p>';
    echo '<p><b>Date Ordered:</b> '.$row['STREET'].'</p>';
  }
?>
<?php
include 'footer.php';
?>
