<?php
  include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <br>
  <br>
  <br>
  <h2>Register</h2>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
  <style>
	.wrapper {display: inline;}
  </style>
</head>
<body>
  <br>
  <br>
  <div class="form-style-2">
  <div class="form-style-2-heading"></div>
  <form action= "verify.php" method="post" style="padding-left: 20px;">
    <label for="field1"><span>UserID<span class="required">*</span></span><input name = "userID" maxlength="44" required data-validation-required-message="Username Required."/></label>
    <br>
    <br>
    <label for="field1"><span>Password<span class="required">*</span></span><input name = "password" type = "password" required data-validation-required-message="Password is required."/></label>
    <br>
    <br>
    <label for="field1"><span>First Name<span class="required">*</span></span><input name = "firstName"type="text" class="input-field" name="field1" value="" required data-validation-required-message="First Name Required."/></label>
    <br>
    <br>
    <label for="field1"><span>Last Name<span class="required">*</span></span><input name = "lastName" type="text" class="input-field" name="field1" value="" maxlength="44" required data-validation-required-message="Last Name Required." /></label>
    <br>
    <br>
    <label for="field1"><span>Street<span class="required">*</span></span><input name = "street" type="text" class="input-field" name="field1" value="" maxlength="44" required data-validation-required-message="Street Required." /></label>
    <br>
    <br>
    <label for="field1"><span>City<span class="required">*</span></span><input name = "city" type="text" class="input-field" name="field1" value="" maxlength="44" required data-validation-required-message="City Required." /></label>
    <br>
    <br>
    <label for="field1"><span>State<span class="required">*</span></span><input name = "state" type="text" class="input-field" name="field1" value="" maxlength="44" required data-validation-required-message="State Required." /></label>
    <br>
    <br>
    <label for="field1"><span>Zip Code<span class="required">*</span></span><input name = "zipCode" type="text" class="input-field" name="field1" value="" maxlength="44" required data-validation-required-message="Zip Code Required." /></label>
    <br>
    <br>
    <label><input type="submit" value="Continue"/></label>
  </form>
  </div>
</body>
</html>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<?php
  include 'footer.php'
?>
