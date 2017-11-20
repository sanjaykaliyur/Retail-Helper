
<?php 
  include 'header.php'; 
  include 'connect.php';
  $Start_Date = date("Y-m-d");
  if(isset($_POST['tshirts']) && isset($_POST['comment'])) {
    $color = $_POST['tshirts'];
    $comment = $_POST['comment'];
    if ($color == 'Black'){
	$productId = 'a';
    }
    if ($color == 'Blue'){
        $productId = 'b';
    }
    if ($color == 'Green'){
        $productId = 'c';
    }
    if ($color == 'Pink'){
        $productId = 'd';
    }
    if ($color == 'Red'){
        $productId = 'e';
    }
    if ($color == 'Yellow'){
        $productId = 'f';
    }
    $result = oci_parse($conn,"INSERT INTO REVIEWS VALUES ('$id','$productId','$comment')");
    oci_execute($result);
  }
   echo '<br><br><br><br><br><br><br><br><br><br>';
   echo "INSERT INTO REVIEWS VALUES ('$id','$productId','$comment')";

  //header('Location: ' . $_SERVER['HTTP_REFERER']);

?>
