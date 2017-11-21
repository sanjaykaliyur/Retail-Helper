<?php
  session_start();
  include 'connect.php';

  if(isset($_POST['userID']) && isset($_POST['password'])) {
    $Password = $_POST['password'];
    $Username = $_POST['userID'];
    $FirstName = $_POST['firstName'];
    $LastName = $_POST['lastName'];
    $Street = $_POST['street'];
    $City = $_POST['city'];
    $State = $_POST['state'];
    $ZipCode = $_POST['zipCode'];
    echo "INSERT INTO Users VALUES ('$Username','$Password','$FirstName','$LastName','$Street','$City','$State','$ZipCode')";
     $query = oci_parse($conn,"INSERT INTO Users VALUES ('$Username','$Password','$FirstName','$LastName','$Street','$City','$State','$ZipCode')");
     oci_execute($query);
     echo "<script> location.href='login.php';</script>";
  }
  if(isset($_POST['user']) && isset($_POST['pass'])) {
    $username = $_POST['user'];
    $password = $_POST['pass'];
    $result = oci_parse($conn,"SELECT password,userId FROM Users WHERE userId = '$username'");
    oci_execute($result);
    if(($row = oci_fetch_array($result, OCI_BOTH)) != false)
    {
	if($password == $row['PASSWORD']) {
	    echo "Verification Success<br>";
	    $_SESSION['id']=$username;
	    echo '<script>location.href="login_confirm.php"</script>';
	}else{
            echo '<script>location.href="login_fail.php"</script>';
        }
   }
    else{
        echo '<script>location.href="login_fail.php"</script>';
    }
  }
?>
