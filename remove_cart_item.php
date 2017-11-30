<?php
  include 'header.php';
  include 'connect.php';
  echo '<br><br><br><br><br><br><br><br><br><br>';
  if(isset($_POST['productid']))
  {
    $productid = $_POST['productid'];
    $result1 = oci_parse($conn, "DELETE FROM cartTemp where USERID = '$id' and PRODUCTID = '$productid'");
    oci_execute($result1);
  }
 header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
